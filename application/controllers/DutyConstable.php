<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DutyConstable extends Admin_Controller 
{
	public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');			
    }
	
	public function index()
	{	
		$this->render_template('dutyconstable/index', $this->data);
	}

	public function create()
	{
		$this->render_template('dutyconstable/create', $this->data);		
	}

	public function edit()
	{
		$dc_id=rawurldecode($this->encrypt->decode($_GET['q']));
		$this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_id'=>$dc_id),'dc_id', 'asc');	        
		$this->render_template('dutyconstable/edit', $this->data);		
	}

	public function saveDutyConstable()
	{
		$data=array(            
            'dc_designation'=>$this->input->post('dc_designation'),
            'dc_name'=>$this->input->post('dc_name'), 
            'dc_phoneno'=>$this->input->post('dc_phoneno'),              
            'dc_datetime'=>date('Y-m-d H:i'), 
            'dc_flag'=>1, 
            'dc_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->savedata('duty_constable',$data);
        $this->session->set_flashdata('successmsg','DutyConstable Successfully Updated');	
        redirect('DutyConstable');
	}

	public function updateDutyConstable()
	{
		$dc_id=rawurldecode($this->encrypt->decode($_GET['q']));
		$data=array(            
            'dc_designation'=>$this->input->post('dc_designation'),
            'dc_name'=>$this->input->post('dc_name'), 
            'dc_phoneno'=>$this->input->post('dc_phoneno'),              
            'dc_datetime'=>date('Y-m-d H:i'), 
            'dc_flag'=>1, 
            'dc_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);        
		$this->Globalmodel->updatedata('duty_constable','dc_id',$dc_id,$data);
        $this->session->set_flashdata('successmsg','Duty Officer Successfully Updated');	
        redirect('DutyConstable');
	}

	public function deleteDutyConstable()
	{
		$id=rawurldecode($this->encrypt->decode($_GET['q']));	
		$this->Globalmodel->deletedata('duty_constable','dc_id',$id);
		$this->session->set_flashdata('successmsg','Duty Officer  Successfully Deleted');
		redirect('DutyConstable');
	}

	public function getDutyConstable()
	{   
        $data = array();        
        $this->data['dc']=$this->Globalmodel->getdata('*','duty_constable','dc_id','asc'); 
        $dc=$this->data['dc'];
        $i=1;
		foreach($dc as $r)
		{
            $sub_array = array();
            $sub_array[] = $i++;            
            $str='';     

			if(in_array('updatedo',$this->permission))
            { 
            $str.='&nbsp;<a role="button" href="'.base_url('DutyConstable/edit?q='.urlencode($this->encrypt->encode($r->dc_id))).'" class="btn waves-effect waves-light btn-primary btn-sm" title="Edit Duty Officer"><i class="fas fa-edit"></i></a>';                            
			}
			if(in_array('deletedo',$this->permission))
            { 
			$str.='&nbsp;<a role="button" href="'.base_url('DutyConstable/deleteDutyConstable?q='.urlencode($this->encrypt->encode($r->dc_id))).'" class="btn waves-effect waves-light btn-danger btn-sm"  title="Delete Duty Officer"><i class="fas fa-trash"></i> </a>';                            
			}
			if($r->dc_flag==1)	
			{
            	$str.='&nbsp;<a role="button" href="'.base_url('DutyConstable/activateDutyConstable?q='.urlencode($this->encrypt->encode($r->dc_id))).'" class="btn waves-effect waves-light btn-warning btn-sm"  title="Deactivate Duty Officer"><i class="fas fa-times"></i> </a>';                            
			}
			else
			{
				$str.='&nbsp;<a role="button" href="'.base_url('DutyConstable/activateDutyConstable?q='.urlencode($this->encrypt->encode($r->dc_id))).'" class="btn waves-effect waves-light btn-success btn-sm"  title="Activate Duty Officer"><i class="fas fa-check"></i> </a>';                            
			}
			$sub_array[] = $r->dc_designation;     
            $sub_array[] = $r->dc_name;   
            $sub_array[] = $r->dc_phoneno;                                 
            $sub_array[] = $str;
			$data[] = $sub_array;
		}
		$output = array(			
			"data"   =>  $data
		   );		   
		echo json_encode($output);
    }

	public function activateDutyConstable()
	{
		$id=rawurldecode($this->encrypt->decode($_GET['q']));	
		$this->Globalmodel->activate('duty_constable','dc_id',$id,'dc_flag');	
		$this->session->set_flashdata('successmsg','Duty Officer Successfully Updated');
		redirect('DutyConstable');
	}
}
