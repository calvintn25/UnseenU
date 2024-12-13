<?php
class dashboard extends CI_Controller
{
	public function index()
	{
		$data['title'] = "UnseenU | Dashboard";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('template/v_dashboard-sidebar', $data);
		$this->load->view('template/v_topbar', $data);
		$this->load->view('v_dashboard');
	}
}
