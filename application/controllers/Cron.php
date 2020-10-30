<?php

class Cron extends CI_Controller
{
    // Construct 
    public function __construct() 
    {
        parent::__construct();

        date_default_timezone_set('America/New_York');
        
        switch(ENVIRONMENT)
        {
            case 'development':
                $this->output->enable_profiler(true);
            break;
        
            case 'production':
            default:
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    header('HTTP/1.1 403 Forbidden');
                    echo "<h1>Forbidden</h1>";
                    echo "<p>You do not have permission to access this page.</p>";
                    die();
                }
            break;
        }
        
        $this->load->helper('cron');
        $this->load->model('cron_model');
    }
    
    // Run
    public function index()
    {  
        $fp = fsockopen("www.therealmofchaos.com", 443, $errno, $errstr, 10);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        }
        else {
            // Events API
            $eventsData = pollAPI("api_events.php");
            $this->updateEvents($eventsData);            
            
            // Powerlists API
            $remotePL = pollAPI("api_powerlist.php");            
            $localPL = $this->buildArrayPL();
            $this->updatePowerLists($remotePL, $localPL);
            $this->updateClans($remotePL);

            // Userlists API
            $remoteUL = pollAPI("api_userlist.php");         
            $localUL = $this->buildArrayUL();
            $charHistory = $this->buildArrayHistory();
            $this->updateUserLists($remoteUL, $localUL, $localPL, $charHistory);
                        
            // WhoList API
            $whoData = pollAPI("api_wholist.php");  
            $this->onlineStatus($whoData);
        }
    }
    
        
    // Build Powerlist Array
    public function buildArrayPL() {
        
        $powerlist = $this->cron_model->getArrayPL();
       
        foreach($powerlist as $entry) {
            
            $powerlistArray[$entry['charname']]['charname'] = $entry['charname']; 
            $powerlistArray[$entry['charname']]['rank'] = $entry['rank']; 
            $powerlistArray[$entry['charname']]['level'] = $entry['level']; 
            $powerlistArray[$entry['charname']]['path'] = $entry['path']; 
            $powerlistArray[$entry['charname']]['subpath'] = $entry['subpath']; 
            $powerlistArray[$entry['charname']]['clan'] = $entry['clan']; 
            $powerlistArray[$entry['charname']]['clanstatus'] = $entry['clanstatus'];
            $powerlistArray[$entry['charname']]['pathrank'] = $entry['pathrank'];
            
        }

        if (isset($powerlistArray)) {
            return $powerlistArray; 
        }
        else {
            return NULL;
        } 
    }
        
    // Fetch Powerlist Data, load the XML into an array, flatten it and then inset/update database.
    public function updatePowerLists($remotePL, $localPL) {                       
        
        // Set all path ranks to 1 before starting loop 
        $warriorRank = $reaverRank = $knightRank = $rogueRank = $vagabondRank = $mageRank = $tempestRank = $neophyteRank = $poetRank = $druidRank = 1;
        
        // FOREACH character check against stored data, add and update where needed.
        foreach($remotePL->children() as $character) {
            
            // Put objects into array to match with local data, we'll use these values when storing data.
            $charArray['charname'] = $charName = ucfirst(strtolower((string) $character->charname));
            $charArray['rank'] = (string) $character->rank;
            $charArray['level'] = (string) $character->level;
            $charArray['path'] = (string) $character->path;
            $charArray['subpath'] = (string) $character->subpath;
            $charArray['clan'] = (string) $character->clan;
            $charArray['clanstatus'] = (string) $character->clanstatus;
            
            // IF character listed as purged, Archon or Immortals do nothing.
            if (strpos($charName,'Purged') !== false || $charArray['path'] == "Archon" || $charArray['clan'] == "Immortals" ) {}
            else {
            
                // Warrior
                if ($character->path == "Warrior" || $character->path == "Crusader" || $character->path == "Champion") {
                    $charArray['pathrank'] = $warriorRank;
                    $warriorRank++;
                }
                else if ($character->path == "Reaver" || $character->path == "Berserker" || $character->path == "Barbarian") {
                    $charArray['pathrank'] = $reaverRank;
                    $reaverRank++;
                }
                else if ($character->path == "Knight" || $character->path == "Paladin" || $character->path == "Justicar") {
                    $charArray['pathrank'] = $knightRank;
                    $knightRank++;
                }

                // Rogue
                else if ($character->path == "Rogue" || $character->path == "Archer" || $character->path == "Sharpshooter") {
                    $charArray['pathrank'] = $rogueRank;
                    $rogueRank++;
                }
                else if ($character->path == "Vagabond" || $character->path == "Spellblade" || $character->path == "Assassin") {
                    $charArray['pathrank'] = $vagabondRank;
                    $vagabondRank++;
                }

                // Mage
                else if ($character->path == "Mage" || $character->path == "Summoner" || $character->path == "Elementalist" ) {
                    $charArray['pathrank'] = $mageRank;
                    $mageRank++;
                }
                else if ($character->path == "Tempest" || $character->path == "Battlemage" || $character->path == "Hexblade" ) {
                    $charArray['pathrank'] = $tempestRank;
                    $tempestRank++;
                }
                else if ($character->path == "Neophyte" || $character->path == "Shaman" || $character->path == "Spiritualist" ) {
                    $charArray['pathrank'] = $neophyteRank;
                    $neophyteRank++;
                }

                // Poet            
                else if ($character->path == "Poet" || $character->path == "Cleric" || $character->path == "Savior") {
                    $charArray['pathrank'] = $poetRank;
                    $poetRank++;
                }
                else if ($character->path == "Druid" || $character->path == "Bard" || $character->path == "Minstrel") {
                    $charArray['pathrank'] = $druidRank;
                    $druidRank++;
                }

                // Other
                else {
                    $charArray['pathrank'] = NULL;
                }

                // IF Character found in database.            
                if ($localPL != NULL && array_key_exists($charName, $localPL)) {

                    // IF arrays do not match, update data.
                    $arrayDiff = characterCompare($localPL[$charName], $charArray);
                    if (!empty($arrayDiff)) {
                        $this->cron_model->updateChar($charName, $arrayDiff);
                    }
                }
                // ELSE character not listed in data, add it.
                else {
                    $this->cron_model->insertChar([
                        'charname' => $charName,
                        'rank' => $charArray['rank'],
                        'level' => $charArray['level'],
                        'path' => $charArray['path'],
                        'subpath' => $charArray['subpath'],
                        'clan' => $charArray['clan'],
                        'clanstatus' => $charArray['clanstatus'],
                        'pathrank' => $charArray['pathrank']
                    ]);
                }
            }
        }
        
    }
    
    public function updateClans($remotePL) {
        
        
        // Go through each character and create a tally of how many members are in each clan.
        $clanTally = array();    
        foreach($remotePL->children() as $character) {
            
            if ($character->clan != "none" && $character->clan != "Immortals" ) {
                array_push($clanTally, (string) $character->clan);
            }
        }
        
        $clansCount = array_count_values($clanTally);
        
        // Fetch list of clans with member count from the database;
        $clanList = $this->cron_model->getArrayClans();
        foreach($clanList as $entry) {    
            
            $clanlistsArray[$entry['clan']]['clan'] = $entry['clan'];
            $clanlistsArray[$entry['clan']]['membercount'] = $entry['membercount'];
            
            if (!array_key_exists($entry['clan'], $clansCount)) {
                $this->cron_model->deleteClan($entry['clan']);
            }
            
        }        
        
        // Run through each clan and update/set the membercounts.
        foreach($clansCount as $key => $value) {
            
            // IF clan found in database.
            if (array_key_exists($key, $clanlistsArray)) {
                                
                // IF clan membercount is wrong, update it.
                if ($value != $clanlistsArray[$key]['membercount']) {
                    $this->cron_model->updateClan($key, [
                        'membercount' => $value,
                    ]); 
                }
            }
            // ELSE Clan not found in database so insert it.
            else {
                $this->cron_model->insertClan([
                    'clan' => $key,
                    'membercount' => $value,
                ]);  
            }
        }
        
    } 
    
    // Import Userlist
    public function buildArrayUL() {
        
        $userlist = $this->cron_model->getArrayUL();
       
        foreach($userlist as $entry) {   
            
            $userlistsArray[$entry['charname']]['username'] = $entry['charname']; 
            $userlistsArray[$entry['charname']]['title'] = $entry['title']; 
            $userlistsArray[$entry['charname']]['gender'] = $entry['gender']; 
            $userlistsArray[$entry['charname']]['vita'] = $entry['vita']; 
            $userlistsArray[$entry['charname']]['mana'] = $entry['mana']; 
            $userlistsArray[$entry['charname']]['might'] = $entry['might']; 
            $userlistsArray[$entry['charname']]['will'] = $entry['will']; 
            $userlistsArray[$entry['charname']]['grace'] = $entry['grace']; 
            $userlistsArray[$entry['charname']]['gold'] = $entry['gold']; 
            $userlistsArray[$entry['charname']]['experience'] = $entry['experience']; 
            $userlistsArray[$entry['charname']]['legend'] = $entry['legend'];
            $userlistsArray[$entry['charname']]['power'] = $entry['power'];            
            
            $userlistsArray[$entry['charname']]['carnage_part'] = $entry['carnage_part']; 
            $userlistsArray[$entry['charname']]['carnage_vic'] = $entry['carnage_vic']; 
            $userlistsArray[$entry['charname']]['carnage_perc'] = $entry['carnage_perc'];
            $userlistsArray[$entry['charname']]['carnage_rating'] = $entry['carnage_rating']; 
            $userlistsArray[$entry['charname']]['deathball_part'] = $entry['deathball_part'];
            $userlistsArray[$entry['charname']]['deathball_vic'] = $entry['deathball_vic'];
            $userlistsArray[$entry['charname']]['deathball_perc'] = $entry['deathball_perc'];
            $userlistsArray[$entry['charname']]['deathball_rating'] = $entry['deathball_rating'];
            $userlistsArray[$entry['charname']]['elixir_part'] = $entry['elixir_part'];
            $userlistsArray[$entry['charname']]['elixir_vic'] = $entry['elixir_vic'];
            $userlistsArray[$entry['charname']]['elixir_perc'] = $entry['elixir_perc'];
            $userlistsArray[$entry['charname']]['elixir_rating'] = $entry['elixir_rating'];
            $userlistsArray[$entry['charname']]['paintball_part'] = $entry['paintball_part'];
            $userlistsArray[$entry['charname']]['paintball_vic'] = $entry['paintball_vic']; 
            $userlistsArray[$entry['charname']]['paintball_perc'] = $entry['paintball_perc'];
            $userlistsArray[$entry['charname']]['paintball_rating'] = $entry['paintball_rating'];             
            $userlistsArray[$entry['charname']]['pillowfight_part'] = $entry['pillowfight_part']; 
            $userlistsArray[$entry['charname']]['pillowfight_vic'] = $entry['pillowfight_vic'];            
            $userlistsArray[$entry['charname']]['pillowfight_perc'] = $entry['pillowfight_perc'];
            $userlistsArray[$entry['charname']]['pillowfight_rating'] = $entry['pillowfight_rating'];             
                      
            $userlistsArray[$entry['charname']]['look_face'] = $entry['look_face']; 
            $userlistsArray[$entry['charname']]['look_hair'] = $entry['look_hair']; 
            $userlistsArray[$entry['charname']]['look_hair_pal'] = $entry['look_hair_pal']; 
            $userlistsArray[$entry['charname']]['look_armor'] = $entry['look_armor']; 
            $userlistsArray[$entry['charname']]['look_armor_pal'] = $entry['look_armor_pal']; 
            $userlistsArray[$entry['charname']]['look_weapon'] = $entry['look_weapon']; 
            $userlistsArray[$entry['charname']]['look_weapon_pal'] = $entry['look_weapon_pal']; 
            $userlistsArray[$entry['charname']]['look_shield'] = $entry['look_shield']; 
            $userlistsArray[$entry['charname']]['look_shield_pal'] = $entry['look_shield_pal']; 
            $userlistsArray[$entry['charname']]['look_fhair'] = $entry['look_fhair']; 
            $userlistsArray[$entry['charname']]['look_fhair_pal'] = $entry['look_fhair_pal']; 
            $userlistsArray[$entry['charname']]['look_facc'] = $entry['look_facc'];
            $userlistsArray[$entry['charname']]['look_facc_pal'] = $entry['look_facc_pal']; 
            $userlistsArray[$entry['charname']]['look_hat'] = $entry['look_hat']; 
            $userlistsArray[$entry['charname']]['look_hat_pal'] = $entry['look_hat_pal']; 
            $userlistsArray[$entry['charname']]['look_chest'] = $entry['look_chest']; 
            $userlistsArray[$entry['charname']]['look_chest_pal'] = $entry['look_chest_pal']; 
            $userlistsArray[$entry['charname']]['look_cape'] = $entry['look_cape']; 
            $userlistsArray[$entry['charname']]['look_cape_pal'] = $entry['look_cape_pal']; 
            $userlistsArray[$entry['charname']]['look_skin'] = $entry['look_skin'];
            $userlistsArray[$entry['charname']]['look_eyes'] = $entry['look_eyes'];
        
        }
        
        if (isset($userlistsArray)) { 
            return $userlistsArray;
        }
        else
        {
            return NULL;
        }
        
    }
    
    // Build History Array
    public function buildArrayHistory() {
        
        $today = date("Y-m-d");
        $history = $this->cron_model->getArrayHistory($today);
       
        foreach($history as $entry) {   
            
            $historyArray[$entry['charname']]['charname'] = $entry['charname']; 
            $historyArray[$entry['charname']]['vitacount'] = $entry['vitacount'];
            $historyArray[$entry['charname']]['manacount'] = $entry['manacount'];
            $historyArray[$entry['charname']]['mightcount'] = $entry['mightcount'];
            $historyArray[$entry['charname']]['gracecount'] = $entry['gracecount'];
            $historyArray[$entry['charname']]['willcount'] = $entry['willcount'];
            $historyArray[$entry['charname']]['xpcount'] = $entry['xpcount'];
            
        }
        
        if (isset($historyArray)) {   
            return $historyArray;    
        }
        else {
            return NULL;
        }
        
    } 
    
    public function updateUserLists($remoteUL, $localUL, $localPL, $characterHistoryAll) {           
                
        foreach($remoteUL->children() as $character) {
                        
            // Set values of objects into an array so we can compare them later.
            $charArray['username'] = $charName = ucfirst(strtolower((string) $character->username));
            $charArray['title'] = (string)$character->title;
            $charArray['gender'] = (string)$character->gender;
            $charArray['look_face'] = (string)$character->look_face;
            $charArray['look_hair'] = (string)$character->look_hair;
            $charArray['look_hair_pal'] = (string)$character->look_hair_pal;
            $charArray['look_armor'] = (string)$character->look_armor;
            $charArray['look_armor_pal'] = (string)$character->look_armor_pal;
            $charArray['look_weapon'] = (string)$character->look_weapon;
            $charArray['look_weapon_pal'] = (string)$character->look_weapon_pal;
            $charArray['look_shield'] = (string)$character->look_shield;
            $charArray['look_shield_pal'] = (string)$character->look_shield_pal;
            $charArray['look_fhair'] = (string)$character->look_fhair;
            $charArray['look_fhair_pal'] = (string)$character->look_fhair_pal;
            $charArray['look_facc'] = (string)$character->look_facc;
            $charArray['look_facc_pal'] = (string)$character->look_facc_pal;
            $charArray['look_hat'] = (string)$character->look_hat;
            $charArray['look_hat_pal'] = (string)$character->look_hat_pal;
            $charArray['look_chest'] = (string)$character->look_chest;
            $charArray['look_chest_pal'] = (string)$character->look_chest_pal;
            $charArray['look_cape'] = (string)$character->look_cape;
            $charArray['look_cape_pal'] = (string)$character->look_cape_pal;
            $charArray['look_skin'] = (string)$character->look_skin;
            $charArray['look_eyes'] = (string)$character->look_eyes;

            // NULL values for those not set.            
            if (empty($charArray['title'])) { $charArray['title'] = NULL;}
            if (isset($character->gold) && $character->gold >= 0) { $charArray['gold'] = (string)$character->gold;} else { $charArray['gold'] = NULL; }
            
            if (isset($character->vita) && $character->vita >= 0) {
                $charArray['vita'] = (string)$character->vita;
                $charArray['mana'] = (string)$character->mana;
                $charArray['might'] = (string)$character->might;
                $charArray['will'] = (string)$character->will;
                $charArray['grace'] = (string)$character->grace;
                $charArray['power'] = (string)$character->power;
                $charArray['experience'] = (string)$character->experience;   
            } 
            else {$charArray['vita'] = $charArray['mana'] = $charArray['might'] = $charArray['will'] = $charArray['grace'] = $charArray['power'] = $charArray['experience'] = NULL;}
                        
            // Event Particpations, win percentage and rating. Followed by legend encoding.
            $charArray = array_merge($charArray, eventParticipation($character->legend));    
            $charArray['carnage_perc'] = eventWinPercentage($charArray['carnage_part'], $charArray['carnage_vic']);
            $charArray['deathball_perc'] = eventWinPercentage($charArray['deathball_part'], $charArray['deathball_vic']);
            $charArray['elixir_perc'] = eventWinPercentage($charArray['elixir_part'], $charArray['elixir_vic']);
            $charArray['paintball_perc'] = eventWinPercentage($charArray['paintball_part'], $charArray['paintball_vic']);
            $charArray['pillowfight_perc'] = eventWinPercentage($charArray['pillowfight_part'], $charArray['pillowfight_vic']);

            $charArray['carnage_rating'] = eventWinRating($charArray['carnage_part'], $charArray['carnage_vic'], $charArray['carnage_perc']);
            $charArray['deathball_rating'] = eventWinRating($charArray['deathball_part'], $charArray['deathball_vic'], $charArray['deathball_perc']);
            $charArray['elixir_rating'] = eventWinRating($charArray['elixir_part'], $charArray['elixir_vic'], $charArray['elixir_perc']);
            $charArray['paintball_rating'] = eventWinRating($charArray['paintball_part'], $charArray['paintball_vic'], $charArray['paintball_perc']);
            $charArray['pillowfight_rating'] = eventWinRating($charArray['pillowfight_part'], $charArray['pillowfight_vic'], $charArray['pillowfight_perc']);

            $charArray['legend'] = encodeLegend($character->legend, $charArray['username']);
                                  
            // IF Character userdata found in database. 
            if ($localUL != NULL && array_key_exists($charName, $localUL)) {
                                
                // Is Local and Remote data different? If so, update the user!
                $arrayDiff = characterCompare($localUL[$charName], $charArray);
                                                
                if (!empty($arrayDiff)) {
                    $this->cron_model->updateChar($charName, $arrayDiff);
                }
                
                if ($charArray['vita'] != NULL) {
                    
                    $today = date("Y-m-d");
                                        
                    $vitaDiff = statChecker($charArray['vita'], $localUL[$charName]['vita']);
                    $manaDiff = statChecker($charArray['mana'], $localUL[$charName]['mana']);
                    $mightDiff = statChecker($charArray['might'], $localUL[$charName]['might']);
                    $graceDiff = statChecker($charArray['grace'], $localUL[$charName]['grace']);
                    $willDiff = statChecker($charArray['will'], $localUL[$charName]['will']);                    
                    $xpDiff = statChecker($charArray['experience'], $localUL[$charName]['experience']);
                    
                    $is99 = (isset($localPL[$charName]['level']) && $localPL[$charName]['level'] == 99) ? true : false;     
                    
                    // Fetch specific character's history, if not found set to NULL.
                    if ($characterHistoryAll != NULL && array_key_exists($charName, $characterHistoryAll)) {          
                        $characterHistory = $characterHistoryAll[$charName];
                    } 
                    else {$characterHistory = NULL;}
                                                            
                    if ($characterHistory != NULL) {
                        if ($vitaDiff != 0 || $manaDiff != 0 || $mightDiff != 0 || $graceDiff != 0 || $willDiff != 0 || $xpDiff != 0 AND $is99) {
                            
                        // Character found in history database.
                            $this->cron_model->updateHistory([
                                'vitacount' => $vitaDiff,
                                'manacount' => $manaDiff,
                                'mightcount' => $mightDiff,
                                'gracecount' => $graceDiff,
                                'willcount' => $willDiff,
                                'xpcount' => $xpDiff,
                                'charname' => $charName,
                                'date' => $today                                   
                            ]);
                        }
                    }
                    else {
                        if ($vitaDiff != 0 || $manaDiff != 0 || $mightDiff != 0 || $graceDiff != 0 || $willDiff != 0 || $xpDiff != 0 AND $is99) {
                            
                            // Character not found in history database -> insert record.
                            $this->cron_model->insertHistory([
                                'charname' => $charName,
                                'date' => $today,
                                'vitacount' => $vitaDiff,
                                'manacount' => $manaDiff,
                                'mightcount' => $mightDiff,
                                'gracecount' => $graceDiff,
                                'willcount' => $willDiff,
                                'xpcount' => $xpDiff
                            ]);

                        }
                    } 
                }
            }
            // ELSE IF Character userdata not found in database. 
            else if ($charArray['gender'] != NULL) {
                      
                unset($charArray['username']);
                $this->cron_model->updateChar($charName, $charArray);
 
            }
            else { /* Final Catch */ }
        }
        
    }
    
    // Import Events
    public function updateEvents($eventsData) {
        
        $i = 1;
        
        // FOREACH event, update event by id.
        foreach($eventsData->children() as $event) {
            
            $this->cron_model->updateEvent($i, [
                'eventname' => $event->eventname,
                'eventtime' => $event->eventtime,
            ]);
            
            $i++;
            
        }
    }
    
    // Who is online?
    public function onlineStatus($whoData) {        
        
        // FOREACH character, add them to an array.
        foreach ($whoData->children() as $who) {
                        
            $whoArray[ucfirst(strtolower((string) $who->username))] = (string) $who->username;
            
        }
        
        // Get online status of all characters and current time.
        $charOnlineList = $this->cron_model->getOnlineStatus();
        $epoch = time();
       
        // FOREACH character, check if they are in the currently online list
        foreach ($charOnlineList as $character) {
            
            // IF character in online list
            if (array_key_exists($character['charname'], $whoArray)) {
                
                // IF character is set as offline, update them to the correct status: online.
                if ($character['online'] == 0) {
                    $this->cron_model->updateChar($character['charname'], [
                        'online' => 1,
                        'online_change' => $epoch,
                    ]); 
                }
            }
            // IF character not in online list
            else {
                
                // IF character is set as online, update them to the correct status: offine.
                if ($character['online'] != 0) {
                    $this->cron_model->updateChar($character['charname'], [
                        'online' => 0,
                        'online_change' => $epoch,
                    ]);
                }
            }
        }
        
    }
    
    // Fetch Powerlist Data, load the XML into an array, flatten it and then inset/update database.
    public function cleanupDatabase()
    {        
        $fp = fsockopen("www.therealmofchaos.com", 443, $errno, $errstr, 10);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        }
        else {
            $remotePL = pollAPI("api_powerlist.php");
            $remoteUL = pollAPI("api_userlist.php");
            $localPL = $this->buildArrayPL();
            $localUL = $this->buildArrayUL();
            
            if ($localPL != NULL || $localUL != NULL) {

                // Check for removed userpages
                foreach($remoteUL->children() as $character) { 
                    
                    $charName = ucfirst(strtolower((string) $character->username));
                    $userlistsCheck[$charName] = 1; 
                
                }

                foreach($localUL as $character) {
                                        
                    if (!array_key_exists($character['username'], $userlistsCheck)) {          
                                                
                        if (cleanupCheck($character)) {
                            $this->cron_model->deleteHistory($character['username']);

                            $this->cron_model->updateChar($character['username'], [
                                'title' => null,
                                'gender' => null,
                                'vita' => null,
                                'mana' => null,
                                'might' => null,
                                'will' => null,
                                'grace' => null,
                                'power' => null,
                                'gold' => null,
                                'experience' => null,
                                'legend' => null,
                                'carnage_part' => null,
                                'carnage_vic' => null,
                                'carnage_perc' => null,
                                'carnage_rating' => null,                        
                                'deathball_part' => null,
                                'deathball_vic' => null,
                                'deathball_perc' => null,
                                'deathball_rating' => null,
                                'elixir_part' => null,
                                'elixir_vic' => null,
                                'elixir_perc' => null,
                                'elixir_rating' => null,                        
                                'paintball_part' => null,
                                'paintball_vic' => null,
                                'paintball_perc' => null,
                                'paintball_rating' => null,                        
                                'pillowfight_part' => null,
                                'pillowfight_vic' => null,
                                'pillowfight_perc' => null,
                                'pillowfight_rating' => null,                        
                                'look_face' => null,
                                'look_hair' => null,
                                'look_hair_pal' => null,
                                'look_armor' => null,
                                'look_armor_pal' => null,
                                'look_weapon' => null,
                                'look_weapon_pal' => null,
                                'look_shield' => null,
                                'look_shield_pal' => null,
                                'look_fhair' => null,
                                'look_fhair_pal' => null,
                                'look_facc' => null,
                                'look_facc_pal' => null,
                                'look_hat' => null,
                                'look_hat_pal' => null,
                                'look_chest' => null,
                                'look_chest_pal' => null,
                                'look_cape' => null,
                                'look_cape_pal' => null,
                                'look_skin' => null,
                                'look_eyes' => null,
                            ]);
                        }
                    }
                }
                
                // Check for removed characters.
                $powerlistsCheck = array();

                foreach ($remotePL->children() as $character) {

                    $charName = ucfirst(strtolower((string) $character->charname));
                    array_push($powerlistsCheck, $charName);

                }

                foreach($localPL as $character) {
                    
                    if (!in_array($character['charname'], $powerlistsCheck)) {
                        $this->cron_model->deleteChar($character['charname']);
                    }
                
                }
            }
        }
        
    }
    
}