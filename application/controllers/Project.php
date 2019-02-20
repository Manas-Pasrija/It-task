<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {


	public function index()
	{
		$this->load->view('login_page');
	}

	public function store()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
        
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

               if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('login_page');
                }
                else
                {
                    $data=$_POST;

          
			
		    $config['upload_path'] = './uploads/';

           $config['allowed_types'] = 'gif|jpg|png';

           $this->load->library('upload', $config);

           if($this->upload->do_upload('image'))
           {
           	    $this->load->database();
           	    $upload_data = $this->upload->data(); 
                $data['image'] =   $upload_data['file_name'];

           	    $is_save=$this->db->insert('users',$data);


           	    if($is_save)
           	    {
           	    	$this->session->set_flashdata('msg','Successfully SignIn');
                    $this->load->view('signup_page');
           	    }
               
           }
           else
			{
			$error = array('error' => $this->upload->display_errors());
			//$this->load->view('file_view', $error);
			}
    
                }

			
		}
	}

	public function check()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$data=$_POST;
			$num_rows=$this->db->where(array('email' => $data['email'],'password'=>$data['password'],'role'=>1))->get('users')->num_rows();
			$data1=$this->db->where(array('email' => $data['email'],'password'=>$data['password'],'role'=>1))->get('users')->row_array();
			if($num_rows==1)
			{
				$data['users']=$this->db->get('users')->result_array();
		        $this->session->set_userdata($data1);
			    $this->load->view('admin-panel',$data);
		     }
		     else{
		     	   $data1=$this->db->where(array('email' => $data['email'] , 'password'=>$data['password']))->get('users')->row_array();
		     	   $num_rows=$this->db->where(array('email' => $data['email'] , 'password'=>$data['password']))->get('users')->num_rows();

		     	   if($num_rows==1)
		     	   {
                      $this->session->set_userdata($data1);
		     	      $this->load->view('user-panel');
		     	   }
		     	   else
		     	   {
		     	   	 $this->session->set_flashdata('err','Invalid Id Or Password');
		     	   	 $this->load->view('signup_page');
		     	   }
		     	   
		     }
		}

	}


	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('signup_page');
     }

}




