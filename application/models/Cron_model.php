<?php

class Cron_model extends CI_Model
{   
    // Fetch
    public function getArrayPL() 
    {
        $this->db->select('charname, rank, pathrank, level, path, subpath, clan, clanstatus');
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getArrayUL() 
    {
        $this->db->select('charname, title, gender, look_face, look_hair, look_hair_pal, look_armor, look_armor_pal, look_weapon, look_weapon_pal, look_shield, look_shield_pal, look_fhair, look_fhair_pal, look_facc, look_facc_pal, look_hat, look_hat_pal, look_chest, look_chest_pal, look_cape, look_cape_pal, look_skin, look_eyes, legend, vita, mana, might, will, grace, power, experience, gold, carnage_part, carnage_vic, carnage_perc, carnage_rating, deathball_part, deathball_vic, deathball_perc, deathball_rating, elixir_part, elixir_vic, elixir_perc, elixir_rating, paintball_part, paintball_vic, paintball_perc, paintball_rating, pillowfight_part, pillowfight_vic, pillowfight_perc, pillowfight_rating');
        $this->db->where('gender IS NOT NULL', null, false);
        $q = $this->db->get('characters');
        return $q->result_array();
    } 
    
    public function getArrayClans() 
    {
        $this->db->select('clan, membercount');
        $q = $this->db->get('clans');
        return $q->result_array();
    }
    
    public function getArrayHistory($date) 
    {
        $this->db->select('charname, vitacount, manacount, mightcount, gracecount, willcount, xpcount');
        $this->db->where(['date' => $date]);        
        $q = $this->db->get('history');
        return $q->result_array();
    }
    
    public function getOnlineStatus() 
    {
        $this->db->select('charname, online');
        $q = $this->db->get('characters');
        return $q->result_array();
    }        

    // Insert
    public function insertChar($data) 
    {
        $this->db->insert('characters', $data);
    }
    
    public function insertHistory($data) 
    {
        $this->db->insert('history', $data);
    }    
        
    public function insertClan($data) 
    {
        $this->db->insert('clans', $data);
    }
    
    // Update
    public function updateChar($charname, $data) 
    {
        $this->db->where(['charname' => $charname]);
        $this->db->update('characters', $data);
    } 
    
    public function updateHistory($data) 
    {       
        $sql = "UPDATE history SET vitacount = vitacount + ?, manacount = manacount + ?, mightcount = mightcount + ?, gracecount = gracecount + ?, willcount = willcount + ?, xpcount = xpcount + ? WHERE charname = ? AND DATE(date) = ?;";
        $this->db->query($sql, $data);
    }    
    
    public function updateClan($clan, $data)
    {
        $this->db->where(['clan' => $clan]);
        $this->db->update('clans', $data);
    }
    
    public function updateEvent($eventid, $data) 
    {        
        $this->db->where(['event_id' => $eventid]);
        $this->db->update('events', $data);
    }    

    // Delete
    public function deleteChar($charname = null) 
    {
        if ($charname != null)
        {
            $this->db->delete('characters', ['charname' => $charname]);
        }
    }
    
    public function deleteHistory($charname = null) 
    {
        if ($charname != null)
        {
            $this->db->delete('history', ['charname' => $charname]);
        }
    }     
    
    public function deleteClan($clan = null) 
    {
        if ($clan != null)
        {
            $this->db->delete('clans', ['clan' => $clan]);
        }
    }
    
}
