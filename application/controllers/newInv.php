<?php
class newInv extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Invoice";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->select_max('invoice_id');
        $query = $this->db->get('invoice');
        $last = $query->row_array();

        if ($last && $last['invoice_id'] != null) {
            $next = $last['invoice_id'] + 1;
        } else {
            $next = 1;
        }

        $data['next'] = $next;


        $data['productdetails'] = $this->db->get('productdetails')->result();
        $data['customer'] = $this->db->select('cust_id, cust_name')->get('customer')->result_array();
        $this->load->view('template/v_sidebar');
        $this->load->view('template/v_topbar', $data);
        $this->load->view('v_addInvoice', $data);
    }
}
