<?php

class User_model extends CI_Model
{
    public function getAllOn()
    {
        return $this->db->query("SELECT DISTINCT ORDER_NO FROM CutSpread_Plan")->num_rows();
    }

    public function getBuyer()
    {
        return $this->db->query("SELECT DISTINCT BUYER FROM CutSpread_Plan WHERE buyer IS NOT NULL AND buyer != ''")->num_rows();
    }

    public function getAddPlan()
    {
        return $this->db->query("SELECT DISTINCT ORDER_NO FROM CuttingPlan")->num_rows();
    }
}
