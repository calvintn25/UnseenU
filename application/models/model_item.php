<?php

class model_item extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_item()
    {
        $this->db->select('productdetails.*, category.category as Categories');
        $this->db->from('productdetails');
        $this->db->join('category', 'productdetails.category_id = category.category_id');
        $result = $this->db->get()->result();
        return $result;
    }

    public function addItem($add)
    {
        $query = $this->db->insert('productdetails', $add);
        return $query;
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
    public function deleteItem($id)
    {
        $this->db->where('ItemId', $id);
        $deleteItem = $this->db->delete('productdetails');
        return $deleteItem;
    }
}
