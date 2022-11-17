<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //mengaktifkan library form validation
        $this->load->library('form_validation');
    }

    public function index()
    {
        //VALIDASI FORM DARI VIEW
        $this->form_validation->set_rules('userID', 'UserID', 'required|trim');
        $this->form_validation->set_rules('userPassword', 'User Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi login
            $this->_login();
        }
    }

    private function _login()
    {
        //mengambil user ID dan PAssword
        $userID = $this->input->post('userID');
        $userPassword = md5($this->input->post('userPassword'));

        $user = $this->db->get_where('mdatauser', ['userID' => $userID])->row_array();

        // JIKA USER ADA
        if ($user) {
            //usernya AKTIF
            if ($user['status'] == 1) {
                //cek Password
                if ($user['userPassword'] == $userPassword) {
                    $data = [
                        'OnSite' => $user['OnSite'],
                        'userID' => $user['userID'],
                        'userName' => $user['userName'],
                        'userMail' => $user['userMail'],
                        'userSection' => $user['userSection'],
                        'LocFloor' => $user['LocFloor'],
                        'userPict' => $user['userPict']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['ApprovalAccess'] == 1) {
                        redirect('import');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password!
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account Not Active!
                    </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Nik Not Registered!
                    </div>');
            redirect('auth');
        }
    }







    public function registration()
    {
        //validasi isi form
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This nik has already registered'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont match',
                'min_length' => 'Password too short'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registration Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses!
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('userID');
        $this->session->unset_userdata('userName');
        $this->session->unset_userdata('userSection');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Logout Success!
                    </div>');
        redirect('auth');
    }
}