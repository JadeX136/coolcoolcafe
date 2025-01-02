<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        if($this->form_validation->run() == false){
            if(isset($this->session->userdata['customer_login'])){
                $username = ($this->session->userdata['customer_login']['username']);
                $result = $this->customer_database->read_user_information($username);
               // redirect(base_url("/profile/dashboard/{$result[0]->customer_id}"));
              // echo "test";
            }
            else{
                $data = array(
                    'title' => "Login | coolcool.com",
                    'customer_username' => "",
                    'customer_level' => "",
                    'content' => "login_v"
                );
               
                $this->load->view('welcome_message',$data);
            }
        }
        else{
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );
            $result = $this->customer_database->login($data);
            if($result == true){
                $unixtimestamp = time();
                $username = $this->input->post('username');
                $result = $this->customer_database->read_user_information($username);
                if($result != false){
                    $session_data = array('username' => $result[0]->username);
                    $this->session->set_userdata('customer_login',$session_data);
                    $this->session->set_flashdata('success','Login Success');
                    redirect(base_url('/'));
                }
            }
            else{
                
            }
        }
       
	}
    function logout(){
        $username = ($this->session->userdata['customer_login']['username']);
        $result = $this->customer_database->read_user_information($username);
        $sess_array = array('username' => '');
        $this->session->unset_userdata('customer_login',$sess_array);
        $data['message_display'] = 'logout';
    }
}
