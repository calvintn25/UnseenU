<?php
class invoice extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Invoice";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/v_sidebar');
        $this->load->view('template/v_topbar', $data);
        $this->load->view('v_invoice', $data);
    }
}
