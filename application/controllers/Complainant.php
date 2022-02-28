<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complainant extends Complainant_Controller 
{
	public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');	
		$this->load->model('Loginmodel');			
    }

	public function sendOTP()
	{
		$otp=rand(1000,9999);
		$mobile=$this->input->post('mobile');
		$fields = array(
			"sender_id" => "TXTIND",
			"message" => "Your Mobile No : ".$mobile." and Your Abhijog ,Anti Bank Fraud Section , Kolkata Police OTP Is : ".$otp,
			"route" => "v3",
			"numbers" => $mobile,
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($fields),
		CURLOPT_HTTPHEADER => array(
			"authorization: eabfEBj0MYrG7hDC1QL4OTokuyp2znvxX3smARl8WqtKi9JPZImDEhgF61USy9ZbuPJt72dpL3qxrARB",
			"accept: */*",
			"cache-control: no-cache",
			"content-type: application/json"
		),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
			$data=array(
				'uo_timestamp'=>time(),
                'uo_mobileno'=>$mobile,                            
                'uo_otp'=>$otp,                                                                             
                'uo_datetime'=>date('Y-m-d H:i'), 
                'uo_flag'=>1, 
                'uo_ip'=>$this->input->ip_address()
            );
            //print_r($data);
            $this->Globalmodel->savedata('user_otp',$data);
			echo $response;
		}
	}

	public function fetchOTP($mobile)
	{
		$this->data['otpdtls']=$this->Globalmodel->getdata_by_field_array('MAX(uo_id) as c','user_otp',array('uo_mobileno'=>$mobile),'uo_id', 'asc');	
		//print_r(!empty($this->data['otpdtls'][0]->c)?$this->data['otpdtls'][0]->c:0);
		$uo_id=!empty($this->data['otpdtls'][0]->c)?$this->data['otpdtls'][0]->c:0;
		
		if($uo_id>0)
		{
			$uo_id=$this->data['otpdtls'][0]->c;
			$this->data['otpdtls']=$this->Globalmodel->getdata_by_field_array('*','user_otp',array('uo_id'=>$uo_id),'uo_id', 'asc');			
			$otp=$this->data['otpdtls'][0]->uo_otp;		
			return $otp;
		}
		else
		{
			$otp=0;
			return $otp;
		}
		
	} 
	
	
	public function myProfile()
	{
		$this->load->view('complainant/register'); 
	}

	
	
    public function Dashboard()
	{
		$uc_id=$this->session->userdata('complainant_userdtls')[0]->uc_id;
        $this->data['complain']=$this->Globalmodel->getdata_by_field_array('*','user_complains',array('uc_userid'=>$uc_id),'uc_id', 'asc');
		$this->render_template('complainant/dashboard', $this->data);	 
    }

    public function ComplaintStatus()
    {
        $this->data['ps']=$this->Globalmodel->getdata_by_field_array('*','pstation',array(),'ps_id', 'asc');
		$this->render_template('complainant/complain', $this->data);	 
    }
	public function RegisterAComplaint()
	{	
		$this->data['ps']=$this->Globalmodel->getdata_by_field_array('*','pstation',array(),'ps_id', 'asc');
		$this->render_template('complainant/complain', $this->data);	 
	}		
	 
	public function isExistUser($mobile)
	{
		$this->data['user']=$this->Globalmodel->getdata_by_field_array('*','user_complainant',array('uc_mobileno'=>$mobile),'uc_id', 'asc');	
		if(count($this->data['user'])>0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	public function save()
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
			$c_name=trim($this->input->post('c_name'));			
			$c_emailid=trim($this->input->post('c_emailid'));			
			$c_mobileno=trim($this->input->post('c_mobileno'));			
			$c_otp=trim($this->input->post('c_otp'));			
			$c_password=trim($this->input->post('c_password'));			
			$c_confirm_password=trim($this->input->post('c_confirm_password'));			

			$otp=$this->fetchOTP($c_mobileno);
 			//echo '<pre>';
			//echo $otp.'-'.$c_otp;
			
			if($this->isExistUser($c_mobileno))
			{
				$this->session->set_flashdata('errmsg','User Already Exists..!!');	
				redirect('Complainant/Register');
				die;
			}

			if($c_password==$c_confirm_password)
			{
				if($otp==$c_otp)
				{
					$data=array(
						'uc_name'=>$c_name,                            
						'uc_emailid'=>$c_emailid,                            
						'uc_mobileno'=>$c_mobileno,                            						                          				
						'uc_password'=>$c_password,  						
						'uc_datetime'=>date('Y-m-d H:i'), 
						'uc_flag'=>1, 
						'uc_ip'=>$this->input->ip_address()
					);
					//print_r($data);
					$this->Globalmodel->savedata('user_complainant',$data);

					//SMS to User//					
					$fields = array(
						"sender_id" => "TXTIND",
						"message" => "You Are Registered in Abhijog ,Anti Bank Fraud Section , Kolkata Police, Your Mobile No : ".$c_mobileno." and  Password : ".$c_password,
						"route" => "v3",
						"numbers" => $c_mobileno,
					);

					$curl = curl_init();

					curl_setopt_array($curl, array(
					CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_SSL_VERIFYHOST => 0,
					CURLOPT_SSL_VERIFYPEER => 0,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode($fields),
					CURLOPT_HTTPHEADER => array(
						"authorization: eabfEBj0MYrG7hDC1QL4OTokuyp2znvxX3smARl8WqtKi9JPZImDEhgF61USy9ZbuPJt72dpL3qxrARB",
						"accept: */*",
						"cache-control: no-cache",
						"content-type: application/json"
					),
					));
					$response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);

					if ($err) 
					{
						echo "cURL Error #:" . $err;
					} 
					//SMS to User

					$this->session->set_flashdata('successmsg','You Are Successfully Registered to Abhijog, Please Login To Continue');	
					redirect('ComplainantLogin');
				}
				else
				{
					$this->session->set_flashdata('errmsg','OTP is Not Matched.. !!');	
					redirect('Complainant/Register');
				}
			}
			else
			{
				$this->session->set_flashdata('errmsg','Password and Confirm Password Not Matched.. !!');	
				redirect('Complainant/Register');
			}			
        }
        else
        {
			$this->session->set_flashdata('errmsg','Recaptcha is Not Valid');	
			redirect('Complainant/Register');
        }   
		   
	}
	public function saveComplain()
	{
        $data=array(                   
            'uc_name'=>$this->input->post('c_name'), 
            'uc_address'=>$this->input->post('c_address'),
            'uc_ps'=>$this->input->post('c_ps'),
            'uc_pincode'=>$this->input->post('c_pincode'),
            'uc_mobile'=>$this->input->post('c_mobile'),
            'uc_emailid'=>$this->input->post('c_emailid'),
            'uc_dateofincident'=>date('Y-m-d',strtotime($this->input->post('c_dateofincident'))),                
            'uc_timeofincident'=>date('H:i',strtotime($this->input->post('c_timeofincident'))),   
			'uc_body'=>$this->input->post('c_body'),
            'uc_targetno'=>$this->input->post('c_targetno'),            
            'uc_datetime'=>date('Y-m-d H:i'), 
            'uc_flag'=>0, 
            'uc_userid'=>$this->session->userdata('complainant_userdtls')[0]->uc_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->savedata('user_complains',$data);

        $last_c_id=$this->Globalmodel->getlastid('user_complains','uc_id');
        $last_c_id=$last_c_id[0]->uc_id;
        $bd_c_id=$last_c_id;
        //print_r($last_mt_id[0]->c_id);

        $bd_name=$this->input->post('bd_name');
        $bd_ifsc=$this->input->post('bd_ifsc');
        $bd_acno=$this->input->post('bd_acno');
        $bd_cardtype=$this->input->post('bd_cardtype');
        $bd_cardno=$this->input->post('bd_cardno');
        $bd_amount=$this->input->post('bd_amount');
        $bd_transaction_ref=$this->input->post('bd_transaction_ref');        

        //print($this->input->post);
         /*delete data from accused table*/
         //$this->Globalmodel->deletedata('bank_details','bd_c_id',$cq_c_id);         
         /*delete data from accused table*/         
        for($i=0;$i<count($bd_name);$i++)
        {
            $data2=array(
                'ubd_c_id'=>$bd_c_id,                                            
                'ubd_name'=>$bd_name[$i],         
                'ubd_ifsc'=>$bd_ifsc[$i],         
                'ubd_acno'=>$bd_acno[$i],         
                'ubd_cardtype'=>$bd_cardtype[$i],         
                'ubd_cardno'=>$bd_cardno[$i],         
                'ubd_amount'=>$bd_amount[$i],         
                'ubd_transaction_ref'=>$bd_transaction_ref[$i],         
                'ubd_datetime'=>date('Y-m-d H:i'), 
                'ubd_flag'=>1, 
                'ubd_userid'=>$this->session->userdata('complainant_userdtls')[0]->uc_id
            );
            //print_r($data2);
            $this->Globalmodel->savedata('user_bank_details',$data2);
        }
        
        $this->session->set_flashdata('successmsg','Complaint Successfully Registered');
        redirect('Complainant/Dashboard');        
    } 
	
}
