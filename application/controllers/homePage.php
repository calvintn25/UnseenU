<?php
class homePage extends CI_Controller
{
    public function index()
    {
        $data['title'] = "UnseenU";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/user/v_head', $data);
        $this->load->view('template/user/v_homePage-topbar', $data);
        $this->load->view('template/user/v_homePage', $data);
        $this->load->view('template/user/v_footer', $data);
    }
}
