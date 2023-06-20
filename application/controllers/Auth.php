<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
         $this->load->library('session');
    }
    public function login() {
        // Code for the login page
        $data['title'] = 'Login';
        $this->load->view('auth/login',$data);
    }

    public function register() {
        // Load the registration form view
        $this->load->view('auth/register');
    }

    public function login_post() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, show login form again
          
            $_SESSION['error'] = 'Please Check the form';
            redirect('/login');
        } else {
            // Check user credentials
            $username = $this->input->post('username');
            $password = $this->input->post('password');
          
            $user = $this->user_model->login($username, $password);

            if ($user) {
               // var_dump($user);
               $is_admin = ($user->ROLE_ID == 2) ? TRUE : FALSE;
               echo $is_admin;
                // If user credentials are valid, set session data and redirect to home page
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                $data_session = array(
                    'username' => $user->USERNAME,
                    'logged_in' => TRUE,
                    'is_admin' => $is_admin
                );

                $this->session->set_userdata('data_session', $data_session);
               
                if($is_admin): redirect('admin'); 
               else: redirect('userhome'); 
               endif;
              
            } else {
                // If user credentials are invalid, show login form with error message
                $_SESSION['error'] = "Password/Email incorrect";
                redirect('/login');
            }
        }
    }
    public function register_post() {
        // Set validation rules for the form fields
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[USERS.EMAIL]');
       // $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, show registration form again with validation errors
            $data['error'] = 'All required fields must be';
            $this->load->view('auth/register',$data);
        } else {
            // Get form data and pass it to user model
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $phone_number = $this->input->post('phone_number');
            $password = $this->input->post('password');
            $user = $this->user_model->create_user($email, $password, $username, $phone_number);
    
            if ($user) {
                // If user is created successfully, set session data and redirect to home page
                $data_session = array(
                    'username' => $username,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata('data_session', $data_session);
                redirect('userhome');
            } else {
                // If user creation fails, show registration form with error message
                $data['error'] = 'Failed to create user';
                echo "hi";
               $this->load->view('auth/register', $data);
            }
        }
    }
    

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('login');
    }
}