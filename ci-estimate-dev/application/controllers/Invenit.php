<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class invenit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    // UNTUK INDEX
    public function index()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Import Page';
        // $data['allUploadFile'] = $this->Import_model->list();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('invenit/index', $data);
        $this->load->view('templates/footer');
    }
}