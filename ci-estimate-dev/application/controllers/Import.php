<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class Import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Import_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    // UNTUK INDEX
    public function index()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Import Page';
        $data['allUploadFile'] = $this->Import_model->list();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('import/index', $data);
        $this->load->view('templates/footer');
    }

    public function uploadData()
    {
        $user = $this->session->userdata['userName'];
        $OnSite = $this->session->userdata['OnSite'];
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();

            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->setShouldFormatDates(true);

            $reader->open('uploads/' . $file['file_name']);

            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach ($sheet->getRowIterator() as $row) {

                    // $Date = $row->getCellAtIndex(24)->format('d/m/Y');



                    // $newDate = DateTime::createFromFormat("l dS F Y", $row->getCellAtIndex(24));
                    // $newDate = $newDate->format('Y/m/d'); 

                    // $Date = $row->getCellAtIndex(24);
                    // $Date = $row['valdate']->format('d/m/Y');

                    if ($numRow > 1) {

                        // $arrDate = explode("/", $row->getCellAtIndex(24));
                        // $date = $arrDate[2] . '-' . $arrDate[1] . '-' . $arrDate[0];




                        // $date = $row->getCellAtIndex(24);
                        // $potong = substr($date, 6);
                        // $keyword_array=explode(",", trim($row->getCellAtIndex(24)));
                        // print_r($keyword_array); 
                        // var_dump($row->getCellAtIndex(24));
                        // die;

                        $data = array(
                            'GR_NO' => $row->getCellAtIndex(9),
                            'SIZE_NO' => $row->getCellAtIndex(2),
                            // 'SIZE_SORT' => $row->getCellAtIndex(2),
                            'RATIO' => $row->getCellAtIndex(3),
                            'TOTAL_RATIO' => $row->getCellAtIndex(10),
                            'BUYER' => $row->getCellAtIndex(4),
                            'PRINT_STAT' => $row->getCellAtIndex(5),
                            'PRINT_PART_QTY' => $row->getCellAtIndex(6),
                            'EMBRO_STAT' => $row->getCellAtIndex(7),
                            'EMBRO_PART_QTY' => $row->getCellAtIndex(8),
                            'MARKER_LENGTH' => $row->getCellAtIndex(11),
                            'STYLE' => $row->getCellAtIndex(12),
                            'ORDER_NO' => $row->getCellAtIndex(13),
                            'COLOR_DESC' => $row->getCellAtIndex(14),
                            'WO_NO' => $row->getCellAtIndex(15),
                            //'FabricPO' => $row->getCellAtIndex(), //BARU UPDATE
                            'PRODUCT_CODE' => $row->getCellAtIndex(16),
                            'PORTION' => $row->getCellAtIndex(17),
                            //'LAYOUT' => $row->getCellAtIndex(), //BARU UPDATE
                            'FAB_MAT' => $row->getCellAtIndex(18),
                            'FAB_WIDTH' => $row->getCellAtIndex(19),
                            'FAB_WEIGHT' => $row->getCellAtIndex(20),
                            'MD_CONS' => $row->getCellAtIndex(21),
                            'CUT_CONS' => $row->getCellAtIndex(22),
                            'MARKER_NO' => $row->getCellAtIndex(23),
                            'TOD' => $row->getCellAtIndex(24),
                            'SEASON' => $row->getCellAtIndex(25),
                            'TABLE_INDEX' => $row->getCellAtIndex(26),
                            'QTY_LBR' => $row->getCellAtIndex(27),
                            'TOTAL_QTY' => $row->getCellAtIndex(28),
                            'YARD_REQ' => $row->getCellAtIndex(29), //set integer
                            'KG_REQ' => $row->getCellAtIndex(30),

                            // 'STATUS_SPREADING' => $row->getCellAtIndex(29),
                            // 'AutoNum' => $row->getCellAtIndex(29)
                        );
                        $this->Import_model->import_data($data);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);

                $sql_sp = "SP_GENERATE_GELAR_REPORT '$OnSite', '$user'";
                $data = $this->db->query($sql_sp);

                $this->session->set_flashdata('flash', 'Import Success');
                redirect('import');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
        };
    }


    // MENAMPILKAN DETAIl
    public function detail()
    {
        $ORDER_NO = $this->input->post("ORDER_NO");
        $STYLE = $this->input->post("STYLE");
        $COLOR_DESC = $this->input->post("COLOR_DESC");
        $GR_NO = $this->input->post("GR_NO");
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Detail List';
        $data['secondList'] = $this->Import_model->getDataDetail($ORDER_NO, $STYLE, $COLOR_DESC);
        $data['detailList'] = $this->Import_model->getDataCoba($GR_NO);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('import/detail', $data);
        $this->load->view('templates/footer');
    }


    //MENAMPILKAN EDIT PAGE
    public function edit()
    {
        $GR_NO = $this->input->post("GR_NO");
        // $GRNo = $this->input->post("GR_NO");
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Edit Page';
        $data['list'] = $this->Import_model->getAllCalcu($GR_NO);
        $data['sizeratio'] = $this->Import_model->getSizeRatio($GR_NO);
        $data['getCollSpan'] = $this->Import_model->getCollSpan();


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('import/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // 
            $this->Import_model->editDetail();
            // $this->session->set_flashdata('flash', 'Edited');
            // redirect('estimate');
        }
    }



    // public function editData()
    // {
    //     $this->Import_model->editDetail();
    //     redirect('import');
    // }





    public function pdf($GR_NO)
    {

        $data['header'] = $this->Import_model->getHeader($GR_NO);
        $data['ratio'] = $this->Import_model->getSizeRatio($GR_NO);
        $data['getCollSpan'] = $this->Import_model->getCollSpan($GR_NO);


        $this->load->view('import/pdf', $data);
    }


    // DELETE SHHH
    public function delete($GR_NO)
    {
        $this->Import_model->delete($GR_NO);

        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('import');
        // redirect('import/detail');
    }



    // DELETE ON
    public function deleteByOn()
    {
        $ORDER_NO = $this->input->post("ORDER_NO");
        $STYLE = $this->input->post("STYLE");
        $COLOR_DESC = $this->input->post("COLOR_DESC");
        $this->Import_model->deleteIndex($ORDER_NO, $STYLE, $COLOR_DESC);

        $this->session->set_flashdata('message', 'Berhasil Dihapus index');
        redirect('import');
        // redirect('import/detail');
    }





    // EDIT ADD PLAN
    public function ubah($GR_NO)
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'Edit Page';
        $data['daftar'] = $this->Import_model->getAllCalcu($GR_NO);
        $data['sizeratio'] = $this->Import_model->getSizeRatio($GR_NO);
        $data['getCollSpan'] = $this->Import_model->getCollSpan($GR_NO);

        // MENGAMBIL VALUE DARI FORM ADDPLAN
        // $this->form_validation->set_rules('on', 'ORDER NUMBER', 'required');
        // $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('StyleDesc', 'Style', '');
        $this->form_validation->set_rules('orderQty', 'OrderQuantity', '');
        $this->form_validation->set_rules('GR_NO', 'GRNumber', 'required');
        $this->form_validation->set_rules('buyer', 'Buyer', 'required');
        $this->form_validation->set_rules('print_stat', 'PrintStatus', 'required');
        $this->form_validation->set_rules('print_part_qty', 'PrintPartQuantity', 'required');
        $this->form_validation->set_rules('embro_stat', 'EmbroStat', 'required');
        $this->form_validation->set_rules('embro_part_qty', 'EmbroPartQuantity', 'required');
        $this->form_validation->set_rules('wo_no', 'WONumber', 'required');
        $this->form_validation->set_rules('product_code', 'ProductCode', 'required');
        $this->form_validation->set_rules('portion', 'Portion', 'required');
        $this->form_validation->set_rules('fab_mat', 'FabMat', 'required');
        $this->form_validation->set_rules('fab_width', 'FabWidth', 'required');
        $this->form_validation->set_rules('fab_weight', 'FabWeight', 'required');
        $this->form_validation->set_rules('md_cons', 'MDCons', 'required');
        $this->form_validation->set_rules('cut_cons', 'CutCons', 'required');
        $this->form_validation->set_rules('marker_no', 'MarkerNo', 'required');
        $this->form_validation->set_rules('tod', 'TOD', '');
        $this->form_validation->set_rules('season', 'Season', 'required');
        $this->form_validation->set_rules('table_index', 'TableIndex', 'required');
        $this->form_validation->set_rules('yard_req', 'YardReq', 'required');
        $this->form_validation->set_rules('kg_req', 'KgReq', 'required');
        // $this->form_validation->set_rules('sizeNoList[]', 'size_sort', 'required');
        // $this->form_validation->set_rules('ratio', 'ratio', 'required');
        // $this->form_validation->set_rules('total_ratio', 'total_ratio', 'required');
        $this->form_validation->set_rules('qty_layer', 'qty_layer',);
        $this->form_validation->set_rules('qty_total', 'qty_total',);
        $this->form_validation->set_rules('marker_length', 'marker_length', '');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('import/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // $size = $this->input->post('sizeNoList[]');
            // foreach ($size as $sa) {
            //     echo $sa;
            // }
            $this->Import_model->ubahData();
            $this->session->set_flashdata('flash2', 'Edit Success');
            redirect('import');
        }
    }


    /// EDIT ADD PLAN
    public function add()
    {
        $data['user'] = $this->db->get_where('mdatauser', ['userName' => $this->session->userdata['userName']])->row_array();
        $data['title'] = 'ADD Page';

        // MENGAMBIL VALUE DARI FORM ADDPLAN
        // $this->form_validation->set_rules('on', 'ORDER NUMBER', 'required');
        // $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('StyleDesc', 'Style', '');
        $this->form_validation->set_rules('orderQty', 'OrderQuantity', '');
        $this->form_validation->set_rules('GR_NO', 'GRNumber', 'required');
        $this->form_validation->set_rules('buyer', 'Buyer', 'required');
        $this->form_validation->set_rules('print_stat', 'PrintStatus', 'required');
        $this->form_validation->set_rules('print_part_qty', 'PrintPartQuantity', 'required');
        $this->form_validation->set_rules('embro_stat', 'EmbroStat', 'required');
        $this->form_validation->set_rules('embro_part_qty', 'EmbroPartQuantity', 'required');
        $this->form_validation->set_rules('wo_no', 'WONumber', 'required');
        $this->form_validation->set_rules('product_code', 'ProductCode', 'required');
        $this->form_validation->set_rules('portion', 'Portion', 'required');
        $this->form_validation->set_rules('fab_mat', 'FabMat', 'required');
        $this->form_validation->set_rules('fab_width', 'FabWidth', 'required');
        $this->form_validation->set_rules('fab_weight', 'FabWeight', 'required');
        $this->form_validation->set_rules('md_cons', 'MDCons', 'required');
        $this->form_validation->set_rules('cut_cons', 'CutCons', 'required');
        $this->form_validation->set_rules('marker_no', 'MarkerNo', 'required');
        $this->form_validation->set_rules('tod', 'TOD', '');
        $this->form_validation->set_rules('season', 'Season', 'required');
        $this->form_validation->set_rules('table_index', 'TableIndex', 'required');
        $this->form_validation->set_rules('yard_req', 'YardReq', 'required');
        $this->form_validation->set_rules('kg_req', 'KgReq', 'required');
        // $this->form_validation->set_rules('sizeNoList[]', 'size_sort', 'required');
        // $this->form_validation->set_rules('ratio', 'ratio', 'required');
        // $this->form_validation->set_rules('total_ratio', 'total_ratio', 'required');
        $this->form_validation->set_rules('qty_layer', 'qty_layer',);
        $this->form_validation->set_rules('qty_total', 'qty_total',);
        $this->form_validation->set_rules('marker_length', 'marker_length', '');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('import/add', $data);
            $this->load->view('templates/footer');
        } else {
            // $size = $this->input->post('sizeNoList[]');
            // foreach ($size as $sa) {
            //     echo $sa;
            // }
            $this->Import_model->ubahData();
            $this->session->set_flashdata('flash2', 'Edit Success');
            redirect('import');
        }
    }
}