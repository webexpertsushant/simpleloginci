<?php
class Auth extends CI_Controller {
    
    public function check_construct(){
        if(isset($_SESSION['user_logged'])){
            $this->session->set_flashdata("sucess","Already Login");
            redirect('user/profile','refresh'); 
            }
    }


    public function login()
	{

        $this->check_construct();

          // view page
          if(isset($_POST['login'])){
            $this->form_validation->set_rules('email', "Email" , 'required');
            $this->form_validation->set_rules('password', "Password" , 'required');


            if($this->form_validation->run() == TRUE){

                $this->db->select('*');
                $this->db->from('users');
                $this->db->where(array(
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']), 
                ));
                $query = $this->db->get();
                $user = $query->row();
                if($user){

                    $this->session->set_flashdata("success","You has successfully login.");

                    $_SESSION['user_logged'] = TRUE;
                    $_SESSION['user'] = $user;

                    redirect('user/profile','refresh');

                }else{
                    $this->session->set_flashdata("error","User not found.");
                    redirect('auth/login','refresh');                   
                }

            
            }
        }


        $this->load->view('login');
      
    }
    
    public function register()
	{

        $this->check_construct();

        // view page
        if(isset($_POST['register'])){
            $this->form_validation->set_rules('username', "Username" , 'required');
            $this->form_validation->set_rules('email', "Email" , 'required');
            $this->form_validation->set_rules('password', "Password" , 'required|min_length[5]');
            $this->form_validation->set_rules('cpassword', "Confirm Password" , 'required|min_length[5]|matches[password]');
            $this->form_validation->set_rules('phone', "Phone" , 'required|min_length[10]');


            if($this->form_validation->run() == TRUE){
                echo 'form validated';  

                $data = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'phone' => $_POST['phone'],
                    'gender' => $_POST['gender'],
                );
           $this->db->insert('users',$data);
            $this->session->set_flashdata("success","You has successfully registerd.");
            redirect('auth/register','refresh');
            }
        }

        $this->load->view('register');
	}

    public function logout(){
        $this->session->unset_userdata('user_logged');
        $this->session->unset_userdata('user');
        redirect('auth/login','refresh');
    }

}
