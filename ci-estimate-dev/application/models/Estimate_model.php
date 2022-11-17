<?php

class Estimate_model extends CI_Model
{



    //ALL LIST & EDIT
    public function getAllCalculation()
    {
        return $this->db->query("SELECT DISTINCT ORDER_NO, STYLE, COLOR_DESC
		FROM CutSpread_Plan")->result_array();
    }

    //LIST DETAIL
    public function getDataDetail($ORDER_NO, $STYLE, $COLOR_DESC)
    {
        return $this->db->query("SELECT DISTINCT ORDER_NO, WO_NO, COLOR_DESC, PRODUCT_CODE, PORTION, TABLE_INDEX, GR_NO
		FROM CutSpread_Plan WHERE ORDER_NO = '$ORDER_NO' AND STYLE = '$STYLE' AND COLOR_DESC = '$COLOR_DESC'")->result();
    }

    //GET BUYER
    public function getBuyer()
    {
        return $this->db->query("select distinct BUYER from CutSpread_Plan where buyer IS NOT NULL AND buyer != ''")->result();
    }

    //GET ON UNTUK SELECT ADD PLAN
    public function getOrderNumber()
    {
        return $this->db->query("SELECT DISTINCT VPO.CustomerPONO
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND VPO.COLOR IS NOT NULL AND VPO.COLOR != ''
        ORDER BY VPO.CustomerPONO")->result();
    }

    // public function getProduct($CustomerPONO)
    // {
    //     return $this->db->query("SELECT DISTINCT VPO.PRODUCTCODE
    //     FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
    //     WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO'")->result();
    // }


    //GET COLOR UNTUK SELECT ADD PLAN
    public function getColor($CustomerPONO)
    {
        return $this->db->query("SELECT DISTINCT VPO.COLOR
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO'")->result();
    }

    // Get DETAIL UNTUK MENGISI FORM AJAX, JQUERY, JS
    public function getDetailOrderNumber($CustomerPONO, $Color)
    {
        return $this->db->query("SELECT SITE, CustomerPONO, STYLEPARENT, STYLEDESC, COLOR, SOQTY, SOUOM, SIZE
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO' AND COLOR = '$Color'
        GROUP BY SITE, CustomerPONO, STYLEPARENT, STYLEDESC, SOQTY, SOUOM, COLOR, SIZE, PRODUCTCODE
        ORDER BY PRODUCTCODE, SITE, CustomerPONO, STYLEPARENT, STYLEDESC, COLOR")->row_array();
    }

    // MENGHITUNG KOLOM
    public function getSpanColumn($CustomerPONO, $Color)
    {
        return $this->db->query("SELECT SITE, CustomerPONO, STYLEPARENT, STYLEDESC, COLOR, SOQTY, SOUOM, SIZE
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO' AND COLOR = '$Color'
        GROUP BY SITE, CustomerPONO, STYLEPARENT, STYLEDESC, SOQTY, SOUOM, COLOR, SIZE, PRODUCTCODE
        ORDER BY PRODUCTCODE, SITE, CustomerPONO, STYLEPARENT, STYLEDESC, COLOR")->row_array();
    }

    //UNTUK SIZE RATIO JAVASCRIPT JQUERY
    public function getSizeRasio($CustomerPONO, $Color)
    {
        return $this->db->query("SELECT SOQTY, SIZE
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO' AND COLOR = '$Color'
        GROUP BY SITE, CustomerPONO, STYLEPARENT, STYLEDESC, SOQTY, SOUOM, COLOR, SIZE, PRODUCTCODE
        ORDER BY PRODUCTCODE, SITE, CustomerPONO, STYLEPARENT, STYLEDESC, COLOR")->result();
    }

    // MENGAMBIL TOTAL RATIO DARI SAGE DAN MENAMPILKAN DI TABEL JS
    public function getTotalRatio($CustomerPONO, $Color)
    {
        return $this->db->query("SELECT SUM(SOQTY) as totalRatio
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO' AND COLOR = '$Color'")->result();
    }

    // GET PRODUCT CODE
    // public function getProductCode()
    // {
    //     return $this->db->query("SELECT DISTINCT PRODUCTCODE
    //     FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
    //     ")->result();
    // }

    // MENGAMBIL TOTAL ORDER DARI SAGE DAN MENAMPILKAN DI TABEL JS
    public function getTotalOrderQty($CustomerPONO, $Color)
    {
        return $this->db->query("SELECT SUM(SOQTY) as SOQTY
        FROM [18.138.156.6\SAGEEMV11,41970].[lysage].[dbo].vSObyProduct VPO
        WHERE VPO.SITE = 'L-MJL' AND CustomerPONO = '$CustomerPONO' AND COLOR = '$Color'")->row_array();
    }

    // INSERT ADD PLAN TO DB
    public function addCutPlan()
    {

        $GR_NO = $this->input->post('GR_NO');
        $SIZE_NO = $this->input->post('sizeNoList[]'); //dari JS
        // $SIZE_SORT = $this->input->post('GR_NO'); //dari JS
        $RATIO = $this->input->post('totRatio[]'); //dari JS INDEX PERTAMA SUDAH DIDAPAT HANYA INDEX 0
        $TOTAL_RATIO = $this->input->post('print_part_qty'); //dari JS
        $BUYER = $this->input->post('buyer');
        $PRINT_STAT = $this->input->post('print_stat');
        $PRINT_PART_QTY = $this->input->post('print_part_qty');
        $EMBRO_STAT = $this->input->post('embro_stat');
        $EMBRO_PART_QTY = $this->input->post('embro_part_qty');
        $MARKER_LENGTH = $this->input->post('mdcutCons3'); //dari JS
        $STYLE = $this->input->post('StyleDesc'); //dari JS
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
        $TOD = $this->input->post('tod');
        $SEASON = $this->input->post('season');
        $TABLE_INDEX = $this->input->post('table_index');
        $QTY_LBR = $this->input->post('mdcutCons1'); //dari JS
        $TOTAL_QTY = $this->input->post('mdcutCons2'); //dari JS
        $YARD_REQ = $this->input->post('yard_req');
        $KG_REQ = $this->input->post('kg_req');
        // $TOTARATIO = "2";
        // "AutoNum" => '';

        // $data = array();
        $data = array(
            "GR_NO" => $GR_NO,
            // "SIZE_SORT" => $SIZE_SORT,
            "BUYER" => $BUYER,
            "PRINT_STAT" => $PRINT_STAT,
            "PRINT_PART_QTY" => $PRINT_PART_QTY,
            "EMBRO_STAT" => $EMBRO_STAT,
            "EMBRO_PART_QTY" => $EMBRO_PART_QTY,
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
            "TOD" => $TOD,
            "SEASON" => $SEASON,
            "TABLE_INDEX" => $TABLE_INDEX,
            "QTY_LBR" => $QTY_LBR,
            "TOTAL_QTY" => $TOTAL_QTY,
            "YARD_REQ" => $YARD_REQ,
            "KG_REQ" => $KG_REQ
        );

        foreach ($SIZE_NO as $index => $value) {
            $data['SIZE_NO'] = $SIZE_NO[$index];
            $data['RATIO'] = $RATIO[$index];
            $data['TOTAL_RATIO'] = array_sum($RATIO);
            // print_r($data);
            $this->db->insert('CuttingPLan', $data);
        }

        // $s = array_merge_recursive($data,$data1,$data2);
        // print_r($data);
        // die();
        // $this->db->insert_batch('CuttingPlan', $s);
        $this->session->set_flashdata('flash', 'Data Berhasil Di tambah');
        redirect('estimate');






        // $this->db->insert('CuttingPlan', $data);
    }



    // AMBIL ELEMEN FORM EDIT DAN UPDATE DB
    public function editList()
    {
        $data = [
            // "GR_NO" => $this->input->post('GR_NO', true),
            "SIZE_NO" => $this->input->post('', true),
            "SIZE_SORT" => $this->input->post('', true),
            "RATIO" => $this->input->post('', true),
            "TOTAL_RATIO" => $this->input->post('input_total_ratio', true),
            // "BUYER" => $this->input->post('buyer', true),
            // "PRINT_STAT" => $this->input->post('print_stat', true),
            // "PRINT_PART_QTY" => $this->input->post('print_part_qty', true),
            // "EMBRO_STAT" => $this->input->post('embro_stat', true),
            // "EMBRO_PART_QTY" => $this->input->post('embro_part_qty', true),
            "MARKER_LENGTH" => $this->input->post('marker_length_input', true),
            "STYLE" => $this->input->post('StyleDesc', true),
            "ORDER_NO" => $this->input->post('on', true),
            "COLOR_DESC" => $this->input->post('color', true),
            "WO_NO" => $this->input->post('wo_no', true),
            "PRODUCT_CODE" => $this->input->post('product_code', true),
            "PORTION" => $this->input->post('portion', true),
            "FAB_MAT" => $this->input->post('fab_mat', true),
            "FAB_WIDTH" => $this->input->post('fab_width', true),
            "FAB_WEIGHT" => $this->input->post('fab_weight', true),
            "MD_CONS" => $this->input->post('md_cons', true),
            "CUT_CONS" => $this->input->post('cut_cons', true),
            "MARKER_NO" => $this->input->post('marker_no', true),
            // "TOD" => $this->input->post('tod', true),
            // "SEASON" => $this->input->post('season', true),
            "TABLE_INDEX" => $this->input->post('table_index', true),
            "QTY_LBR" => $this->input->post('input_qty_layer', true), //dari JS
            "TOTAL_QTY" => $this->input->post('input_total_qty', true), //dari JS
            // "YARD_REQ" => $this->input->post('yard_req', true),
            // "KG_REQ" => $this->input->post('kg_req', true)
        ];
        var_dump($data);

        // $this->db->where('GR_NO', $this->input->post('GR_NO'));
        // $this->db->update('CutSpreadPlan', $data);
    }


    //EDIT MENGAMBIL DETAIL BY GRN
    public function getAllCalcu($GR_NO)
    {
        return $this->db->get_where('CutSpread_Plan', ['GR_NO' => $GR_NO])->row_array();
    }

    public function getPortion()
    {
        return $this->db->query("SELECT DISTINCT PORTION FROM CutSpread_Plan")->result();
    }


    // MENGAMBIL JUMLAH KOLOM
    public function getCollSpan($GR_NO)
    {
        return $this->db->query("SELECT *
		FROM CutSpread_Plan WHERE GR_NO = '$GR_NO' ")->num_rows();
    }





    // PDF
    public function getHeader($GR_NO)
    {
        return $this->db->query("SELECT DISTINCT *
		FROM CutSpread_Plan WHERE GR_NO = '$GR_NO'")->row();
    }

    public function getSizeRatio($GR_NO)
    {
        return $this->db->query("SELECT SIZE_NO, RATIO, STYLE, COLOR_DESC
		FROM CutSpread_Plan WHERE GR_NO = '$GR_NO' ORDER BY AutoNum ")->result();
    }

    public function getTotalSizeRatio($GR_NO)
    {
        return $this->db->query("SELECT MAX(SIZE_SORT) AS SIZE_SORT FROM CutSpread_Plan
        WHERE GR_NO = '$GR_NO'")->row_array();
    }
    // END PDF


    public function getNumGrn()
    {
        return $this->db->query("SELECT MAX(GR_NO) AS MaxGRN FROM CutSpread_Plan")->row_array();
    }
}
