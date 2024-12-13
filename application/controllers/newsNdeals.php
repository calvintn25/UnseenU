<?php
class newsNdeals extends CI_Controller
{
    public function index()
    {
        $data['title'] = "UnseenU";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/user/v_head', $data);
        $this->load->view('template/user/v_newsNdeals-topbar', $data);
        $this->load->view('template/user/v_newsNdeals', $data);
        $this->load->view('template/user/v_footer', $data);
    }
}
