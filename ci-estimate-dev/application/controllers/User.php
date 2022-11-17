<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'DashBoard User';
        $data['on'] = $this->User_model->getAllOn();
        $data['buyer'] = $this->User_model->getBuyer();
        $data['addplan'] = $this->User_model->getAddPlan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }
}