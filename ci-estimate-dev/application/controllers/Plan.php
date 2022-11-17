<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Plan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Plan List';
        $data['firstList'] = $this->Plan_model->getData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('plan/index', $data);
        $this->load->view('templates/footer');
    }


    //MENGAMBIL DETAIL LIST
    public function detailList()
    {
        $ORDER_NO = $this->input->post("ORDER_NO");
        $STYLE = $this->input->post("STYLE");
        $COLOR_DESC = $this->input->post("COLOR_DESC");
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Detail List Plan';
        $data['secondList'] = $this->Plan_model->getDataDetail($ORDER_NO, $STYLE, $COLOR_DESC);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('plan/detailList', $data);
        $this->load->view('templates/footer');
    }


    // EDIT
    public function edit($GR_NO)
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Edit Plan Page';
        $data['list'] = $this->Plan_model->getAllCalcu($GR_NO);
        $data['sizeratio'] = $this->Plan_model->getSizeRatio($GR_NO);
        $data['getCollSpan'] = $this->Plan_model->getCollSpan($GR_NO);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('plan/editplan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Plan_model->editListPlan();
            // $this->session->set_flashdata('flash', 'Edited');
            // redirect('estimate');
        }
    }


    //PDF
    public function pdf($GR_NO)
    {

        $data['header'] = $this->Plan_model->getHeader($GR_NO);
        $data['ratio'] = $this->Plan_model->getSizeRatio($GR_NO);
        // $data['totRatio'] = $this->Plan_model->getTotalSizeRatio($GR_NO);

        $this->load->view('plan/pdf', $data);
    }
}
