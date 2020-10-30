<?php

class Calculators extends CI_Controller
{
 
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $headerData['title'] = 'Calculators | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Calculators';
                        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('calculators/calculators_view');       
        $this->load->view('inc/footer_view', $footerData);
    }
    
}