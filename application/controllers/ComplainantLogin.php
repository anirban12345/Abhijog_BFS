<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComplainantLogin extends My_Controller 
{
	public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');	
		$this->load->model('Loginmodel');	
    }
	
	public function index()
	{	
		$this->load->view('complainant/login');  
	}

	public function Register()
	{
		$this->load->view('complainant/register'); 
	}

	public function checkLogin()
	{
        $url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6LdHDqobAAAAALRfVUHpr-Sb1kW2DM5MvEbSAMb9",
			'response' => $this->input->post('token'),
			// 'remoteip' => $_SERVER['REMOTE_ADDR']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) 
        {           
			$username=trim($this->input->post('username'));
			$password=trim($this->input->post('password'));

			$data=$this->Loginmodel->get_complainant_user_data($username);

					if(count($data)>0)
					{
						$dbpassword=$data[0]->uc_password;							
						//$pass=$this->encrypt->encode('123456');	
						//echo '<pre>';
						//echo $password;						
						//echo  $dbpassword;
						
						if($password==$dbpassword)
						{
							$data[0]->logged_in=true;
							$this->session->set_userdata('complainant_userdtls',$data);							
							redirect('Complainant/Dashboard');
							//echo "success";
						}
						else
						{
							$this->session->set_flashdata('errmsg','Wrong Username or Password');
							redirect('ComplainantLogin');	
						}						
					}
					else{
						$this->session->set_flashdata('errmsg','Username not Found');
						redirect('ComplainantLogin');	
					}


        }
        else
        {
			echo "error";
        }       
	}
	 
	function logout()
	{
	  $this->session->sess_destroy(); 
	  delete_cookie('username'); 
	  delete_cookie('password');  
	  redirect('ComplainantLogin');
	}		
}
