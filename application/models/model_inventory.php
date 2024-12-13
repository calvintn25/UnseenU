<?php

class model_inventory extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_inventory()
    {
        $this->db->select('productdetails.*, category.category as Categories');
        $this->db->from('productdetails');
        $this->db->join('category', 'productdetails.category_id = category.category_id');
        $result = $this->db->get()->result();
        return $result;
    }

    public function user()
    {
        $email = $this->session->userdata('email');
        $query = $this->db->get_where('user', ['email' => $email]);
        return $query->row_array();
    }

    public function get_data_byid($ItemId)
    {
        $this->db->where('ItemId', $ItemId);
        $this->db->select('productdetails.*, category.category as Categories');
        $this->db->from('productdetails');
        $this->db->join('category', 'productdetails.category_id = category.category_id');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }
}
