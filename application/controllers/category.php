<?php
class category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "UnseenU | Category";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select_max('category_id');
        $query = $this->db->get('category');
        $last = $query->row_array();

        if ($last && $last['category_id'] != null) {
            $next = $last['category_id'] + 1;
        } else {
            $next = 1;
        }

        $data['categories'] = $this->db->get('category')->result();
        $data['next'] = $next;

        $this->load->view('template/v_category-sidebar', $data);
        $this->load->view('template/v_topbar', $data);
        $this->load->view('v_category', $data);
    }

    public function addNewCatg()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->db->get('category')->result_array();

        $this->form_validation->set_rules('catg', 'Category', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['show_modal'] = true;
            $this->load->view('template/v_sidebar', $data);
            $this->load->view('template/v_topbar', $data);
            $this->load->view('v_category', $data);
        } else {
            $category_id = $this->input->post('category_id');
            $category = $this->input->post('catg');
            $upload_image = $_FILES['image']['name'];


            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/category';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $image = $upload_data['file_name'];
                } else {
                    echo $this->upload->display_errors();
                    return;
                }
            } else {
                $image = 'default.jpg'; // Optional: Set a default image if no file is uploaded
            }
        }
        $category_data = [
            'category_id' => $category_id,
            'category' => $category,
            'image' => $image
        ];
        $this->db->insert('category', $category_data);

        // Redirect or load success message
        redirect('index.php/category');
    }
}
