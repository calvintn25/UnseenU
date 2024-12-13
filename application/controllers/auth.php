<?php
class auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_auth');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('index.php/dashboard');
            } else if ($this->session->userdata('role_id') == 2) {
                redirect('index.php/homePage');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('v_login');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    if ($user['role_id'] == 1) {
                        $this->session->set_userdata($data);
                        redirect('index.php/dashboard');
                    } else {
                        $this->session->set_userdata($data);
                        redirect('index.php/homePage');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Wrong!</div>');
                    redirect('index.php/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email Has Not Been Activated!</div>');
                redirect('index.php/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email Is Not Registered!</div>');
            redirect('index.php/auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('index.php/dashboard');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => "this email has alraedy registered"
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[8]|matches[password2]',
            [
                'matches' => "Password don't match",
                'min_length' => "Password too short!"
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('phone_num', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('DoB', 'DOB', 'required|trim|regex_match[/\d{4}-\d{2}-\d{2}/]');
        $this->form_validation->set_rules('PoB', 'POB', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_registration');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'gender' => $this->input->post('gender', true),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'phone_num' => $this->input->post('phone_num', true),
                'DoB' => htmlspecialchars($this->input->post('DoB', true)),
                'PoB' => htmlspecialchars($this->input->post('PoB', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $newUser = $this->model_auth->UserRegist($data);
            if ($newUser) {
                $this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Your Account Has Been Created, Please Login
                </div>');
                redirect('index.php/auth');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
            You Have Been Logged Out
        </div>');
        redirect('index.php/auth');
    }
}
