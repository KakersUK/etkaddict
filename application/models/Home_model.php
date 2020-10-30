<?php

class Home_model extends CI_Model
{       
    public function getEvents() 
    {
        $this->db->select('eventname, eventtime');
        $q = $this->db->get('events');
        return $q->result_array();
    }
    
    public function getTopCharacters()
    {
        $this->db->select('charname');
        $this->db->order_by('rank', 'asc');
        $this->db->limit(20);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopHunters($date)
    {
        $this->db->select('charname, xpcount');
        $this->db->where("date", $date);             
        $this->db->order_by('xpcount', 'desc');
        $this->db->limit(10);
        $q = $this->db->get('history');
        return $q->result_array();
    }    
    
    public function getTopWarriors()
    {
        $this->db->select('charname');
        $this->db->where("path='Warrior' OR path='Crusader' OR path='Paladin' OR path='Berserker'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopRogues()
    {
        $this->db->select('charname');
        $this->db->where("path='Rogue' OR path='Archer' OR path='Spellblade'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopMages()
    {
        $this->db->select('charname');
        $this->db->where("path='Mage' OR path='Summoner' OR path='Shaman' OR path='Battlemage'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopPoets()
    {
        $this->db->select('charname');
        $this->db->where("path='Poet' OR path='Cleric' OR path='Bard'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }

}