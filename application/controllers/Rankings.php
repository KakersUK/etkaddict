<?php

class Rankings extends CI_Controller
{
    
    public function __construct() 
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        $headerData['title'] = 'Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/rankings_view');       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    // Player Rankings
    public function world()
    {
        $context = "World";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
                
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/world_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function warrior()
    {
        $context = "Warrior";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function reaver()
    {
        $context = "Reaver";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function knight()
    {
        $context = "Knight";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }     
    
    public function rogue()
    {
        $context = "Rogue";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function vagabond()
    {
        $context = "Vagabond";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }     
    
    public function mage()
    {
        $context = "Mage";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function tempest()
    {
        $context = "Tempest";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }  
    
    public function neophyte()
    {
        $context = "Neophyte";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function poet()
    {
        $context = "Poet";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function druid()
    {
        $context = "Druid";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/path_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    } 
    
    // Event Rankings
    public function carnage()
    {
        $context = "Carnage";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/event_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function deathball()
    {
        $context = "Deathball";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/event_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function elixir()
    {
        $context = "Elixir";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/event_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function paintball()
    {
        $context = "Paintball";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/event_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function pillowfight()
    {
        $context = "Pillow Fight";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = preg_replace('/\s+/', '', strtolower($context));
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/event_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    // Other
    public function gold()
    {
        $context = "Gold";
        
        $headerData['title'] = $context.' Rankings | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Rankings';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('rankings/gold_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
}

