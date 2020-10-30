<?php

class Changelog extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $headerData['title'] = 'Changelog | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Changelog';
                        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('changelog/changelog_view');       
        $this->load->view('inc/footer_view', $footerData);
    }
    
}

