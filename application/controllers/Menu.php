<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		$this->load->model(array('Login_database'));
    } 
    public function index(){
        if(!$this->session->userdata('customer_login')){
            redirect(base_url('/login'));
        }
        else{
            $username = $this->read_user_information();
            $data = array(
                'customer_username' => $username->username,
                'title' => "Menu",
                'coffee' => $this->db->get_where('coolcool_menu',array('type'=>"Coffee"))->result(),
                'tea' => $this->db->get_where('coolcool_menu',array('type'=>"Tea"))->result(),
                'soda' => $this->db->get_where('coolcool_menu',array('type'=>"Soda"))->result(),
                'content' => "Menu/menu_v"
            );
            $this->load->view('welcome_message',$data);
        }
    }
    function detail($product_id){
        if(!$this->session->userdata('customer_login')){
            redirect(base_url('/signup'));
        }
        else{
            $username = $this->read_user_information();
            $detail = $this->db->get_where('coolcool_menu',array('product_id' => $product_id))->result();
            foreach($detail as $row){
                $data = array(
                    'customer_username' => $username->username,
                    'id' => $row->product_id,
                    'title' => "{$row->nameEN} | coolcool.com",
                    'HeadH1' => "{$row->nameEN}",
                    'formtype' => "{$row->formtype}",
                    'query' => $this->db->get_where('coolcool_menu',array('product_id' => $product_id))->result(),
                    'content' => "Menu/Menu_detail_v"
                ); 
                $this->load->view('welcome_message',$data);
            }
           
          
        }
    }
}
