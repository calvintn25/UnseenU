<?php
class manageUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_manageUser');
    }
    public function index()
    {
        $data['title'] = "UnseenU | User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->model_manageUser->index();
        $this->load->view('template/v_manageUser-sidebar', $data);
        $this->load->view('template/v_topbar');
        $this->load->view('v_manageUser');
    }

    public function viewDetails($UserId)
    {
        $this->load->model('model_manageUser');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userId'] = $this->model_manageUser->get_user_byid($UserId);
        $data['title'] = "UnseenU | User Details";
        $this->load->view('template/v_manageUser-sidebar', $data);
        $this->load->view('template/v_topbar', $data);
        $this->load->view('v_userDetails', $data);
    }
}
