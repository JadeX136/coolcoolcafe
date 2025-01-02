<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->library(array('session','pagination','form_validation'));
        $this->load->helper(array('url'));
		$this->load->model(array('Login_database','coolcool_menu'));
    }
	public function index(){
		$this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');
        if($this->form_validation->run() == FALSE){
            if(isset($this->session->userdata['logged_in'])){
                redirect(base_url('/admin/dashboard'));
            }
            else{
                $data = array(
                    'title' => "เข้าสู่ระบบ | coolcool.com",
                    'admin_username' => "",
                    'admin_level' => "",
                    'content' => "Admin/login_v"
                );
                $this->load->view('Admin/template_admin_v',$data);
            }
        }
        else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$result = $this->Login_database->login($data);
			if($result == true){
				$unixtimestamp = time();
				$username = $this->input->post('username');
				$result = $this->Login_database->read_user_information($username);
				if($result != false){
					$session_data = array('username'=>$result[0]->username);
					$this->session->set_userdata('logged_in',$session_data);
					$this->session->set_flashdata('success','เข้าสู่ระบบเรียบร้อย');
					log_message('INFO', "username : {$result[0]->username} Visit Add User Page");
					redirect(base_url('/admin/dashboard'));
				}
			}
			else{
				
			}
        }
	}
	function logout(){
		$username = ($this->session->userdata['logged_in']['username']);
            $result = $this->login_database->read_user_information($username);
           
            log_message("ACTION","USERNAME : {$result[0]->username} Logout --- IP ADDRESS {$ip}");
            $sess_array = array('username' => '');
            $this->session->unset_userdata('logged_in', $sess_array);
            $data['message_display'] = 'Successfully Logout';
            $this->session->set_flashdata('fail','ออกจากระบบเรียบร้อยแล้ว');
            redirect(base_url('/admin'));
	}
	function dashboard(){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url('/admin'));
		}
		else{
			$username = ($this->session->userdata['logged_in']['username']);
			$result = $this->Login_database->read_user_information($username);
			$data = array(

				'content' => "admin/dashboard_v"
			);
			$this->load->view('admin/template_admin_v',$data);
		}
	}
	function Menu(){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url('/admin'));
		}
		else{
			$username = ($this->session->userdata['logged_in']['username']);
			$result = $this->Login_database->read_user_information($username);
			$config = array(
				'base_url' => base_url('/admin/Menu'),
				'per_page' => 12,
				'num_link' => 5,
				'full_tag_open' => '<ul class="pagination justify-content-center">',
				'full_tag_close' => '</ul>',
				'first_link' => FALSE,
				'last_link' => FALSE,
				'first_tag_open' => '<li class="page-item">',
				'first_tag_close' => '</li>',
				'prev_link' => '<div class="page-link">&laquo</div>',
				'prev_tag_open' => '<li class="page-item prev">',
				'prev_tag_close' => '</li>',
				'next_link' => '<div class="page-link">&raquo</div>',
				'next_tag_open' => '<li class="page-item next">',
				'next_tag_close' => '</li>',
				'last_tag_open' => '<li>',
				'last_tag_close' => '</li>',
				'cur_tag_open' => '<li class="active page-item"><a class="page-link" href="#">',
				'cur_tag_close' => '</a></li>',
				'num_tag_open' => '<li class="page-item page-link">',
				'num_tag_close' => '</li>',
				'total_rows' => $this->db->get('coolcool_menu')->num_rows()
			);
			$this->db->order_by('product_id','desc');
			$this->pagination->initialize($config);
			$data = array(
				'title' => "จัดการเมนู | coolcool.com",
				'admin_username' => $result[0]->username,
				//'admin_level' => $result[0]->level,
				'link' => $this->pagination->create_links(),
				'query' => $this->db->get('coolcool_menu',$config['per_page'],$this->uri->segment(3))->result(),
				'content' => "/Admin/Menu/Menu_v"
			);
			$this->load->view('admin/template_admin_v',$data);
		}
	}
	function addMenu(){
		$this->form_validation->set_rules('nameTH','nameTH','trim|required');
		$this->form_validation->set_rules('nameEN','nameEN','trim|required');
		$this->form_validation->set_rules('price','price','trim|required');
		$this->form_validation->set_rules('formtype','formtype','trim|required');
		if(!$this->session->userdata('logged_in')){
			redirect(base_url('/admin'));
		}
		else{
			$username = ($this->session->userdata['logged_in']['username']);
			$result = $this->Login_database->read_user_information($username);
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('fail','กรุณากรอกข้อมูลให้ครบถ้วน');
				redirect(base_url('/admin/Menu'));
			}
			else{
				$unixtimestamp = time();
				$config = array(
					'upload_path' => base_url('/assets/menu/thumbnail'),
					'allowed_typs' => 'jpg',
					'file_name' =>  $unixtimestamp
				);
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('thumbnail')){
					$error = $this->upload->display_errors();
					echo $error;
				}
				else{
					$data = array(
						'nameTH' => $this->input->post('nameTH'),
						'nameEN' => $this->input->post('nameEN'),
						'price' => $this->input->post('price'),
						'formtype' => $this->input->post('formtype'),
						'posted' => $username,
						'post_date' => $unixtimestamp,
						'update_date' => $unixtimestamp
					);
					if($this->coolcool_menu->addMenu($data)){
						echo "Add Success";
					}
					else{
						echo "Add Fail";					
					}
				}
			}
		}
	}	
	function editMenu($product_id){
		if(!$this->session->userdata('logged_in')){
			redirect(base_url('/admin'));
		}
		else{
			$username = ($this->session->userdata['logged_in']['username']);
			$result = $this->Login_database->read_user_information($username);
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('fail','กรุณากรอกข้อมูลให้ครบถ้วน');
				redirect(base_url("/admin/editMenu/{$product_id}"));
			}
			else{
				$unixtimestamp = time();
				$detail = $this->db->get_where('coolcool_menu',array('product_id' => $product_id))->result();
				foreach($detail as $row){
					$config = array(
						'upload_path' => base_url('/assets/menu/thumbnail'),
						'allowed_typs' => 'jpg',
						'file_name' => $row->post_date
					);
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					$this->upload->overwrite = true;
					if(!empty($_FILES['thumbnail']['name']) && !$this->upload->do_upload('thumbnail')){
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('fail',"ไม่สามารถอัพโหลดภาพหน้าปกได้<br> $error");
						redirect(base_url("/admin/editMenu/{$row->product_id}"));
					}
					else{
						$data = array(
							'nameTH' => $this->input->post('nameTH'),
							'nameEN' => $this->input->post('nameEN'),
							'price' => $this->input->post('price'),
							'posted' => $username,
							'update_date' => $unixtimestamp,
							'formtype' => $this->input->post('formtype')
						);
					}
				}
			}
		}
	}
}
