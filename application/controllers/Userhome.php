<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userhome extends CI_Controller {
    public function __construct() {
        parent::__construct();
       
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('user_model');
         $this->load->library('session');
    }
	public function index()
	{
		if(!isset($_SESSION["data_session"])){
            redirect('/login');
        }else{
            $data['title'] = 'Homepage';
            $this->load->view('userhome',$data);
        }
            
	}
}
