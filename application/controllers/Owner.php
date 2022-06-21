<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_owner', 'owner');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Owner | Dashboard';
        $this->load->view('owner/dashboard', $var);
    }

    public function team()
    {
        $var['title'] = 'Owner | Team';
        $var['team'] = $this->owner->get_team();
        $this->load->view('owner/team', $var);
    }

    public function create_team()
    {
        $var['title'] = 'Owner | Create Team';
        $var['role'] = $this->owner->get_role();
        $this->load->view('owner/create_team', $var);
    }
}