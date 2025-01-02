<?php
class Signup extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library(array('session','pagination','form_validation'));
        $this->load->helper(array('url'));
        $this->load->model(array('Login_database'));
    }

    function index(){
        $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        $this->form_validation->set_rules('name','name','trim|required');
        $this->form_validation->set_rules('phonenumber','phonenumber','trim|required');
        if($this->form_validation->run() == False){
            $data = array(
                'title' => "Sign up | coolcool.com",
                'content' => "Signup/signup_v"
            );
            $this->load->view('welcome_message',$data);
        }
        else{
            $unixtimestamp = time();
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'name' => $this->input->post('name'),
                'phonenumber' => $this->input->post('phonenumber'),
                'post_date' => $unixtimestamp
            );
            if($this->customer_database->sigup($data)){
                $this->session->set_flashdata('success','Sign up Success');
                redirect(base_url('/'));
            }
            else{
                $this->session->set_flashdata('fail','Sing up Fail');
                redirect(base_url('/'));
            }
        }
    }
}
?>