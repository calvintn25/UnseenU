<?php
class cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }
    public function index() {}

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $item_id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');

        $cart = $this->cart->contents();
        $item_exists = false;
        $rowid = '';

        foreach ($cart as $key => $value) {
            if ($value['id'] == $item_id) {
                $item_exists = true;
                $rowid = $value['rowid'];
                break;
            }
        }

        if ($item_exists) {
            $data = array(
                'rowid'   => $rowid,
                'qty'     => $value['qty'] + $qty,
            );
            $this->cart->update($data);
        } else {
            $data = array(
                'id'      => $item_id,
                'name'    => $name,
                'qty'     => $qty,
                'price'   => $price,
            );
            $this->cart->insert($data);

            // Redirect to the page where the user came from
            redirect($redirect_page, 'refresh');
        }
    }
}
