<?php
class model_category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->insert('user', $data);
        return $query;
    }
}
