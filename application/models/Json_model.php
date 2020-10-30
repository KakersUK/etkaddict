<?php

class Json_model extends CI_Model
{
    public function getRankingStats($search = null, $sort = null, $order = null, $path = null) 
    {
        if ($path == null) {
            $this->db->select('rank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
                $this->db->or_like('clan', $search);
            }
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }

        if ($path == "Warrior") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Warrior');
                $this->db->or_where('path', 'Crusader');
                $this->db->or_where('path', 'Champion');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        
        if ($path == "Reaver") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Reaver');
                $this->db->or_where('path', 'Berserker');
                $this->db->or_where('path', 'Barbarian');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        
        if ($path == "Knight") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Knight');
                $this->db->or_where('path', 'Paladin');
                $this->db->or_where('path', 'Justicar');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }        
        
        if ($path == "Rogue") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Rogue');
                $this->db->or_where('path', 'Archer');
                $this->db->or_where('path', 'Sharpshooter');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        
        if ($path == "Vagabond") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Vagabond');
                $this->db->or_where('path', 'Spellblade');
                $this->db->or_where('path', 'Assassin');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }        
        
        if ($path == "Mage") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Mage');
                $this->db->or_where('path', 'Summoner');
                $this->db->or_where('path', 'Elementalist');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        
        if ($path == "Tempest") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Tempest');
                $this->db->or_where('path', 'Battlemage');
                $this->db->or_where('path', 'Hexblade');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        
        if ($path == "Neophyte") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Neophyte');
                $this->db->or_where('path', 'Shaman');
                $this->db->or_where('path', 'Spiritualist');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }         
        
        if ($path == "Poet") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Poet');
                $this->db->or_where('path', 'Cleric');
                $this->db->or_where('path', 'Savior');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        
        if ($path == "Druid") {           
            $this->db->select('pathrank, charname, path, subpath, vita, mana, might, will, grace, power, clan');
            if ($search != null){ 
                $this->db->like('charname', $search);
                $this->db->or_like('path', $search);
            }
            $this->db->group_start();
                $this->db->where('path', 'Druid');
                $this->db->or_where('path', 'Bard');
                $this->db->or_where('path', 'Minstrel');
            $this->db->group_end();
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }        
        
        return $q->result_array();
    }
    
    public function getEventStats($search = null, $sort = null, $order = null, $event = null) 
    {
        
        $select = $event."_perc, ".$event."_vic, ".$event."_part, ".$event."_rating, charname";
        $where = $event."_part > 0";
        
        if ($search === null)
        {
            $this->db->select($select);
            $this->db->where($where);
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        else
        {
            $this->db->select($select);
            $this->db->where($where);
            $this->db->like('charname', $search);
            if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
            $q = $this->db->get('characters');
        }
        return $q->result_array();
    }
    
    public function getGoldStats($search = null, $sort = null, $order = null) 
    {
        $this->db->select('gold, charname');
        $this->db->where('gold IS NOT NULL', null, false);
        $this->db->where('gold != 0');
        if ($search != null){ $this->db->like('charname', $search); }
        if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
        $q = $this->db->get('characters');

        return $q->result_array();
    }
    
    public function getClanList($search = null, $sort = null, $order = null) 
    {
        $this->db->select('clan, membercount');
        if ($search != null){ $this->db->like('charname', $search); }
        if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
        $q = $this->db->get('clans');

        return $q->result_array();
    }
    
    public function getCharacterSearch($search) 
    {
        $this->db->select('charname');
        $this->db->where('charname', $search);
        $q = $this->db->get('characters');

        return $q->result_array();
    }   
    
    public function getCharacterSearch2($search) 
    {
        $this->db->select('charname');
        $this->db->like('charname', $search);
        $q = $this->db->get('characters');

        return $q->result_array();
    }

    public function getClanLeader($clan = null, $search = null, $sort = null, $order = null, $path = null) 
    {
        $clan = ucfirst(strtolower($clan));
        
        $this->db->select('rank, pathrank, charname, path, clanstatus, subpath, level, online, online_change');
        $this->db->where('clan', $clan);
        $this->db->where("clanstatus='Leader'");
        if ($search != null){ $this->db->like('charname', $search); }
        if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
        $q = $this->db->get('characters');

        return $q->result_array();
    }
    
    public function getClanOfficers($clan = null, $search = null, $sort = null, $order = null, $path = null) 
    {
        $clan = ucfirst(strtolower($clan));
        
        $this->db->select('rank, pathrank, charname, path, clanstatus, subpath, level, online, online_change');
        $this->db->where('clan', $clan);
        $this->db->where("clanstatus='Officer'");
        if ($search != null){ $this->db->like('charname', $search); }
        if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
        $q = $this->db->get('characters');

        return $q->result_array();
    }
    
    public function getClanMembers($clan = null, $search = null, $sort = null, $order = null, $path = null) 
    {
        $clan = ucfirst(strtolower($clan));
        
        $this->db->select('rank, pathrank, charname, path, clanstatus, subpath, level, online, online_change');
        $this->db->where('clan', $clan);
        $this->db->where("clanstatus='Member'");
        if ($search != null){ $this->db->like('charname', $search); }
        if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
        $q = $this->db->get('characters');

        return $q->result_array();
    }

    public function getClanRoster($clan = null, $search = null, $sort = null, $order = null, $path = null) 
    {
        $clan = ucfirst(strtolower($clan));
        
        $this->db->select('rank, pathrank, charname, path, clanstatus, subpath, level, online, online_change');
        $this->db->where('clan', $clan);
        if ($search != null){ 
            $this->db->like('charname', $search);
            $this->db->or_like('path', $search);
        }
        if ($order != null OR $sort != null) { $this->db->order_by($sort, $order); }
        $q = $this->db->get('characters');

        return $q->result_array();
    }
        
    public function getClanLeaders() 
    {
        $this->db->select('charname, clan');
        $this->db->where("clanstatus='Leader'");
        $q = $this->db->get('characters');

        return $q->result_array();
    }
}

