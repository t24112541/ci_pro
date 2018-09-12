<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
    }

	public function index()
	{
		
			if($this->admin->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				redirect("dashboard");

			}else{

				//jika session belum terdaftar

				//set form validation
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            $password = MD5($this->input->post('password', TRUE));
	            
	            //checking data via model
	            $checking = $this->admin->check_login('tbl_users', array('username' => $username), array('password' => $password));
	            
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'user_id'   => $apps->id_user,
	                        'user_name' => $apps->username,
	                        'user_pass' => $apps->password,
	                        'user_nama' => $apps->nama_user
	                    );
	                    //set session userdata
	                    $this->session->set_userdata($session_data);
	                    echo "username".$username."<br>";
	                    echo "password".$password;
	                    //redirect('dashboard/');

	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
	            	$this->load->view('login', $data);
	            }

	        }else{

	            $this->load->view('login');
	        }

		}

	}
	public function add_admin(){
		$this->load->view('add_admin');
	}
	public function add_admin_process(){
		$data=array(
					"nama_user"=>$this->input->post("ad_name"),
					"username"=>$this->input->post("ad_username"),
					"password"=>(md5($this->input->post("ad_password"))),
							);
		$config = array(
		               	array(
		                     'field'   => 'ad_name', 
		                     'label'   => 'ชื่อ', 
		                     'rules'   => 'required'
		                  ),
		               	array(
		                     'field'   => 'ad_username', 
		                     'label'   => 'username ', 
		                     'rules'   => 'required'
		                  ),   
		               	array(
		                     'field'   => 'ad_password', 
		                     'label'   => 'password', 
		                     'rules'   => 'required'
		                  ),
		            );
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('required', '<label style="color:#82333a"><i class="fa fa-exclamation-circle"></i> %s ห้ามว่าง</label>');
		if ($this->form_validation->run() == TRUE) {

			$table="tbl_users";
			$field_chk="username";
			$data_chk=$this->input->post("ad_username");
			$chk=$this->sql_admin->chk_add_process01($table,$field_chk,$data_chk);
			if($chk == FALSE){
				$data=array(
					"error"=>'<div class="alert alert-danger" style="margin-top: 3px">
						<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> มี username ดังกล่าวอยู่ในระบบอยู่แล้ว!</div></div>',
				);
				$this->load->view('add_admin', $data);
			}else{
				
					$this->sql_admin->add_process01($table,$data);
					echo "OK";
					//redirect("ctrl_admin/sh_admins");
			}
		}
		else{$this->load->view('add_admin',$data); }
	}
}
