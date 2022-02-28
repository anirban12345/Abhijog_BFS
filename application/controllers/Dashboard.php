<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
{
	public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');			
    }
	
	public function index()
	{	
		/*$sessdata=$this->session->userdata('userdtls');	  
		echo '<pre>';
		print_r($this->data);
		print_r($sessdata);		
		*/		
		//print_r($user_permission);
		//print_r($this->data['user_permission']);			
		$this->load->model('Usermodel');	
		//print_r(date('Y-m-d', strtotime('-1 day')));
		$yesterday=date('Y-m-d', strtotime('-1 day'));
		
		$this->data['complain']=$this->Globalmodel->getdata('*','complains','c_id','asc'); 		
		$this->data['do']=$this->Globalmodel->getdata('*','duty_officer','do_id','asc');		
		$this->data['dc']=$this->Globalmodel->getdata('*','duty_constable','dc_id','asc');		
		$this->data['todays']=$this->Globalmodel->getdata_by_field_array('*','complains',array('c_dateofincident'=>date('Y-m-d')),'c_id', 'asc');
		$this->data['yesterday']=$this->Globalmodel->getdata_by_field_array('*','complains',array('c_dateofincident'=>$yesterday),'c_id', 'asc');		
		$this->data['disposed']=$this->Globalmodel->getdata_by_field_array('*','complains',array('c_disposed'=>'Yes'),'c_id', 'asc');
		$this->data['pending']=$this->Globalmodel->getdata_by_field_array('*','complains',array('c_disposed'=>'No'),'c_id', 'asc');

		$this->data['petition']=$this->Globalmodel->getdata('*','petitions','p_id','asc'); 
		$this->data['todaysP']=$this->Globalmodel->getdata_by_field_array('*','petitions',array('p_datefrom'=>date('Y-m-d')),'p_id', 'asc');
		$this->data['yesterdayP']=$this->Globalmodel->getdata_by_field_array('*','petitions',array('p_datefrom'=>$yesterday),'p_id', 'asc');		
		$this->data['disposedP']=$this->Globalmodel->getdata_by_field_array('*','petitions',array('p_disposed'=>'Yes'),'p_id', 'asc');
		$this->data['pendingP']=$this->Globalmodel->getdata_by_field_array('*','petitions',array('p_disposed'=>'No'),'p_id', 'asc');
		
		//print_r(date('Y-m-d'));
		//print_r($this->data['todays']);
		$this->data['users']=count($this->Usermodel->get_user(array()));
		$this->render_template('dashboard/dashboard', $this->data);		
	}	
}
