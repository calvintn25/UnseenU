<?php
class series extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_series');
    }
    public function index()
    {
        $data['title'] = "UnseenU | Series";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['categories'] = $this->model_series->category();
        $data['itemByCatg'] = $this->model_series->itemByCatg();
        $this->load->view('template/user/v_head', $data);
        $this->load->view('template/user/v_series-topbar', $data);
        $this->load->view('template/user/v_series', $data);
        $this->load->view('template/user/v_footer', $data);
    }
}
