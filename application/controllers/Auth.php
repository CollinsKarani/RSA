<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
/* validate the login process */
public function check_login(){
    if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = hash('md5', $_POST['password']);
     $res=$this->check_user($email,$pass);
     if(!empty($res))
        {
        $userdata=array(
            'email'=>$res[0]['email'],
            'is_logged_user'=>1);
            $this->session->set_userdata($userdata);
        redirect(base_url().'user/products');
        }
        else{
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Wrong Credentials. Please check and try again.</div>');
        redirect(base_url().'auth/');
        }
    }
}

//function to check the database credentials
public function check_user($email,$pass)
    {
        $sql = "SELECT * FROM user where email = ? and password = ?";
        $data = $this->db->query($sql, array($email,$pass));
        return ($data->result_array()) ;
    }


/* user registration interface */
	public function registration()
	{
		$this->load->view('user-registration');
	}
/* process the user registration */
public function register(){
    if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passhash = hash('md5', $password);
    $data = array('fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'password' => $passhash);
    $result=$this->db->insert('user',$data);
    if($result){
    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Success!!! Your account has been created successfully.</div>');
    redirect(base_url('auth/registration'));
    }
    else{
    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Sorry!!! An error occurred. Please try again ...</div>');
    redirect(base_url('auth/registration'));
    }
    }
}


//manage logout
public function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'auth/', 'refresh');
}
}
