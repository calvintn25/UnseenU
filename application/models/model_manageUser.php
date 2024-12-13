<?php
class Model_manageUser extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->db->select('user.id, user.name, user.is_active, user.date_created, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_byid($UserId)
    {
        $this->db->where('id', $UserId);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
