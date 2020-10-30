<?php

class About extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $headerData['title'] = 'About | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'About';
                        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('about/about_view');       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function changelog()
    {
        $headerData['title'] = 'Changelog | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'About';
                        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('about/changelog_view');       
        $this->load->view('inc/footer_view', $footerData);
    }
}

