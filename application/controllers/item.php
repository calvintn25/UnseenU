<?php
class item extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_item');
	}
	public function index()
	{
		$data["title"] = 'UnseenU | Item';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['items'] = $this->model_item->get_item();
		$this->load->view('template/v_item-sidebar', $data);
		$this->load->view('template/v_topbar', $data);
		$this->load->view('v_item', $data);
	}

	public function add()
	{
		$data['title'] = 'UnseenU | Add Item';
		$data['category'] = $this->db->get('category')->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules(
			'ItemId',
			'ItemId',
			'trim|required|is_unique[productdetails.ItemId]',
			[
				'is_unique' => "Id is occupied"
			]
		);
		$this->form_validation->set_rules(
			'ItemName',
			'ItemName',
			'trim|required|is_unique[productdetails.ItemName]',
			[
				'is_unique' => "Item already exist"
			]
		);

		$this->form_validation->set_rules('Category', 'Category', 'trim|required');
		$this->form_validation->set_rules('Price', 'Price', 'trim|required');
		$this->form_validation->set_rules('COMS', 'COMS', 'trim|required');
		$this->form_validation->set_rules('stock', 'stock', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/v_item-sidebar', $data);
			$this->load->view('template/v_topbar', $data);
			$this->load->view('v_addItem', $data);
		} else {
			$item_image = $_FILES['image']['name'];
			$image_name = '';
			if ($item_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']    	 = '2048';
				$config['upload_path']	 = './assets/img/item';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$image_name = $this->upload->data('file_name');
				}
			} else {
				echo $this->upload->display_errors();
				redirect('index.php/item/add');
			}
			$add = [
				'ItemId' => htmlspecialchars($this->input->post('ItemId', true)),
				'ItemName' => htmlspecialchars($this->input->post('ItemName', true)),
				'Image' => $image_name,
				'category_id' => htmlspecialchars($this->input->post('Category', true)),
				'Price' => htmlspecialchars($this->input->post('Price', true)),
				'COMS' => htmlspecialchars($this->input->post('COMS', true)),
				'stock' => htmlspecialchars($this->input->post('stock', true))
			];

			$newItem = $this->model_item->addItem($add);
			if ($newItem) {
				$this->session->set_flashdata('ItemAdded', '
				<div class="alert alert-success" role="alert">
					Item Successfully Added
				</div>');
				redirect('index.php/item/add');
			}
		}
	}

	public function editItem($ItemId)
	{
		$this->load->model('model_item');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['category'] = $this->db->get('category')->result();
		$data['item'] = $this->model_item->get_data_byid($ItemId);
		$this->form_validation->set_rules('ItemId', 'ItemId', 'required');
		$this->form_validation->set_rules('ItemName', 'Item Name', 'trim|required');
		$this->form_validation->set_rules('Price', 'Price', 'trim|required');
		$this->form_validation->set_rules('Category', 'Category', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/v_item-sidebar');
			$this->load->view('template/v_topbar', $data);
			$this->load->view('v_editItem', $data);
			print_r(validation_errors());
		} else {
			$ItemId = $this->input->post('ItemId');
			$ItemName = $this->input->post('ItemName');
			$Price = $this->input->post('Price');
			$Category = $this->input->post('Category');

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/item';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['item']['Image'];
					if ($old_image) {
						unlink(FCPATH . 'assets/img/item/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('Image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('ItemName', $ItemName);
			$this->db->set('Price', $Price);
			$this->db->set('Categories', $Category);
			$this->db->where('ItemId', $ItemId);
			$this->db->update('productdetails');


			$this->session->set_flashdata('Edited', '
            <div class="alert alert-success" role="alert">
                Item Successfully Edited
            </div>');
			redirect('index.php/item');
		}
	}

	public function deleteItem($id)
	{
		$deleted = $this->model_item->deleteItem($id);

		if ($deleted) {
			$this->session->set_flashdata('ItemDeleted', '
			<div class="alert alert-success" role="alert">
				Item Successfully Deleted
			</div>');
			redirect('index.php/item');
		}
	}

	public function print()
	{
		$data['items'] = $this->model_item->get_item();
		$this->load->view('v_printItem', $data);
	}
}
