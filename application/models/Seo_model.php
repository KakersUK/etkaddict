<?php

class Seo_model extends CI_Model
{
    public function getCharacterList() 
    {
        $this->db->select('charname');
        $q = $this->db->get('characters');

        return $q->result_array();
    }

    public function getClanList() 
    {
        $this->db->select('clan');
        $q = $this->db->get('clans');

        return $q->result_array();
    }    
}        