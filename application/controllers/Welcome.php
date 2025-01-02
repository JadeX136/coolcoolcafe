<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct(){
        parent::__construct();
        $this->load->library(array('session','pagination','form_validation','cart'));
        $this->load->helper(array('url'));
		$this->load->model(array('customer_database'));
    }
	public function index(){
		if(!$this->session->userdata('customer_login')){
			$data = array(
				'title' => "Cool Cool Cafe The Best For You | coolcoolhomecafe.com",
				'customer_username' => "LOG IN",
				'content' => "Home_v"
			);
			$this->load->view('welcome_message',$data);
		}
		else{
			$username = $this->read_user_information();
			$data = array(
				'title' => "Cool Cool Cafe The Best For You | coolcoolhomecafe.com",
				'customer_username' => $username->username,
				'content' => "Home_v"
			);
			$this->load->view('welcome_message',$data);
		}
	}
}
