<?php

class Clans extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $headerData['title'] = 'Clans | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Clans';
                        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('clans/list_all_view');       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function clan($clan)
    {
        $clanURI = $clan;
        $clan = str_replace('-', ' ', $clan);
        $headerData['title'] = $clan.' | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Clans';

        $clan = $this->security->xss_clean($clan);
        $clanURI = $this->security->xss_clean($clanURI);
        
        $pageContent['clan'] = $clan;
        $pageContent['json'] = "clan_".strtolower($clanURI);

        $this->load->view('inc/header_view', $headerData);
        $this->load->view('clans/clans_view', $pageContent);   
        $this->load->view('inc/footer_view', $footerData);      

    }
}

