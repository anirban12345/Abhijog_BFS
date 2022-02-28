
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complain extends Admin_Controller 
{
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');        
        $this->load->model('Usermodel');
        $this->load->model('Complainmodel');
        $this->load->model('Bankmodel');
    }
	
	public function index()
	{	
        /*
        $sessdata=$this->session->userdata('userdtls');	  
		echo '<pre>';
		print_r($this->data);
        print_r($sessdata);
        */
        $this->data['complain']=$this->Complainmodel->get_all_complain(array());        
        
        //$totalamt=0;
        //$refundamt=0;

        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }
        //echo '--<pre>';       
        //print_r($this->data);
		$this->render_template('complain/index', $this->data);
    }    

    public function create()
	{
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	               
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');
        $this->data['ps']=$this->Globalmodel->getdata_by_field_array('*','pstation',array(),'ps_id', 'asc');	
        //echo '<pre>';
        //print_r($this->data['ps']);
        $this->render_template('complain/create', $this->data);
    }

    public function edit()
	{
        $c_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');	               
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_id'=>$c_id));    
        $this->data['ps']=$this->Globalmodel->getdata_by_field_array('*','pstation',array(),'ps_id', 'asc');
        $this->data['bankdtls']=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$c_id),'bd_id', 'asc');
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }   	
        //echo '<pre>';
        //print_r($this->data['mail']);
        $this->render_template('complain/edit', $this->data);
    }    

    public function search()
	{	    
		$this->render_template('complain/search', $this->data);
    }    

    public function userComplain()
	{
		$this->data['complain']=$this->Globalmodel->getdata_by_field_array('*','user_complains',array('uc_flag'=>0),'uc_id', 'asc');
		$this->render_template('complain/user_complains', $this->data);	 
    }

    public function acceptComplain()
	{
        $uc_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');	               
        $this->data['ps']=$this->Globalmodel->getdata_by_field_array('*','pstation',array(),'ps_id', 'asc');
        $this->data['complain']=$this->Globalmodel->getdata_by_field_array('*','user_complains',array('uc_id'=>$uc_id,'uc_flag'=>0),'uc_id', 'asc');
        $this->data['bankdtls']=$this->Globalmodel->getdata_by_field_array('*','user_bank_details',array('ubd_c_id'=>$uc_id),'ubd_id', 'asc');          	
        //echo '<pre>';
        //print_r($this->data['mail']);
        $this->render_template('complain/accept_complains', $this->data);
    }

    public function deleteComplain()
	{
        $id=rawurldecode($this->encrypt->decode($_GET['q']));	
		$this->Globalmodel->deletedata('complains','c_id',$id);
		$this->session->set_flashdata('delmsg','complain Successfully Deleted');
		redirect('Complain/search');
    }      

    public function searchComplain()
	{
        $date1=date('Y-m-d',strtotime($this->input->post('date1')));
        $date2=date('Y-m-d',strtotime($this->input->post('date2')));
        $this->data['date1']=$date1;
        $this->data['date2']=$date2;
        //echo $date1;
        //echo $date2;
        $this->data['complain']=$this->Complainmodel->get_all_complain_between_date($date1,$date2); 
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }   
        $this->render_template('complain/search_dtls', $this->data);
    }
    
    public function todaysComplain()
	{
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_dateofincident'=>date('Y-m-d'))); 
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }   
        $this->render_template('complain/search_dtls', $this->data);
    }

    public function yesterdaysComplain()
	{
        $yesterday=date('Y-m-d', strtotime('-1 day'));
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_dateofincident'=>$yesterday)); 
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }   
        $this->render_template('complain/search_dtls', $this->data);
    }    

    public function disposedComplain()
	{
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_disposed'=>'Yes')); 
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }   
        $this->render_template('complain/search_dtls', $this->data);
    }  

    public function pendingComplain()
	{
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_disposed'=>'No'));
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }    
        $this->render_template('complain/search_dtls', $this->data);
    }  

    public function enquiry()
	{
        $c_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');	               
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_id'=>$c_id));
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }

        $this->data['enquiry']=$this->Globalmodel->getdata_by_field_array('*','complain_enquiry',array('cq_c_id'=>$c_id),'cq_id', 'asc');	                           
        $this->render_template('complain/enquiry', $this->data);
    }    

    public function refund()
	{
        $c_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');	                       
        $this->data['complain']=$this->Complainmodel->get_all_complain(array('c_id'=>$c_id));                 
        $this->data['enquiry']=$this->Globalmodel->getdata_by_field_array('*','complain_enquiry',array('cq_c_id'=>$c_id),'cq_id', 'asc');	                   
        $this->data['bankdtls']=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$c_id),'bd_id', 'asc');	                   
        foreach($this->data['complain'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','bank_details',array('bd_c_id'=>$r->c_id),'bd_id','asc');           
            $totalamt=0;
            $refundamt=0;
            foreach($bankdtls as $r1)
            {
                $totalamt+=$r1->bd_amount;
                $refundamt+=$r1->bd_refund_amt;
            }            
            $r->totalamt=$totalamt;
            $r->refundamt=$refundamt;
        }   
        //echo '<pre>';
        //print_r($this->data['bankdtls']);

        $this->render_template('complain/refund', $this->data);
    }

    public function saveEnquiry()
	{
        $cq_c_id=$this->input->post('cq_c_id');
        $cq_date=$this->input->post('cq_date');
        $cq_time=$this->input->post('cq_time');
        $cq_enquiry=$this->input->post('cq_enquiry');

        //print($this->input->post);
         /*delete data from accused table*/
         $this->Globalmodel->deletedata('complain_enquiry','cq_c_id',$cq_c_id);         
         /*delete data from accused table*/         
        for($i=0;$i<count($cq_enquiry);$i++)
        {
            $data=array(
                'cq_c_id'=>$cq_c_id,                            
                'cq_date'=>date('Y-m-d',strtotime($cq_date[$i])),  
                'cq_time'=>date('H:i',strtotime($cq_time[$i])),  
                'cq_enquiry'=>$cq_enquiry[$i],                                                            
                'cq_datetime'=>date('Y-m-d H:i'), 
                'cq_flag'=>1, 
                'cq_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //print_r($data);
            $this->Globalmodel->savedata('complain_enquiry',$data);
        }
        $this->session->set_flashdata('successmsg','Case Successfully Saved');	
        redirect('Complain/enquiry?q='.urlencode($this->encrypt->encode($cq_c_id)));
    }

    public function saveRefund()
	{   
        $bd_c_id=$this->input->post('bd_c_id');                 //array       
        $bd_id=$this->input->post('bd_id');                     //array        
        $bd_refund_date=$this->input->post('bd_refund_date');   //array
        $bd_refund_time=$this->input->post('bd_refund_time');   //array
        $bd_amount=$this->input->post('bd_amount');             //array
        $bd_refund_amt=$this->input->post('bd_refund_amt');     //array
        $bd_deficit_amt=$this->input->post('bd_deficit_amt');   //array
          
        /*delete data from accused table*/ 
        /*for($i=0;$i<count($br_c_id);$i++)
        {            
            $this->Globalmodel->deletedata('bank_refund','br_c_id',$br_c_id[$i]);                     
        }
        /*delete data from accused table*/ 

        for($i=0;$i<count($bd_id);$i++)
        {
            $data=array(
                'bd_c_id'=>$bd_c_id[$i],                                            
                'bd_refund_date'=>date('Y-m-d',strtotime($bd_refund_date[$i])),  
                'bd_refund_time'=>date('H:i',strtotime($bd_refund_time[$i])),  
                'bd_refund_amt'=>$bd_refund_amt[$i],   
                'bd_deficit_amt'=>$bd_amount[$i]-$bd_refund_amt[$i],   
                'bd_datetime'=>date('Y-m-d H:i'), 
                'bd_flag'=>1, 
                'bd_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //echo '<pre>';
            //print_r($data);
            //$this->Globalmodel->savedata('bank_refund',$data);
            $this->Globalmodel->updatedata('bank_details','bd_id',$bd_id[$i],$data);
        }
        $this->session->set_flashdata('successmsg','Refund Successfully Saved');	
        redirect('Complain/refund?q='.urlencode($this->encrypt->encode($bd_c_id[0])));        
    }

    public function saveComplain()
	{
        $data=array(       
            'c_type'=>$this->input->post('c_type'),     
            'c_docket_no'=>$this->input->post('c_docket_no'),
            'c_name'=>$this->input->post('c_name'), 
            'c_address'=>$this->input->post('c_address'),
            'c_ps'=>$this->input->post('c_ps'),
            'c_pincode'=>$this->input->post('c_pincode'),
            'c_mobile'=>$this->input->post('c_mobile'),
            'c_emailid'=>$this->input->post('c_emailid'),
            'c_dateofincident'=>date('Y-m-d',strtotime($this->input->post('c_dateofincident'))),                
            'c_timeofincident'=>date('H:i',strtotime($this->input->post('c_timeofincident'))),                        
            'c_targetno'=>$this->input->post('c_targetno'),
            'c_do_id'=>$this->input->post('c_do_id'),                  
            'c_dc_id'=>$this->input->post('c_dc_id'),                  
            'c_status'=>$this->input->post('c_status'),             

            'c_disposed'=>$this->input->post('c_disposed'),
            'c_disposed_status'=>$this->input->post('c_disposed_status'),

            'c_feedback'=>$this->input->post('c_feedback'),
            'c_feedbackdate'=>date('Y-m-d',strtotime($this->input->post('c_feedbackdate'))),

            'c_datetime'=>date('Y-m-d H:i'), 
            'c_flag'=>1, 
            'c_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->savedata('complains',$data);

        $last_c_id=$this->Globalmodel->getlastid('complains','c_id');
        $last_c_id=$last_c_id[0]->c_id;
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
                'bd_c_id'=>$bd_c_id,                                            
                'bd_name'=>$bd_name[$i],         
                'bd_ifsc'=>$bd_ifsc[$i],         
                'bd_acno'=>$bd_acno[$i],         
                'bd_cardtype'=>$bd_cardtype[$i],         
                'bd_cardno'=>$bd_cardno[$i],         
                'bd_amount'=>$bd_amount[$i],         
                'bd_transaction_ref'=>$bd_transaction_ref[$i],         
                'bd_datetime'=>date('Y-m-d H:i'), 
                'bd_flag'=>1, 
                'bd_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //print_r($data2);
            $this->Globalmodel->savedata('bank_details',$data2);
        }
        $this->session->set_flashdata('successmsg','Complain Successfully Saved');
        redirect('Complain/enquiry?q='.urlencode($this->encrypt->encode($last_c_id)));        
    }  

    
    public function saveAcceptComplain()
	{
        $data=array(       
            'c_type'=>$this->input->post('c_type'),     
            'c_docket_no'=>$this->input->post('c_docket_no'),
            'c_name'=>$this->input->post('c_name'), 
            'c_address'=>$this->input->post('c_address'),
            'c_ps'=>$this->input->post('c_ps'),
            'c_pincode'=>$this->input->post('c_pincode'),
            'c_mobile'=>$this->input->post('c_mobile'),
            'c_emailid'=>$this->input->post('c_emailid'),
            'c_dateofincident'=>date('Y-m-d',strtotime($this->input->post('c_dateofincident'))),                
            'c_timeofincident'=>date('H:i',strtotime($this->input->post('c_timeofincident'))),                        
            'c_targetno'=>$this->input->post('c_targetno'),
            'c_do_id'=>$this->input->post('c_do_id'),                  
            'c_dc_id'=>$this->input->post('c_dc_id'),                  
            'c_status'=>$this->input->post('c_status'), 
            'c_status_complainant'=>$this->input->post('c_status_complainant'), 

            'c_disposed'=>$this->input->post('c_disposed'),
            'c_disposed_status'=>$this->input->post('c_disposed_status'),

            'c_feedback'=>$this->input->post('c_feedback'),
            'c_feedbackdate'=>date('Y-m-d',strtotime($this->input->post('c_feedbackdate'))),

            'c_datetime'=>date('Y-m-d H:i'), 
            'c_flag'=>1, 
            'c_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->savedata('complains',$data);

        $last_c_id=$this->Globalmodel->getlastid('complains','c_id');
        $last_c_id=$last_c_id[0]->c_id;
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
                'bd_c_id'=>$bd_c_id,                                            
                'bd_name'=>$bd_name[$i],         
                'bd_ifsc'=>$bd_ifsc[$i],         
                'bd_acno'=>$bd_acno[$i],         
                'bd_cardtype'=>$bd_cardtype[$i],         
                'bd_cardno'=>$bd_cardno[$i],         
                'bd_amount'=>$bd_amount[$i],         
                'bd_transaction_ref'=>$bd_transaction_ref[$i],         
                'bd_datetime'=>date('Y-m-d H:i'), 
                'bd_flag'=>1, 
                'bd_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //print_r($data2);
            $this->Globalmodel->savedata('bank_details',$data2);
        }
        
        $uc_id=$this->input->post('uc_id');
        $data3=array(                               
            'uc_docketno'=>$this->input->post('c_docket_no'),
            'uc_status_complainant'=>$this->input->post('c_status_complainant'),
            'uc_flag'=>1 
        );
        $this->Globalmodel->updatedata('user_complains','uc_id',$uc_id,$data3);

        $this->session->set_flashdata('successmsg','Complain Successfully Saved');
        redirect('Complain/enquiry?q='.urlencode($this->encrypt->encode($last_c_id)));        
    }

    public function updateComplain()
	{
        $c_id=rawurldecode($this->encrypt->decode($_GET['q']));		
        $data=array(       
            'c_type'=>$this->input->post('c_type'),                 
            'c_name'=>$this->input->post('c_name'), 
            'c_address'=>$this->input->post('c_address'),
            'c_ps'=>$this->input->post('c_ps'),
            'c_pincode'=>$this->input->post('c_pincode'),
            'c_mobile'=>$this->input->post('c_mobile'),
            'c_emailid'=>$this->input->post('c_emailid'),
            'c_dateofincident'=>date('Y-m-d',strtotime($this->input->post('c_dateofincident'))),                
            'c_timeofincident'=>date('H:i',strtotime($this->input->post('c_timeofincident'))),            
            'c_targetno'=>$this->input->post('c_targetno'),
            'c_do_id'=>$this->input->post('c_do_id'),                  
            'c_dc_id'=>$this->input->post('c_dc_id'),                  
            'c_status'=>$this->input->post('c_status'), 
            'c_status_complainant'=>$this->input->post('c_status_complainant'), 

            'c_disposed'=>$this->input->post('c_disposed'),
            'c_disposed_status'=>$this->input->post('c_disposed_status'), 

            'c_feedback'=>$this->input->post('c_feedback'),
            'c_feedbackdate'=>date('Y-m-d',strtotime($this->input->post('c_feedbackdate'))),
            
            'c_datetime'=>date('Y-m-d H:i'), 
            'c_flag'=>1, 
            'c_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->updatedata('complains','c_id',$c_id,$data);

        /*delete data from accused table*/
        //$this->Globalmodel->deletedata('bank_details','bd_c_id',$c_id);         
        /*delete data from accused table*/
          
        $bd_id=$this->input->post('bd_id');
        $bd_name=$this->input->post('bd_name');
        $bd_ifsc=$this->input->post('bd_ifsc');
        $bd_acno=$this->input->post('bd_acno');
        $bd_cardtype=$this->input->post('bd_cardtype');
        $bd_cardno=$this->input->post('bd_cardno');
        $bd_amount=$this->input->post('bd_amount');
        $bd_transaction_ref=$this->input->post('bd_transaction_ref');  

        echo '<pre>';
        //print_r($bd_id);

        for($i=0;$i<count($bd_name);$i++)
        {
            $data2=array(
                'bd_c_id'=>$c_id,                                            
                'bd_name'=>$bd_name[$i],         
                'bd_ifsc'=>$bd_ifsc[$i],         
                'bd_acno'=>$bd_acno[$i],         
                'bd_cardtype'=>$bd_cardtype[$i],         
                'bd_cardno'=>$bd_cardno[$i],         
                'bd_amount'=>$bd_amount[$i],         
                'bd_transaction_ref'=>$bd_transaction_ref[$i],         
                'bd_datetime'=>date('Y-m-d H:i'), 
                'bd_flag'=>1, 
                'bd_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );

            if($bd_id[$i]!="")
            {
                //echo "update";
                //print_r($data2);
                //echo $bd_id[$i];
                $this->Globalmodel->updatedata('bank_details','bd_id',$bd_id[$i],$data2);            
            }
            else 
            {
                //echo "save";
                //print_r($data2);
                //echo $bd_id[$i];
                $this->Globalmodel->savedata('bank_details',$data2); 
            }            
            //print_r($data2);    
        }

        $c_docket_no=$this->input->post('c_docket_no');
        $data3=array(                                           
            'uc_status_complainant'=>$this->input->post('c_status_complainant')
        );
        $this->Globalmodel->updatedata('user_complains','uc_docketno',$c_docket_no,$data3);

        $this->session->set_flashdata('successmsg','Complain Successfully Updated');        
        redirect('Complain/enquiry?q='.urlencode($this->encrypt->encode($c_id)));
    }  

    public function printComplain()
    {
		$this->load->library('pdf');
        $pdf = $this->pdf->load();
        $c_id=rawurldecode($this->encrypt->decode($_GET['q']));
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');	               
        $this->data['mail']=$this->Complainmodel->get_all_complain(array('c_id'=>$c_id));         
        $this->data['enquiry']=$this->Globalmodel->getdata_by_field_array('*','complain_enquiry',array('cq_c_id'=>$c_id),'cq_id', 'asc');	                   
        
        ini_set('memory_limit', '256M'); 
        //boost the memory limit if it's low ;)
	     
	    $html='<html>
		<head>
			<style>
					table 
					{
                            width:100%;
							font-family: verdana;
							border: 1px solid #ccc;
							border-collapse: collapse;
					}
                    h1
                    {
                        font-family: verdana;
                        text-align:center;
                    }
                    h3
                    {
                        font-family: verdana;
                    }
					td,th 
					{
						padding: 5px;
						border: 1px solid #ccc;
						vertical-align: middle;
					}
			</style>
			<title>Complain Enquiry Report.pdf</title>
		</head>
		<body>';
        /*        
        c_id
        c_docket_no
        c_name
        c_address
        c_mobile
        c_dateofincident
        c_timeofincident
        c_bank_ac_no
        c_debitcard
        c_transaction_ref
        c_targetno
        c_do_id
        c_dc_id
        c_status
        c_disposed
        c_datetime
        c_flag
        c_userid
        */

		$html.='<h1>Anti-Bank Fraud Section Comaplain Register</h1>';
        $html.='<h3>Comaplain Details</h3>';
        $html.='<table id="file_export" class="table table-bordered" >
                                                    <thead>
                                                        <tr class="bg-4798e8 text-white">                                                            
                                                            <th>Docket No</th>
                                                            <th>Name</th>
                                                            <th>Address</th>
                                                            <th>Mobile</th>
                                                            <th>Date of Incident</th>
                                                            <th>Time of Incident</th>
                                                            <th>Bank A/c No</th>                                                            
                                                            <th>Debit Card</th>                                                           
                                                            <th>Transaction Ref</th> 
                                                            <th>Target No</th>                                                            
                                                            <th>DO Name</th>                                                            
                                                            <th>Status</th>                                                            
                                                            <th>Disposed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                        $i=1; foreach($this->data['mail'] as $r) { 
                                                            $html.='<tr class="alert-primary">                                                                    
                                                                <td>'.$r->c_docket_no.'</td>
                                                                <td>'.$r->c_name.'</td>
                                                                <td>'.$r->c_address.'</td>
                                                                <td>'.$r->c_mobile.'</td>
                                                                <td>'.date("d-M-Y",strtotime($r->c_dateofincident)).'</td>
                                                                <td>'.date("H:i",strtotime($r->c_timeofincident)).'</td>
                                                                <td>'.$r->c_bank_ac_no.'</td>
                                                                <td>'.$r->c_debitcard.'</td>
                                                                <td>'.$r->c_transaction_ref.'</td>
                                                                <td>'.$r->c_targetno.'</td>                                                                
                                                                <td>'.$r->do_name.'</td> 
                                                                <td>'.$r->dc_name.'</td> 
                                                                <td>'.$r->c_status.'</td>
                                                                <td>'.$r->c_disposed.'</td>                                        
                                                            </tr>';
                                                         }
                                                $html.='  </tbody>       
                                                </table>';
                                                
                                                $html.='<h3>Enquiry Details</h3>';
                                                $html.='<table id="file_export" class="table table-bordered" >
                                                    <thead>
                                                        <tr class="bg-4798e8 text-white">                                                            
                                                            <th>Date</th>
                                                            <th>Time</th>
                                                            <th>Enquiry Details</th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                        $i=1; foreach($this->data['enquiry'] as $r) { 
                                                            $html.='<tr class="alert-primary">                                                                    
                                                                <td>'.date('d-M-Y',strtotime($r->cq_date)).'</td>
                                                                <td>'.date('H:i',strtotime($r->cq_time)).'</td>
                                                                <td>'.$r->cq_enquiry.'</td>
                                                            </tr>';
                                                         }
                                                $html.='  </tbody>       
                                                </table>';


        $html.='</body></html>';		
		$pdf->AddPage('L');
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'Complain Report' . date('Y_m_d_H_i_s') . '_.pdf';        
        $pdf->Output("$output", 'I'); // save to file because we can
        exit();
    }

    

}   


