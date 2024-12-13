<?php
class inventory extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_inventory');
		$this->load->library('form_validation');
	}
	public function index()
	{
		//page title
		$data['title'] = "Inventory";

		//fetch user data
		$data['user'] = $this->model_inventory->user();
		//fetch items for inventory
		$data['items'] = $this->model_inventory->get_inventory();
		$this->load->view('template/v_inventory-sidebar', $data);
		$this->load->view('template/v_topbar', $data);
		$this->load->view('v_inventory', $data);
	}
	public function print()
	{
		$data['items'] = $this->model_inventory->get_inventory();
		$this->load->view('v_printInventory', $data);
	}
	public function editInventory($ItemId)
	{
		$this->load->model('model_inventory');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['item'] = $this->model_inventory->get_data_byid($ItemId);
		$this->form_validation->set_rules('ItemId', 'ItemId', 'required');
		$this->form_validation->set_rules('COMS', 'COMS', 'trim|required');
		$this->form_validation->set_rules('Stock', 'Stock', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/v_inventory-sidebar');
			$this->load->view('template/v_topbar', $data);
			$this->load->view('v_editInventory', $data);
		} else {
			$ItemId = $this->input->post('ItemId');
			$COMS = $this->input->post('COMS');
			$Stock = $this->input->post('Stock');

			$this->db->set('COMS', $COMS);
			$this->db->set('Stock', $Stock);
			$this->db->where('ItemId', $ItemId);
			$this->db->update('productdetails');


			$this->session->set_flashdata('Edited', '
            <div class="alert alert-success" role="alert">
                Item Successfully Edited
            </div>');
			redirect('index.php/inventory');
		}
	}
}
