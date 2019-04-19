<?php
class User extends CI_Controller {
    
    public function __construct(){

        parent::__construct();
        if(!isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("error","Login to see this page");
            redirect('auth/login','refresh'); 
            }

    }


    public function profile()
	{
        $this->load->view('profile');
    }

    public function edit()
	{

          // view page
          if(isset($_POST['update'])){
            $this->form_validation->set_rules('username', "Username" , 'required');
            $this->form_validation->set_rules('email', "Email" , 'required');
            $this->form_validation->set_rules('password', "Password" , 'min_length[5]');
            $this->form_validation->set_rules('cpassword', "Confirm Password" , 'min_length[5]|matches[password]');
            $this->form_validation->set_rules('phone', "Phone" , 'required|min_length[10]');


            if($this->form_validation->run() == TRUE){
                echo 'form validated';  


                if($_POST['password'] != ''){
                    $data = array(
                        'username' => $_POST['username'],
                        'email' => $_POST['email'],
                        'password' => md5($_POST['password']),
                        'phone' => $_POST['phone'],
                        'gender' => $_POST['gender'],
                    );
                }else{
                    $data = array(
                        'username' => $_POST['username'],
                        'email' => $_POST['email'],
                        'phone' => $_POST['phone'],
                        'gender' => $_POST['gender'],
                    );
                }

                $this->db->where('id', $_POST['id']);
                $this->db->update('users', $data); // gives UPDATE mytable SET field = field+1 WHERE id = 2

                $data['id'] = $_POST['id'];
                $_SESSION['user'] = (object)$data;

            $this->session->set_flashdata("success","You has successfully updated.");
            redirect('user/edit','refresh');
            }
        }



        $data =  $_SESSION['user'];
        $this->load->view('profile-edit',$data);
    }
}
