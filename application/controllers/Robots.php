<?php

class Robots extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        # Disallow all for Robots, except for production.
        $pageContent['disallow'] = ($_ENV['CI_ENV'] == 'production') ? "" : "/";
        $this->load->view('inc/robots_view', $pageContent);
    }
}
