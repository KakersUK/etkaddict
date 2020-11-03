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
        $this->db->where("path='Warrior' OR path='Crusader' OR path='Champion' OR path='Reaver' OR path='Berserker' OR path='Barbarian' OR path='Knight' OR path='Paladin' OR path='Justicar'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopRogues()
    {
        $this->db->select('charname');
        $this->db->where("path='Rogue' OR path='Archer' OR path='Sharpshooter' OR path='Vagabond' OR path='Spellblade' OR path='Assassin'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopMages()
    {
        $this->db->select('charname');
        $this->db->where("path='Mage' OR path='Summoner' OR path='Shaman' OR path='Elementalist' OR path='Tempest' OR path='Battlemage' OR path='Hexblade' OR path='Neophyte' OR path='Shaman' OR path='Spiritualist'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }
    
    public function getTopPoets()
    {
        $this->db->select('charname');
        $this->db->where("path='Poet' OR path='Cleric' OR path='Savior' OR path='Druid' OR path='Bard' OR path='Minstrel'");
        $this->db->order_by('rank', 'asc');
        $this->db->limit(10);
        $q = $this->db->get('characters');
        return $q->result_array();
    }

}