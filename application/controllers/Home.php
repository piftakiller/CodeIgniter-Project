<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		$this->load->database();
		$query = $this->db->query("SELECT * FROM PRODUCTS ORDER BY PRODUCT_ID DESC FETCH FIRST 4 ROWS ONLY");
		$data['products'] = $query->result();
		$data['title'] = 'Welcome';
		//var_dump( $_SESSION);
		$this->load->view('index', $data);
	}
}
