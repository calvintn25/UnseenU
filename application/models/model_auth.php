<?php
class model_auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function UserRegist($data)
    {
        $query = $this->db->insert('user', $data);
        return $query;
    }
}
