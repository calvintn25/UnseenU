<?php
class profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/v_sidebar', $data);
        $this->load->view('template/v_topbar', $data);
        $this->load->view('v_profile', $data);
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('PoB', 'POB', 'trim|required');
        $this->form_validation->set_rules('DoB', 'DOB', 'trim|required');
        $this->form_validation->set_rules('phone_num', 'phone_num', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_sidebar', $data);
            $this->load->view('template/v_topbar', $data);
            $this->load->view('v_editProfile', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->session->userdata('email');
            $gender = $this->input->post('gender');
            $address = $this->input->post('address');
            $PoB = $this->input->post('PoB');
            $DoB = $this->input->post('DoB');
            $phone_num = $this->input->post('phone_num');

            //cek if there is a uploaded file 
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->set('gender', $gender);
            $this->db->set('address', $address);
            $this->db->set('PoB', $PoB);
            $this->db->set('DoB', $DoB);
            $this->db->set('phone_num', $phone_num);
            $this->db->where('email', $email);
            $this->db->update('user');


            $this->session->set_flashdata('Edited', '
            <div class="alert alert-success" role="alert">
                Your Profile Has Been Updated!
            </div>');
            redirect('index.php/profile');
        }
    }

    public function changePW()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Change Password";
        $this->form_validation->set_rules('CurrentPw', 'Current Password', 'trim|required');
        $this->form_validation->set_rules(
            'NewPW1',
            'New Password',
            'trim|required|min_length[8]|matches[NewPW2]',
            [
                'matches' => "Password don't match",
                'min_length' => "Password too short!"
            ]
        );
        $this->form_validation->set_rules('NewPW2', 'Repeat Password', 'trim|required|matches[NewPW1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_sidebar', $data);
            $this->load->view('template/v_topbar', $data);
            $this->load->view('v_changePw', $data);
        } else {
            $CurrentPw = $this->input->post('CurrentPw');
            $NewPw = $this->input->post('NewPW1');
            if (!password_verify($CurrentPw, $data['user']['password'])) {
                $this->session->set_flashdata('PWchanged', '
                <div class="alert alert-danger" role="alert">
                    Incorrect Password
                </div>');
                redirect('index.php/profile/changePW');
            } else {
                if ($CurrentPw == $NewPw) {
                    $this->session->set_flashdata('PWchanged', '
                    <div class="alert alert-danger" PWchanged="alert">
                        New Password cannot be the same as current password
                    </div>');
                    redirect('index.php/profile/changePW');
                } else {
                    $pass = password_hash($NewPw, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('PWchanged', '
                    <div class="alert alert-success" role="alert">
                       Your Password has been changed!
                    </div>');
                    redirect('index.php/profile/changePW');
                }
            }
        }
    }

    public function userProfile()
    {
        $data['title'] = 'User Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/user/v_head', $data);
        $this->load->view('template/user/v_topbar', $data);
        $this->load->view('template/user/v_UserProfile', $data);
        $this->load->view('template/user/v_footer', $data);
    }

    public function editUserProfile()
    {
        $data['title'] = 'Edit User Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('PoB', 'POB', 'trim|required');
        $this->form_validation->set_rules('DoB', 'DOB', 'trim|required');
        $this->form_validation->set_rules('phone_num', 'phone_num', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user/v_head', $data);
            $this->load->view('template/user/v_topbar', $data);
            $this->load->view('template/user/v_editUserProfile', $data);
            $this->load->view('template/user/v_footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->session->userdata('email');
            $gender = $this->input->post('gender');
            $address = $this->input->post('address');
            $PoB = $this->input->post('PoB');
            $DoB = $this->input->post('DoB');
            $phone_num = $this->input->post('phone_num');

            //cek if there is a uploaded file 
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->set('gender', $gender);
            $this->db->set('address', $address);
            $this->db->set('PoB', $PoB);
            $this->db->set('DoB', $DoB);
            $this->db->set('phone_num', $phone_num);
            $this->db->where('email', $email);
            $this->db->update('user');


            $this->session->set_flashdata('Edited', '
            <div class="alert alert-success" role="alert">
                Your Profile Has Been Updated!
            </div>');
            redirect('index.php/profile/userProfile');
        }
    }

    public function UserchangePW()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Change Password";
        $this->form_validation->set_rules('CurrentPw', 'Current Password', 'trim|required');
        $this->form_validation->set_rules(
            'NewPW1',
            'New Password',
            'trim|required|min_length[8]|matches[NewPW2]',
            [
                'matches' => "Password don't match",
                'min_length' => "Password too short!"
            ]
        );
        $this->form_validation->set_rules('NewPW2', 'Repeat Password', 'trim|required|matches[NewPW1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/user/v_head', $data);
            $this->load->view('template/user/v_topbar', $data);
            $this->load->view('template/user/v_UserchangePw', $data);
            $this->load->view('template/user/v_footer', $data);
        } else {
            $CurrentPw = $this->input->post('CurrentPw');
            $NewPw = $this->input->post('NewPW1');
            if (!password_verify($CurrentPw, $data['user']['password'])) {
                $this->session->set_flashdata('PWchanged', '
                <div class="alert alert-danger" role="alert">
                    Incorrect Password
                </div>');
                redirect('index.php/profile/changePW');
            } else {
                if ($CurrentPw == $NewPw) {
                    $this->session->set_flashdata('PWchanged', '
                    <div class="alert alert-danger" PWchanged="alert">
                        New Password cannot be the same as current password
                    </div>');
                    redirect('index.php/profile/changePW');
                } else {
                    $pass = password_hash($NewPw, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('PWchanged', '
                    <div class="alert alert-success" role="alert">
                       Your Password has been changed!
                    </div>');
                    redirect('index.php/profile/UserchangePW');
                }
            }
        }
    }
}
