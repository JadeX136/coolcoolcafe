<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session','pagination','form_validation'));
        $this->load->helper(array('url'));
		$this->load->model(array('customer_database'));
    } 
    public function index(){
        if(!$this->session->userdata('customer_login')){
            redirect(base_url('/login'));
        }
        else{
            $username = $this->read_user_information();
            $data = array(
                'title' => "Profile",
                'customer_username' => $username->username,
                'detail' => "profile/myorder_v",
                //'query' => $this->db->get_where('coolcool_order',array('username' => $username))->result(),
                'content' => "profile/template_profile_v"
            );
            $this->load->view('welcome_message',$data);
        }
    }
    public function account(){
        if(!$this->session->userdata('customer_login')){
            redirect(base_url('/login'));
        }
        else{
            $username = $this->read_user_information();
           
            $data = array(
                'title' => "Account",
                'customer_name' => $username->name,
                'customer_username' => $username->username,
                'customer_id' => $username->customer_id,
                'customer_email' => $username->email,
                'customer_phonenumber' => $username->phonenumber,
                //'query' => $this->db->get_where('coolcool_customer',array('id' => $username->customer_id))->result(),
                'detail' => "profile/profile_v",
                'content' => "profile/template_profile_v"
            );
            print_r($data);
            $this->load->view('welcome_message',$data);
        }
    }
    public function order_history(){
        if(!$this->session->userdata('customer_login')){
            redirect(base_url('/'));
        }
        else{
            $username = ($this->session->userdata['customer_login']['username']);
            $result = $this->customer_database->read_user_information($username);

        }
    }
}
?>