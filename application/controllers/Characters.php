<?php

class Characters extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('path');
        $this->load->helper('numberformat');
        $this->load->helper('statboxbuild');
        $this->load->model('character_model');
    }

    // Index
    public function index()
    {
        $context = "Characters";
        
        $headerData['title'] = 'Characters | ETK Addict';
        $headerData['active'] = $footerData['active'] = 'Characters';
        
        $pageContent['content'] = $context;
        $pageContent['json'] = strtolower($context);
        
        // Total Gold
        $totalgold = $this->character_model->getGoldTotal();
        $pageContent['gold'] = 0;
        
        foreach ($totalgold as $value)
        {
            $pageContent['gold'] += $value['gold'];
        }
        
        $pageContent['gold'] = etkNumberFormat($pageContent['gold']);
                        
        // Characters - Fetch Data
        $pageContent['character_count'] = $this->character_model->getCharacterCount();
        $pageContent['legend_count'] = $this->character_model->getLegendCount();
        $pageContent['stat_count'] = $this->character_model->getStatCount();
        $pageContent['gold_count'] = $this->character_model->getGoldCount();
        
        // Characters - Format Data
        $pageContent['character_count'] = number_format($pageContent['character_count']);
        $pageContent['legend_count'] = number_format($pageContent['legend_count']);
        $pageContent['stat_count'] = number_format($pageContent['stat_count']);
        $pageContent['gold_count'] = number_format($pageContent['gold_count']);
        
        
        $this->load->view('inc/header_view', $headerData);
        $this->load->view('characters/characters_view', $pageContent);     
        $this->load->view('inc/footer_view', $footerData);
    }
    
    public function profile($character)
    {
        $this->load->helper('stats');
        $character = ucfirst(strtolower($character));
        $data = array('character' => $character);
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('character', 'Character', 'required|alpha');
        
        if ($this->form_validation->run() === FALSE) // validation failed
        {
            echo "Character names can only contain alphabetical characters.";
        }
        else
        {
            $headerData['title'] = $character.' | ETK Addict';
            $headerData['active'] = $footerData['active'] = 'Characters';

            $pageContent['character'] = $this->character_model->getCharacter($this->security->xss_clean($character));
            $history = $this->character_model->getHistory($this->security->xss_clean($character));
            
            $pageContent['history'] = array();

            // Online Status
            if (is_numeric($pageContent['character'][0]['online']) && $pageContent['character'][0]['online'] == 1)
            {
                $pageContent['character'][0]['online'] = "<img src=\"/assets/img/profile/online.png\" alt=\"online\" height=\"16\" width=\"16\" /> Online";
                $pageContent['character'][0]['online_change'] = NULL;
            }
            else
            {
                if ($pageContent['character'][0]['online_change'] == 0)
                {
                    $pageContent['character'][0]['online_change'] = NULL;
                }
                else
                {
                    date_default_timezone_set('America/New_York');
                    $pageContent['character'][0]['online_change'] = date('jS M Y', $pageContent['character'][0]['online_change']);
                }
                
                $pageContent['character'][0]['online'] = "<img src=\"/assets/img/profile/offline.png\" alt=\"offline\" height=\"16\" width=\"16\" /> Offline";
            }
                        
            // Gender
            if (is_numeric($pageContent['character'][0]['gender']) && $pageContent['character'][0]['gender'] == 0)
            {
                $pageContent['character'][0]['gender'] = "Male";
                $pageContent['character'][0]['gender_image'] = "<i class=\"fa fa-mars\"></i>";
            }
            if (is_numeric($pageContent['character'][0]['gender']) && $pageContent['character'][0]['gender'] == 1)
            {
                $pageContent['character'][0]['gender'] = "Female";
                $pageContent['character'][0]['gender_image'] = "<i class=\"fa fa-venus\"></i>";
            }
            
            // Level
            $pageContent['character'][0]['level_unmod'] = $pageContent['character'][0]['level'];            
            if ($pageContent['character'][0]['subpath'] == "eesan")
            {
                $pageContent['character'][0]['level'] = "<img src=\"/assets/img/profile/mark-eesan.png\" alt=\"eesan\" height=\"16\" width=\"16\"/> Ee San";
            }
            if ($pageContent['character'][0]['subpath'] == "ilsan")
            {
                $pageContent['character'][0]['level'] = "<img src=\"/assets/img/profile/mark-ilsan.png\" alt=\"ilsan\" height=\"16\" width=\"16\"/> Il San";
            }
 
            // Number formating for Vita, Mana, Expierance and Power Level
            if ($pageContent['character'][0]['vita'] != NULL)
            {
                $pageContent['character'][0]['vita_imgs'] = etkStatboxBuild($pageContent['character'][0]['vita']);
                $pageContent['character'][0]['mana_imgs'] = etkStatboxBuild($pageContent['character'][0]['mana']);
                $pageContent['character'][0]['might_imgs'] = etkStatboxBuild($pageContent['character'][0]['might']);
                $pageContent['character'][0]['grace_imgs'] = etkStatboxBuild($pageContent['character'][0]['grace']);
                $pageContent['character'][0]['will_imgs'] = etkStatboxBuild($pageContent['character'][0]['will']);
                $pageContent['character'][0]['exp_imgs'] = etkStatboxBuild($pageContent['character'][0]['experience']);
                
                $pageContent['character'][0]['vita'] = number_format($pageContent['character'][0]['vita']);
                $pageContent['character'][0]['mana'] = number_format($pageContent['character'][0]['mana']);
                $pageContent['character'][0]['experience'] = etkNumberFormat($pageContent['character'][0]['experience']);
                $pageContent['character'][0]['power'] = number_format($pageContent['character'][0]['power']);
            }            
            
            // Gold
            if ($pageContent['character'][0]['gold'] != NULL)
            {
                $pageContent['character'][0]['gold_imgs'] = etkStatboxBuild($pageContent['character'][0]['gold']);
                $pageContent['character'][0]['gold'] = number_format($pageContent['character'][0]['gold']);
            }
            
            // Clan
            if ($pageContent['character'][0]['clan'] == "none")
            {
                $pageContent['character'][0]['clan'] = "none";
            }
            else
            {
                $clanURL = str_replace(' ', '-', $pageContent['character'][0]['clan']);
                $pageContent['character'][0]['clan'] = "<a href=\"/clans/".$clanURL."/\">".$pageContent['character'][0]['clan']."</a>";
            }

            // Path
            $pageContent['character'][0]['path'] = pathFix($pageContent['character'][0]['path'], $pageContent['character'][0]['subpath']);

            // Legend
            if ($pageContent['character'][0]['legend'] != null)
            {
                $pageContent['character'][0]['legend'] = unserialize(base64_decode($pageContent['character'][0]['legend']));
            }            
            
            // History
            if ($history != null)
            {
                foreach ($history as $entry)
                {
                    $entry['vitacount'] = number_format($entry['vitacount']);
                    $entry['manacount'] = number_format($entry['manacount']);
                    $entry['xpcount'] = etkNumberFormat($entry['xpcount']);
                    array_push($pageContent['history'], $entry);
                }
            }                
            
 
            $this->load->view('inc/header_view', $headerData);
            $this->load->view('characters/profile_view', $pageContent);
            $this->load->view('inc/footer_view', $footerData);
        }
    }

}

