<?php

class Character_model extends CI_Model
{       
    // Called @ Index
    public function getCharacterCount()
    {
        $this->db->select('character_id');
        $q = $this->db->get('characters');
        return $q->num_rows();
    }
    
    public function getLegendCount()
    {
        $this->db->select('character_id');
        $this->db->where('legend IS NOT NULL', null, false);
        $q = $this->db->get('characters');
        return $q->num_rows();
    }
    
    public function getStatCount()
    {
        $this->db->select('character_id');
        $this->db->where('vita IS NOT NULL', null, false);
        $q = $this->db->get('characters');
        return $q->num_rows();
    }
        
    public function getGoldCount()
    {
        $this->db->select('character_id');
        $this->db->where('gold IS NOT NULL', null, false);
        $q = $this->db->get('characters');
        return $q->num_rows();
    }
    
    public function getGoldTotal()
    {
        $this->db->select(('gold'));
        $this->db->where('gold IS NOT NULL', null, false);
        $this->db->where('gold != 0');
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    // Called @ Profile
    public function getCharacter($character) 
    {
        $this->db->select('rank, pathrank, charname, path, subpath, level, title, clan, clanstatus, gender, online, online_change, legend, vita, mana, might, will, grace, power, experience, gold, carnage_part, carnage_vic, carnage_perc, deathball_part, deathball_vic, deathball_perc, elixir_part, elixir_vic, elixir_perc, paintball_part, paintball_vic, paintball_perc, pillowfight_part, pillowfight_vic, pillowfight_perc');
        $this->db->where('charname', $character);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getHistory($character) 
    {
        $this->db->select('date, vitacount, manacount, mightcount, gracecount, willcount, xpcount');
        $this->db->where('charname', $character);
        $this->db->order_by('date', 'desc');        
        $q = $this->db->get('history');
        return $q->result_array();
    }    
    
  
}