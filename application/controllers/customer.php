<?php
class customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "UnseenU | Customer";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select_max('cust_id');
        $query = $this->db->get('customer');
        $last = $query->row_array();

        if ($last && $last['cust_id'] != null) {
            $next = $last['cust_id'] + 1;
        } else {
            $next = 1;
        }

        $data['customer'] = $this->db->get('customer')->result();
        $data['next'] = $next;

        $this->load->view('template/v_customer-sidebar', $data);
        $this->load->view('template/v_topbar', $data);
        $this->load->view('v_customer', $data);
    }

    public function addNew()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('cust', 'Customer Name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['show_modal'] = true; // Flag to show the modal
            $this->load->view('template/v_sidebar', $data);
            $this->load->view('template/v_topbar', $data);
            $this->load->view('v_customer', $data);
        } else {
            // Process form submission (e.g., save customer to database)
            $data = [
                'cust_id' => $this->input->post('custId'),
                'cust_name' => $this->input->post('cust')
            ];
            $this->db->insert('customer', $data);

            // Redirect or load success message
            redirect('index.php/customer');
        }
    }
}
