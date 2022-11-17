<?php

class Plan_model extends CI_Model
{
    public function getData()
    {
        return $this->db->query("SELECT DISTINCT ORDER_NO, STYLE, COLOR_DESC
		FROM CuttingPlan")->result_array();
    }

    //LIST DETAIL
    public function getDataDetail($ORDER_NO, $STYLE, $COLOR_DESC)
    {
        return $this->db->query("SELECT DISTINCT ORDER_NO, WO_NO, COLOR_DESC, PRODUCT_CODE, PORTION, TABLE_INDEX, GR_NO
        FROM CuttingPlan WHERE ORDER_NO = '$ORDER_NO' AND STYLE = '$STYLE' AND COLOR_DESC = '$COLOR_DESC'")->result();
    }

    //EDIT MENGAMBIL DETAIL BY GRN
    public function getAllCalcu($GR_NO)
    {
        return $this->db->get_where('CuttingPlan', ['GR_NO' => $GR_NO])->row_array();
    }

    public function getSizeRatio($GR_NO)
    {
        return $this->db->query("SELECT SIZE_NO, RATIO, STYLE, COLOR_DESC
		FROM CuttingPlan WHERE GR_NO = '$GR_NO' ORDER BY AutoNum ")->result();
    }

    // MENGAMBIL JUMLAH KOLOM
    public function getCollSpan($GR_NO)
    {
        return $this->db->query("SELECT *
		FROM CuttingPlan WHERE GR_NO = '$GR_NO' ")->num_rows();
    }


    // PDF
    public function getHeader($GR_NO)
    {
        return $this->db->query("SELECT DISTINCT *
        FROM CuttingPlan WHERE GR_NO = '$GR_NO'")->row();
    }


    // public function getTotalSizeRatio($GR_NO)
    // {
    //     return $this->db->query("SELECT MAX(SIZE_SORT) AS SIZE_SORT FROM CuttingPlan
    //      WHERE GR_NO = '$GR_NO'")->row_array();
    // }
    // END PDF



    // AMBIL ELEMEN FORM EDIT DAN UPDATE DB
    public function editListPlan()
    {
        // $GR_NO = $this->input->post('GR_NO');
        // $SIZE_NO = $this->input->post('sizeNoList[]'); dari JS
        // $SIZE_SORT = $this->input->post('GR_NO'); //dari JS
        $RATIO = $this->input->post('totRatio[]'); //dari JS INDEX PERTAMA SUDAH DIDAPAT HANYA INDEX 0
        $TOTAL_RATIO = $this->input->post('input_total_ratio'); //dari JS
        $BUYER = $this->input->post('buyer');
        // $PRINT_STAT = $this->input->post('print_stat');
        // $PRINT_PART_QTY = $this->input->post('print_part_qty');
        // $EMBRO_STAT = $this->input->post('embro_stat');
        // $EMBRO_PART_QTY = $this->input->post('embro_part_qty');
        $MARKER_LENGTH = $this->input->post('marker_length_input'); //dari JS
        $STYLE = $this->input->post('style'); //dari JS
        $ORDER_NO = $this->input->post('on'); //dari JS (WORK)
        $COLOR_DESC = $this->input->post('color'); //dari JS (WORK)
        $WO_NO = $this->input->post('wo_no');
        $PRODUCT_CODE = $this->input->post('product_code');
        $PORTION = $this->input->post('portion');
        $FAB_MAT = $this->input->post('fab_mat');
        $FAB_WIDTH = $this->input->post('fab_width');
        $FAB_WEIGHT = $this->input->post('fab_weight');
        $MD_CONS = $this->input->post('md_cons');
        $CUT_CONS = $this->input->post('cut_cons');
        $MARKER_NO = $this->input->post('marker_no');
        // $TOD = $this->input->post('tod');
        // $SEASON = $this->input->post('season');
        $TABLE_INDEX = $this->input->post('table_index');
        $QTY_LBR = $this->input->post('input_qty_layer'); //dari JS
        $TOTAL_QTY = $this->input->post('input_total_qty'); //dari JS
        // $YARD_REQ = $this->input->post('yard_req');
        // $KG_REQ = $this->input->post('kg_req');
        // $TOTARATIO = "2";
        // "AutoNum" => '';

        // $data = array();
        $data = array(
            // "GR_NO" => $GR_NO,
            // "SIZE_SORT" => $SIZE_SORT,
            "BUYER" => $BUYER,
            // "PRINT_STAT" => $PRINT_STAT,
            // "PRINT_PART_QTY" => $PRINT_PART_QTY,
            // "EMBRO_STAT" => $EMBRO_STAT,
            // "EMBRO_PART_QTY" => $EMBRO_PART_QTY,
            "MARKER_LENGTH" => $MARKER_LENGTH,
            "STYLE" => $STYLE,
            "ORDER_NO" => $ORDER_NO,
            "COLOR_DESC" => $COLOR_DESC,
            "WO_NO" => $WO_NO,
            "PRODUCT_CODE" => $PRODUCT_CODE,
            "PORTION" => $PORTION,
            "FAB_MAT" => $FAB_MAT,
            "FAB_WIDTH" => $FAB_WIDTH,
            "FAB_WEIGHT" => $FAB_WEIGHT,
            "MD_CONS" => $MD_CONS,
            "CUT_CONS" => $CUT_CONS,
            "MARKER_NO" => $MARKER_NO,
            // "TOD" => $TOD,
            // "SEASON" => $SEASON,
            "TABLE_INDEX" => $TABLE_INDEX,
            "QTY_LBR" => $QTY_LBR,
            "TOTAL_QTY" => $TOTAL_QTY,
            // "YARD_REQ" => $YARD_REQ,
            // "KG_REQ" => $KG_REQ
        );

        foreach ($RATIO as $index => $value) {
            $data['RATIO'] = $RATIO[$index];
            $data['RATIO'] = $RATIO[$index];
            // $data['TOTAL_RATIO'] = array_sum($RATIO);
            $this->db->update('CuttingPLan', $data);
        }

        // $s = array_merge_recursive($data,$data1,$data2);
        // print_r($data);
        // die();
        // $this->db->insert_batch('CuttingPlan', $s);
        $this->session->set_flashdata('flash', 'Edited');
        redirect('estimate');

        $this->db->where('GR_NO', $this->input->post('GR_NO'));
        $this->db->update('CutSpreadPlan', $data);
    }
}
