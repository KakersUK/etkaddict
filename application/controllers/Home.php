<?php

class Home extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('numberformat');        
        $this->load->model('home_model');
    }

    public function index()
    {
        $headerData['title'] = 'ETK Addict | Fueling the addicts of ExtremeTK!';
        $headerData['active'] = $footerData['active'] = 'Home';
               
        date_default_timezone_set('America/New_York');       
        $blessing_status = file(getenv('HOME_DIR').'/writable/etk_blessing', FILE_IGNORE_NEW_LINES);
        
        // Arrays
        $pageContent['events'] = $footerData['events'] = $footerData['eventTR'] = array();
        
        // Events
        $events = $this->home_model->getEvents();
        
        foreach ($events as $event)
        {
            $epochMilliseconds = $event['eventtime']."000";
            $event['eventname'] = $this->fixEventName($event['eventname']);
            
            array_push($pageContent['events'], $event['eventname']);
            array_push($footerData['events'], $epochMilliseconds);
        }
        
        $today = date("Y-m-d");
        $pageContent['today'] = date("D jS M");
        
        // Top Characters
        $topcharacters = $this->home_model->getTopCharacters();
        $pageContent['topcharacters'] = $this->buildWidgetList($topcharacters, 20, 1);
        $pageContent['topcharacters2'] = $this->buildWidgetList($topcharacters, 20, 2);
        
        $tophunters = $this->home_model->getTopHunters($today);
        $pageContent['tophunters'] = array();
        foreach ($tophunters as $value)
        {
            if ($value['xpcount'] > 0)
            {
                $value['charname'] = "<a href=\"/characters/".$value['charname']."\">".$value['charname']."</a>";
                $value['xpcount'] = etkNumberFormat($value['xpcount']);            

                array_push($pageContent['tophunters'], $value);
            }
        }  
        
        $topwarriors = $this->home_model->getTopWarriors();
        $pageContent['topwarriors'] = $this->buildWidgetList($topwarriors, 10, 1);
        $pageContent['topwarriors2'] = $this->buildWidgetList($topwarriors, 10, 2);
        
        $toprogues = $this->home_model->getTopRogues();
        $pageContent['toprogues'] = $this->buildWidgetList($toprogues, 10, 1);
        $pageContent['toprogues2'] = $this->buildWidgetList($toprogues, 10, 2);
        
        $topmages = $this->home_model->getTopMages();
        $pageContent['topmages'] = $this->buildWidgetList($topmages, 10, 1);
        $pageContent['topmages2'] = $this->buildWidgetList($topmages, 10, 2);
        
        $toppoets = $this->home_model->getTopPoets();
        $pageContent['toppoets'] = $this->buildWidgetList($toppoets, 10, 1);
        $pageContent['toppoets2'] = $this->buildWidgetList($toppoets, 10, 2);
        
        // Blessing        
        $pageContent['blessingvalue'] = $blessing_status[0] / 100;
        $pageContent['blessingcurrent'] = $blessing_status[1];
        
        if ($pageContent['blessingvalue'] > 100)
        {
            $pageContent['blessingwidth'] = 100;
        }
        else
        {
            $pageContent['blessingwidth'] = $pageContent['blessingvalue'];
        }
        
        switch($blessing_status[1]) {
            case "Sun":
                $pageContent['blessingcolor'] = "danger";
            break;
            case "Moon":
                $pageContent['blessingcolor'] = "warning";
            break;
            case "Star":
                $pageContent['blessingcolor'] = "success";
            break;
            default:
                $pageContent['blessingcolor'] = "primary";
            break;
        }
                
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('home/home_view', $pageContent);       
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function fixEventName($eventname) {

        switch ($eventname) {

            case 'Guri Carnage (Novice 1 - 98)':
                return 'Carnage Semi-pro (1-98)';
            break;

            case 'Guri Carnage (Open - 1-99)':
                return 'Carnage Open (1-99)';
            break;

            case 'Guri Carnage (Legends - 99)':
                return 'Carnage Legends (99+)';
            break;

            case 'Guri Carnage (Celestials 400k/200k)':
                return 'Carnage Celestials (400k/200k)';
            break;    

            case 'Guri Balanced Carnage (100k/50k)':
                return 'Carnage Balanced (100k/50k)';
            break;        
        
            case 'Guri Carnage (Balanced 50k/25k)':
                return 'Carnage (Balanced 50k/25k)';
            break;				

            case 'Guri Deathball (Open - 1-99)':
                return 'Deathball';
            break;

            case 'Guri Paintball':
                return 'Paintball';
            break;

            case 'Guri Elixir War':
                return 'Elixir';
            break;

            case 'Pillow fight':
                return 'Pillow Fight';
            break;				

            default:
                return $eventname;							
        }
    }
    
    public function buildWidgetList($data, $list_size, $part) {

        $array = array();
        $half = $list_size / 2;
        $i = 1;
        
        foreach ($data as $value)
        {
            $value['charname'] = "<a href=\"/characters/".$value['charname']."\">".$value['charname']."</a>";
            
            if ($part == 1)
            {
                if ($i <= $half)
                {
                    array_push($array, $value);
                }
            }
            if ($part == 2)
            {
                if ($i > $half)
                {
                    array_push($array, $value);
                }
            }
            
            $i++;
        }
        
        return $array;
    }
}
