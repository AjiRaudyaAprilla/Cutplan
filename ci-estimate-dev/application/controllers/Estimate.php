<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Estimate_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('userID')) {
            redirect('auth');
        }
    }

    // MENGAMBIL LIST PERTAMA
    public function index()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Estimate List';
        $data['firstList'] = $this->Estimate_model->getAllCalculation();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('estimate/list', $data);
        $this->load->view('templates/footer');
    }

    //MENGAMBIL DETAIL LIST
    public function detailList()
    {
        $ORDER_NO = $this->input->post("ORDER_NO");
        $STYLE = $this->input->post("STYLE");
        $COLOR_DESC = $this->input->post("COLOR_DESC");
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Detail List';
        $data['secondList'] = $this->Estimate_model->getDataDetail($ORDER_NO, $STYLE, $COLOR_DESC);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('estimate/detailList', $data);
        $this->load->view('templates/footer');
    }


    // ADD PLAN
    public function addPlan()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Add Plan Page';
        $data['getOn'] = $this->Estimate_model->getOrderNumber();
        $data['getBuyer'] = $this->Estimate_model->getBuyer();
        $data['getPortion'] = $this->Estimate_model->getPortion();
        $data['Grn'] = $this->Estimate_model->getNumGrn();
        // $data['productcode'] = $this->Estimate_model->getProductCode();

        // MENGAMBIL VALUE DARI FORM ADDPLAN
        $this->form_validation->set_rules('on', 'ON', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('StyleDesc', 'Style', '');
        $this->form_validation->set_rules('orderQty', 'OrderQuantity', '');
        $this->form_validation->set_rules('GR_NO', 'GRNumber', 'required');
        $this->form_validation->set_rules('buyer', 'Buyer', 'required');
        $this->form_validation->set_rules('print_stat', 'PrintStatus', 'required|max_length[5]');
        $this->form_validation->set_rules('print_part_qty', 'PrintPartQuantity', 'required|integer');
        $this->form_validation->set_rules('embro_stat', 'EmbroStat', 'required|max_length[5]');
        $this->form_validation->set_rules('embro_part_qty', 'EmbroPartQuantity', 'required|integer');
        $this->form_validation->set_rules('wo_no', 'WONumber', 'required');
        $this->form_validation->set_rules('product_code', 'ProductCode', 'required');
        $this->form_validation->set_rules('portion', 'Portion', 'required');
        $this->form_validation->set_rules('fab_mat', 'FabMat', 'required');
        $this->form_validation->set_rules('fab_width', 'FabWidth', 'required|integer');
        $this->form_validation->set_rules('fab_weight', 'FabWeight', 'required|integer');
        $this->form_validation->set_rules('md_cons', 'MDCons', 'required');
        $this->form_validation->set_rules('cut_cons', 'CutCons', 'required');
        $this->form_validation->set_rules('marker_no', 'MarkerNo', 'required');
        $this->form_validation->set_rules('tod', 'TOD', '');
        $this->form_validation->set_rules('season', 'Season', 'required');
        $this->form_validation->set_rules('table_index', 'TableIndex', 'required|integer');
        $this->form_validation->set_rules('yard_req', 'YardReq', 'required|integer');
        $this->form_validation->set_rules('kg_req', 'KgReq', 'required');
        // $this->form_validation->set_rules('sizeNoList[]', 'size_sort', 'required');
        // $this->form_validation->set_rules('ratio', 'ratio', 'required');
        // $this->form_validation->set_rules('total_ratio', 'total_ratio', 'required');
        $this->form_validation->set_rules('qty_layer', 'qty_layer', 'integer');
        $this->form_validation->set_rules('qty_total', 'qty_total', 'integer');
        $this->form_validation->set_rules('marker_length', 'marker_length', '');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('estimate/addPlan', $data);
            $this->load->view('templates/footer');
        } else {
            // $size = $this->input->post('sizeNoList[]');
            // foreach ($size as $sa) {
            //     echo $sa;
            // }
            $this->Estimate_model->addCutPlan();
            // $this->session->set_flashdata('flash', 'Added');
            // redirect('estimate');
        }
    }


    // EDIT
    public function edit($GR_NO)
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Edit Page';
        $data['list'] = $this->Estimate_model->getAllCalcu($GR_NO);
        $data['sizeratio'] = $this->Estimate_model->getSizeRatio($GR_NO);
        $data['getCollSpan'] = $this->Estimate_model->getCollSpan($GR_NO);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('estimate/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Estimate_model->editList();
            // $this->session->set_flashdata('flash', 'Edited');
            // redirect('estimate');
        }
    }













    // SAGE UNTUK JQUERY
    public function getColor()
    {

        $CustomerPONO = $this->input->post('CustomerPONO');
        $data = $this->Estimate_model->getColor($CustomerPONO);
        echo json_encode($data);
    }


    // SAGE UNTUK JQUERY
    public function getDetailOn()
    {
        $CustomerPONO = $this->input->post('CustomerPONO');
        $COLOR = $this->input->post('selectCOLOR');
        $StyleDesc = $this->input->post('StyleDesc');
        $hasil = $this->Estimate_model->getDetailOrderNumber($CustomerPONO, $COLOR, $StyleDesc);
        $total = $this->Estimate_model->getTotalOrderQty($CustomerPONO, $COLOR);
        $sizeRatio = $this->Estimate_model->getSizeRasio($CustomerPONO, $COLOR);
        $totalRatio = $this->Estimate_model->getTotalRatio($CustomerPONO, $COLOR);

        // var_dump($totalRatio); die();
        $data = array(
            'CustomerPONO' => $hasil['CustomerPONO'],
            'StyleDesc' => $hasil['STYLEDESC'],
            'orderQty' => intval($total['SOQTY']),
            // 'totalRatio' => $totalRatio['totalRatio'],
            'sizeList' => $sizeRatio,
        );
        echo json_encode($data);
    }





    //PDF
    public function pdf($GR_NO)
    {

        $data['header'] = $this->Estimate_model->getHeader($GR_NO);
        $data['ratio'] = $this->Estimate_model->getSizeRatio($GR_NO);
        $data['totRatio'] = $this->Estimate_model->getTotalSizeRatio($GR_NO);

        $this->load->view('estimate/pdf', $data);
    }
}
