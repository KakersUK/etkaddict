<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Seo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('seo_model');
    }

    function sitemap()
    {
        $characters = $this->seo_model->getCharacterList();
        $data['characters'] = array();
        foreach ($characters as $value)
        {
            array_push($data['characters'], $value['charname']);
        }

        $clans = $this->seo_model->getClanList();
        $data['clans'] = array();
        foreach ($clans as $value)
        {
            $value['clan'] = str_replace(' ', '-', $value['clan']);
            array_push($data['clans'], $value['clan']);
        }

        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("seo/sitemap_view", $data);
    }
}