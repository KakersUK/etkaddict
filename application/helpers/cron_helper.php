<?php

function pollAPI($url) {
    
    $url = "https://www.therealmofchaos.com/".$url;
    
    // Get API Data
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $apiData = curl_exec($ch);
    curl_close($ch);
    
    // Check file is in XML format
    if(substr($apiData, 0, 5) != "<?xml"){
        die("Invalid XML on API: ".$url);
    }
    
    // Load XML into variable and return it.
    $xml = simplexml_load_string($apiData);
    unset($xml->lastupdated);
    unset($xml->total);
        
    if (!empty($xml)) {
        return $xml;
    }
    
}

function statChecker($remote, $local) {
    
    if ($remote > $local && $remote != NULL) {
        $difference = $remote - $local; 
    }
    else {
        $difference = 0;
    }
    
    return $difference;
    
} 

function eventParticipation($legend) {
    
    foreach ($legend->children() as $entry) {                              
                
        // Carnages
        if (preg_grep("/(Participated in).*(carnages)/", explode("\n", $entry->entrytext))) {  
            $eventStats['carnage_part'] = preg_replace("/[^0-9]/","", $entry->entrytext);
        }
        
        if (preg_grep("/.*(carnage victory)/", explode("\n", $entry->entrytext)) || preg_grep("/.*(carnage victories)/", explode("\n", $entry->entrytext))) { 
            $eventStats['carnage_vic'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        // Deathballs
        if (preg_grep("/(Participated in).*(deathball games)/", explode("\n", $entry->entrytext))) { 
            $eventStats['deathball_part'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        if (preg_grep("/.*(deathball victory)/", explode("\n", $entry->entrytext)) || preg_grep("/.*(deathball victories)/", explode("\n", $entry->entrytext))) {
            $eventStats['deathball_vic'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        // Elixirs
        if (preg_grep("/(Participated in).*(elixir wars)/", explode("\n", $entry->entrytext))) {
            $eventStats['elixir_part'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        if (preg_grep("/.*(elixir war victory)/", explode("\n", $entry->entrytext)) || preg_grep("/.*(elixir war victories)/", explode("\n", $entry->entrytext))) {
            $eventStats['elixir_vic'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        // Paintballs
        if (preg_grep("/(Participated in).*(games of paintball)/", explode("\n", $entry->entrytext))) {
            $eventStats['paintball_part'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        if (preg_grep("/.*(paintball victory)/", explode("\n", $entry->entrytext)) || preg_grep("/.*(paintball victories)/", explode("\n", $entry->entrytext))) {
            $eventStats['paintball_vic'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        } 

        // Pillow fights
        if (preg_grep("/(Participated in).*(pillow fights)/", explode("\n", $entry->entrytext))) {
            $eventStats['pillowfight_part'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }

        if (preg_grep("/.*(pillow fight victory)/", explode("\n", $entry->entrytext)) || preg_grep("/.*(pillow fight victories)/", explode("\n", $entry->entrytext))) {
            $eventStats['pillowfight_vic'] = preg_replace("/[^0-9]/","",$entry->entrytext);
        }
        
    }  
    
    if (!isset($eventStats['carnage_part'])) { $eventStats['carnage_part'] = 0; }
    if (!isset($eventStats['carnage_vic'])) { $eventStats['carnage_vic'] = 0; }
    if (!isset($eventStats['deathball_part'])) { $eventStats['deathball_part'] = 0; }
    if (!isset($eventStats['deathball_vic'])) { $eventStats['deathball_vic'] = 0; }
    if (!isset($eventStats['elixir_part'])) { $eventStats['elixir_part'] = 0; }
    if (!isset($eventStats['elixir_vic'])) { $eventStats['elixir_vic'] = 0; }
    if (!isset($eventStats['paintball_part'])) { $eventStats['paintball_part'] = 0; }
    if (!isset($eventStats['paintball_vic'])) { $eventStats['paintball_vic'] = 0; }
    if (!isset($eventStats['pillowfight_part'])) { $eventStats['pillowfight_part'] = 0; }
    if (!isset($eventStats['pillowfight_vic'])) { $eventStats['pillowfight_vic'] = 0; }
    
    return $eventStats;
    
}

function eventWinPercentage($participation, $victories) {
    
    if ($participation > 0) {
        $winPercentage = number_format((float)round(100 / $participation * $victories, 2), 2, '.', '');
    }
    else {
        $winPercentage = 0.00;
    }
        
    return $winPercentage;
    
}

function eventWinRating($participations, $victories, $winPercentage) {
    
    $losses = $participations - $victories;
    $lossPercentage = 100 - $winPercentage;
    
    if ($victories == 0) {
        $lossPercentage = 100;
    }
    
    $winRating = round($winPercentage * $victories - $lossPercentage * $losses);
    
    return $winRating;
    
}

function encodeLegend($legend) {
    
    $legendArray = array();
        
    foreach ($legend->children() as $entry) { 
        
        if (!empty($entry->entryicon) && !empty($entry->entrycolor) && !empty($entry->entrytext)) {
            array_push($legendArray, (array)$entry);
        }
                
    }

    $legendArray = base64_encode(serialize($legendArray));
    
    return $legendArray;
    
}

function characterCompare($localData, $remoteData) {
        
    $dataDiff = array();
        
    foreach ($remoteData as $key => $value) {
                
        if ($value != $localData[$key]) {
            $dataDiff[$key] = $value;
        }
        
    }
    
    return $dataDiff;
    
}

function cleanupCheck($localData) {
    
    if (!is_null($localData['username'])) { return true; }
    if (!is_null($localData['title'])) { return true; }
    if (!is_null($localData['gender'])) { return true; }
    if (!is_null($localData['vita'])) { return true; }
    if (!is_null($localData['mana'])) { return true; }
    if (!is_null($localData['might'])) { return true; }
    if (!is_null($localData['will'])) { return true; }
    if (!is_null($localData['grace'])) { return true; }
    if (!is_null($localData['gold'])) { return true; }
    if (!is_null($localData['experience'])) { return true; }
    if (!is_null($localData['legend'])) { return true; }
    if (!is_null($localData['power'])) { return true; }           

    if (!is_null($localData['carnage_part'])) { return true; }
    if (!is_null($localData['carnage_vic'])) { return true; }
    if (!is_null($localData['carnage_perc'])) { return true; }
    if (!is_null($localData['carnage_rating'])) { return true; }
    if (!is_null($localData['deathball_part'])) { return true; }
    if (!is_null($localData['deathball_vic'])) { return true; }
    if (!is_null($localData['deathball_perc'])) { return true; }
    if (!is_null($localData['deathball_rating'])) { return true; }
    if (!is_null($localData['elixir_part'])) { return true; }
    if (!is_null($localData['elixir_vic'])) { return true; }
    if (!is_null($localData['elixir_perc'])) { return true; }
    if (!is_null($localData['elixir_rating'])) { return true; }
    if (!is_null($localData['paintball_part'])) { return true; }
    if (!is_null($localData['paintball_vic'])) { return true; }
    if (!is_null($localData['paintball_perc'])) { return true; }
    if (!is_null($localData['paintball_rating'])) { return true; }            
    if (!is_null($localData['pillowfight_part'])) { return true; }
    if (!is_null($localData['pillowfight_vic'])) { return true; }           
    if (!is_null($localData['pillowfight_perc'])) { return true; }
    if (!is_null($localData['pillowfight_rating'])) { return true; }            

    if (!is_null($localData['look_face'])) { return true; }
    if (!is_null($localData['look_hair'])) { return true; }
    if (!is_null($localData['look_hair_pal'])) { return true; }
    if (!is_null($localData['look_armor'])) { return true; }
    if (!is_null($localData['look_armor_pal'])) { return true; }
    if (!is_null($localData['look_weapon'])) { return true; }
    if (!is_null($localData['look_weapon_pal'])) { return true; }
    if (!is_null($localData['look_shield'])) { return true; }
    if (!is_null($localData['look_shield_pal'])) { return true; }
    if (!is_null($localData['look_fhair'])) { return true; }
    if (!is_null($localData['look_fhair_pal'])) { return true; }
    if (!is_null($localData['look_facc'])) { return true; }
    if (!is_null($localData['look_facc_pal'])) { return true; }
    if (!is_null($localData['look_hat'])) { return true; }
    if (!is_null($localData['look_hat_pal'])) { return true; }
    if (!is_null($localData['look_chest'])) { return true; }
    if (!is_null($localData['look_chest_pal'])) { return true; }
    if (!is_null($localData['look_cape'])) { return true; }
    if (!is_null($localData['look_cape_pal'])) { return true; }
    if (!is_null($localData['look_skin'])) { return true; }
    if (!is_null($localData['look_eyes'])) { return true; }
    
}