<?php
class Json extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();

        switch(ENVIRONMENT)
        {
            case 'development':
                // Do Nothing
            break;
        
            case 'production':
            default:
                if (!$this->input->is_ajax_request()) {
                    exit('No direct access allowed');
                }
            break;
        }
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");       
        
        $this->load->helper('path');
        $this->load->helper('stats');
        $this->load->model('json_model');
    }
    
    public function playerRankings($path = null)
    {         
        if(isset($_GET["limit"])) { $limit = $_GET["limit"]; }
         else { $limit = 25; }

        if(isset($_GET["offset"])) { $offset = $_GET["offset"]; }
         else { $offset = 0; }

        if(isset($_GET["sort"])) { $sort = $_GET["sort"]; } 
         else { $sort = null; }

        if(isset($_GET["order"])) { $order = $_GET["order"]; }
         else { $order = "desc"; }

        if(isset($_GET["search"])) { $search = $_GET["search"]; }
         else { $search = null; }
        
        $result = $this->json_model->getRankingStats($search, $sort, $order, $path);
 
        $resultFormat = array();

        foreach ($result as $value)
        {
            $value['charname'] = "<a href=\"/characters/".$value['charname']."/\">".$value['charname']."</a>";
            
            if ($value['clan'] == "none")
            {
                $value['clan'] = null;
            }
            else
            {
                $clanURL = str_replace(' ', '-', $value['clan']);
                $value['clan'] = "<a href=\"/clans/".$clanURL."/\">".$value['clan']."</a>";
            }
                        
            if ($value['vita'] != null) { $value['vita'] = number_format($value['vita']); }
            if ($value['mana'] != null) { $value['mana'] = number_format($value['mana']); }
            if ($value['power'] != null) { $value['power'] = number_format($value['power']); }
            
            $value['path'] = pathFix($value['path'], $value['subpath']);
            
            array_push($resultFormat, $value);
        }
        
        $count = count($resultFormat);
        
        //get the subview of the array
        $resultFormat = array_slice($resultFormat, $offset, $limit);
        
        echo "{";
        echo '"total": ' . $count . ',';
        echo '"rows": ';
        echo json_encode($resultFormat, JSON_HEX_QUOT | JSON_HEX_TAG);
        echo "}";
    }
    
    public function eventRankings($event = null)
    {   
        if(isset($_GET["limit"])) { $limit = $_GET["limit"]; }
         else { $limit = 25; }

        if(isset($_GET["offset"])) { $offset = $_GET["offset"]; }
         else { $offset = 0; }

        if(isset($_GET["sort"])) { $sort = $_GET["sort"]; } 
         else { $sort = null; }

        if(isset($_GET["order"])) { $order = $_GET["order"]; }
         else { $order = "desc"; }

        if(isset($_GET["search"])) { $search = $_GET["search"]; }
         else { $search = null; }
                                
        $result = $this->json_model->getEventStats($search, $sort, $order, $event);
 
        $resultFormat = array();

        foreach ($result as $value)
        {
            $value['charname'] = "<a href=\"/characters/".$value['charname']."/\">".$value['charname']."</a>";   
            
            array_push($resultFormat, $value);
        }
        
        $count = count($resultFormat);
        
        //get the subview of the array
        $resultFormat = array_slice($resultFormat, $offset, $limit);
        
        echo "{";
        echo '"total": ' . $count . ',';
        echo '"rows": ';
        echo json_encode($resultFormat, JSON_HEX_QUOT | JSON_HEX_TAG);
        echo "}";
    }
    
    public function goldRankings()
    {   
        if(isset($_GET["limit"])) { $limit = $_GET["limit"]; }
         else { $limit = 25; }

        if(isset($_GET["offset"])) { $offset = $_GET["offset"]; }
         else { $offset = 0; }

        if(isset($_GET["sort"])) { $sort = $_GET["sort"]; } 
         else { $sort = null; }

        if(isset($_GET["order"])) { $order = $_GET["order"]; }
         else { $order = "desc"; }

        if(isset($_GET["search"])) { $search = $_GET["search"]; }
         else { $search = null; }
                                
        $result = $this->json_model->getGoldStats($search, $sort, $order);
 
        $resultFormat = array();

        foreach ($result as $value)
        {
            $value['charname'] = "<a href=\"/characters/".$value['charname']."/\">".$value['charname']."</a>";   
            
            if ($value['gold'] != null) { $value['gold'] = number_format($value['gold']); }
            
            array_push($resultFormat, $value);
        }
        
        $count = count($resultFormat);
        
        //get the subview of the array
        $resultFormat = array_slice($resultFormat, $offset, $limit);
        
        echo "{";
        echo '"total": ' . $count . ',';
        echo '"rows": ';
        echo json_encode($resultFormat, JSON_HEX_QUOT | JSON_HEX_TAG);
        echo "}";
    }

    public function clanRoster($clan)
    {   
        $clan = str_replace('-', ' ', $clan);
        $result = array();
                
        if(isset($_GET["limit"])) { $limit = $_GET["limit"]; }
         else { $limit = 25; }

        if(isset($_GET["offset"])) { $offset = $_GET["offset"]; }
         else { $offset = 0; }

        if(isset($_GET["sort"])) { $sort = $_GET["sort"]; } 
         else { $sort = null; }

        if(isset($_GET["order"])) { $order = $_GET["order"]; }
         else { $order = "desc"; }

        if(isset($_GET["search"])) { $search = $_GET["search"]; }
         else if (isset($_GET["search"]) && $_GET["search"] == "") { $search = null; } else { $search = null; }
        
        if ($sort == "clanstatus" && $search == null)
        {
            $sort = "charname";
            $order2 = "asc";
            $leader = $this->json_model->getClanLeader($clan, $search, $sort, $order2);
            $officers = $this->json_model->getClanOfficers($clan, $search, $sort, $order2);
            $members = $this->json_model->getClanMembers($clan, $search, $sort, $order2);
            
            if ($order == "asc")
            {                
                foreach($leader as $value) { array_push($result, $value); }
                foreach($officers as $value) { array_push($result, $value); }
                foreach($members as $value) { array_push($result, $value); }
            }
            else
            {
                foreach($members as $value) { array_push($result, $value); }
                foreach($officers as $value) { array_push($result, $value); }
                foreach($leader as $value) { array_push($result, $value); }
            }
        }
        else if ($sort == "level")
        {
            $sort = "rank";
            
            $result = $this->json_model->getClanRoster($clan, $search, $sort, $order);
        }        
        else
        {
            $result = $this->json_model->getClanRoster($clan, $search, $sort, $order);
        }
                
        $resultFormat = array();
        date_default_timezone_set('America/New_York');
        
        foreach ($result as $value)
        {
            $value['charname'] = "<a href=\"/characters/".$value['charname']."/\">".$value['charname']."</a>";
                        
            $value['path'] = pathFix($value['path'], $value['subpath']);

            if ($value['subpath'] == "eesan")
            {
                $value['level'] = "<img src=\"/assets/img/profile/mark-eesan.png\" alt=\"eesan\" height=\"16\" width=\"16\" /> Ee San";
            }            
            
            if ($value['subpath'] == "ilsan")
            {
                $value['level'] = "<img src=\"/assets/img/profile/mark-ilsan.png\" alt=\"ilsan\" height=\"16\" width=\"16\" /> Il San";
            }
            
            if ($value['online'] == 1)
            {
                $value['online_change'] = "<img src=\"/assets/img/profile/online.png\" alt=\"online\" height=\"16\" width=\"16\" /> Online";
            }
            else
            {
                if ($value['online_change'] != NULL)
                {
                    $value['online_change'] = "<img src=\"/assets/img/profile/offline.png\" alt=\"offline\" height=\"16\" width=\"16\" /> ".date('jS M Y', $value['online_change']);
                }
            }
            
            array_push($resultFormat, $value);
        }
        
        $count = count($resultFormat);
        
        //get the subview of the array
        $resultFormat = array_slice($resultFormat, $offset, $limit);
        
        echo "{";
        echo '"total": ' . $count . ',';
        echo '"rows": ';
        echo json_encode($resultFormat, JSON_HEX_QUOT | JSON_HEX_TAG);
        echo "}";
    }
    
    public function clanList()
    {   
        if(isset($_GET["limit"])) { $limit = $_GET["limit"]; }
         else { $limit = 25; }

        if(isset($_GET["offset"])) { $offset = $_GET["offset"]; }
         else { $offset = 0; }

        if(isset($_GET["sort"])) { $sort = $_GET["sort"]; } 
         else { $sort = null; }

        if(isset($_GET["order"])) { $order = $_GET["order"]; }
         else { $order = "desc"; }

        if(isset($_GET["search"])) { $search = $_GET["search"]; }
         else { $search = null; }
                                
        $result = $this->json_model->getClanList($search, $sort, $order);
        $clanleaders = $this->json_model->getClanLeaders();
         
        $resultFormat = array();
        
        foreach ($clanleaders as $leader)
        {
            $clanFormat[$leader['clan']] = "<a href=\"/characters/".$leader['charname']."/\">".$leader['charname']."</a>";
        }

        foreach ($result as $value)
        {
            if (isset($clanFormat[$value['clan']]))
            { 
                $value['clanleader'] = $clanFormat[$value['clan']];  
            }
            $clanURL = str_replace(' ', '-', $value['clan']);
            $value['clan'] = "<a href=\"/clans/".$clanURL."/\">".$value['clan']."</a>";
            
            array_push($resultFormat, $value);
        }
        
        $count = count($resultFormat);
        
        //get the subview of the array
        $resultFormat = array_slice($resultFormat, $offset, $limit);
        
        echo "{";
        echo '"total": ' . $count . ',';
        echo '"rows": ';
        echo json_encode($resultFormat, JSON_HEX_QUOT | JSON_HEX_TAG);
        echo "}";
    }
    
    public function characterSearch()
    {   
        if(isset($_GET["search"])) { $search = $_GET["search"]; }
         else { $search = null; }
        
        $searchlength = strlen($search);
        
        if ($searchlength == 1)
        {
            $result = $this->json_model->getCharacterSearch($search);

            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
        else if ($search != null || $search != "")
        {
            $result = $this->json_model->getCharacterSearch2($search);

            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
    }
    
    public function expCalculator()
    {   
        if(isset($_GET["type"])) { $type = $_GET["type"]; }        
        if(isset($_GET["current"])) { $current = $_GET["current"]; }
        if(isset($_GET["desired"])) { $desired = $_GET["desired"]; } 

        $data = array('type' => $type, 'current' => $current, 'desired' => $desired);
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('generation', 'Generation', 'alpha');         
        $this->form_validation->set_rules('vita', 'Vita', 'numeric');
        $this->form_validation->set_rules('mana', 'Mana', 'numeric');        

        if ($this->form_validation->run() === FALSE) // validation failed
        {
            $result['data'] = -9999;
        }
        else {
            if ($type == "Vita" || $type == "Mana")
            {
                $currentXP = vitamana2XP($type, $current);
                $desiredXP = vitamana2XP($type, $desired);
            }

            if ($type == "Stats")
            {
                $currentXP = stat2XP($current);
                $desiredXP = stat2XP($desired);
            }

            $requiredXP = $desiredXP - $currentXP;

            if ($requiredXP <= 0)
            {
                $result['data'] = 0; 
            }
            else
            {
                $result['data'] = $requiredXP;
            }
               
            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
    }
    
    public function wpnUpgradeCalculator()
    {   
        if(isset($_GET["generation"])) { $generation = $_GET["generation"]; } else { $generation = "current";}
        if(isset($_GET["upgrade"])) { $upgrade = $_GET["upgrade"]; } else { $upgrade = 0;}        
        if(isset($_GET["smalldmg"])) { $smalldamage = $_GET["smalldmg"]; } else { $smalldamage = 0;} 
        if(isset($_GET["largedmg"])) { $largedamage = $_GET["largedmg"]; } else { $largedamage = 0;} 
        if(isset($_GET["vita"])) { $vita = $_GET["vita"]; } else { $vita = 0;} 
        if(isset($_GET["mana"])) { $mana = $_GET["mana"]; } else { $mana = 0;} 
        
        $data = array('generation' => $generation, 'upgrade' => $upgrade, 'smalldamage' => $smalldamage, 'largedamage' => $largedamage, 'vita' => $vita, 'mana' => $mana);
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('generation', 'Generation', 'alpha');
        $this->form_validation->set_rules('upgrade', 'Upgrade', 'numeric');
        $this->form_validation->set_rules('smalldamage', 'Small Damage', 'numeric');
        $this->form_validation->set_rules('largedamage', 'Large Damage', 'numeric');             
        $this->form_validation->set_rules('vita', 'Vita', 'numeric');
        $this->form_validation->set_rules('mana', 'Mana', 'numeric');                

        if ($this->form_validation->run() === FALSE) // validation failed
        {
            // Return data which we would never normally see, so we know there is an issue with the validation.
            $result['smalldamage'] = -9999;
            $result['largedamage'] = -9999;            
            $result['vita'] = -9999;
            $result['mana'] = -9999;
            
            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
        else
        {         
            if ($generation == "current")
            {
                $result['smalldamage'] = round($smalldamage * 1.025 ** $upgrade);
                $result['largedamage'] = round($largedamage * 1.025 ** $upgrade);
                $result['vita'] = round($vita * 1.1 ** $upgrade);
                $result['mana'] = round($mana * 1.1 ** $upgrade);            
            }

            if ($generation == "prenerf")
            {
                $result['smalldamage'] = round($smalldamage * 1.075 ** $upgrade);
                $result['largedamage'] = round($largedamage * 1.075 ** $upgrade);
                $result['vita'] = round($vita * 1.2 ** $upgrade);
                $result['mana'] = round($mana * 1.2 ** $upgrade);             
            }    

            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
    }
    
    public function itmUpgradeCalculator()
    {   
        if(isset($_GET["generation"])) { $generation = $_GET["generation"]; } else { $generation = "current";}
        if(isset($_GET["upgrade"])) { $upgrade = $_GET["upgrade"]; } else { $upgrade = 1;}        
        if(isset($_GET["type"])) { $type = $_GET["type"]; } else { $type = 0;} 
        if(isset($_GET["ac"])) { $ac = $_GET["ac"]; } else { $ac = 0;} 
        if(isset($_GET["vita"])) { $vita = $_GET["vita"]; } else { $vita = 0;} 
        if(isset($_GET["mana"])) { $mana = $_GET["mana"]; } else { $mana = 0;} 
        
        $data = array('generation' => $generation, 'type' => $type, 'upgrade' => $upgrade, 'ac' => $ac, 'vita' => $vita, 'mana' => $mana);
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('generation', 'Generation', 'alpha');
        $this->form_validation->set_rules('type', 'Type', 'alpha');
        $this->form_validation->set_rules('upgrade', 'Upgrade', 'numeric');
        $this->form_validation->set_rules('vita', 'Vita', 'numeric');
        $this->form_validation->set_rules('mana', 'Mana', 'numeric');        
        $this->form_validation->set_rules('ac', 'AC', 'alpha_dash'); 

        if ($this->form_validation->run() === FALSE) // validation failed
        {
            // Return data which we would never normally see, so we know there is an issue with the validation.
            $result['vita'] = -9999;
            $result['mana'] = -9999;
            $result['ac'] = -9999;
            
            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
        else
        {        
            if ($generation == "current")
            {
                if ($type == "armor" || $type == "shield")
                {
                    $result['vita'] = round($vita * 1.2 ** $upgrade);
                    $result['mana'] = round($mana * 1.2 ** $upgrade);  
                    $result['ac'] = $ac;
                }
                else if ($type == "hand")
                {
                    $result['vita'] = round($vita * 1.1 ** $upgrade);
                    $result['mana'] = round($mana * 1.1 ** $upgrade);
                    $result['ac'] = $ac;                
                } 
                else 
                {
                    $result['vita'] = 0;
                    $result['mana'] = 0;
                    $result['ac'] = 0;  
                }    
            }

            if ($generation == "prenerf")
            {
                if ($type == "armor")
                {
                    $result['vita'] = round($vita * 1.2 ** $upgrade);
                    $result['mana'] = round($mana * 1.2 ** $upgrade);              

                    for ($count = 1; $count <= $upgrade; $count++ )
                    {     
                        if (($count % 2) == 1)
                        {                      
                            $ac--;
                        }
                    }

                    $result['ac'] = $ac;
                }
                else if ($type == "shield")
                {
                    $result['vita'] = round($vita * 1.2 ** $upgrade);
                    $result['mana'] = round($mana * 1.2 ** $upgrade);              

                    for ($count = 1; $count <= $upgrade; $count++ )
                    {     
                        if (($count % 2) == 1)
                        {                      
                            $ac--;
                        }
                    }

                    $result['ac'] = $ac;
                }
                else if ($type == "hand")
                {
                    $result['vita'] = round($vita * 1.1 ** $upgrade);
                    $result['mana'] = round($mana * 1.1 ** $upgrade);              

                    for ($count = 1; $count <= $upgrade; $count++ )
                    {     
                        if (($count % 3) == 0)
                        {                      
                            $ac--;
                        }
                    }

                    $result['ac'] = $ac;
                } 
                else 
                {
                    $result['vita'] = 0;
                    $result['mana'] = 0;
                    $result['ac'] = 0;  
                }           
            }

            echo json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
        }
    }      
    
}