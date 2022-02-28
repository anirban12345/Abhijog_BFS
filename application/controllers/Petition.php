
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petition extends Admin_Controller 
{
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');        
        $this->load->model('Usermodel');
        $this->load->model('Petitionmodel');
    }
	
	public function index()
	{	
        /*
        $sessdata=$this->session->userdata('userdtls');	  
		echo '<pre>';
		print_r($this->data);
        print_r($sessdata);
        */
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array());
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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
		$this->render_template('petition/index', $this->data);
    }    

    public function create()
	{
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	               
        $this->render_template('petition/create', $this->data);        
    }

    public function edit()
	{
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_id'=>$p_id));
        $this->data['bankdtls']=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$p_id),'bd_id', 'asc');    
        //echo '<pre>';
        //print_r($this->data['mail']);
        $this->render_template('petition/edit', $this->data);
    }    

    public function search()
	{	    
		$this->render_template('petition/search', $this->data);
    }    

    public function deletePetition()
	{
        $id=rawurldecode($this->encrypt->decode($_GET['q']));	
		$this->Globalmodel->deletedata('petitions','p_id',$id);
		$this->session->set_flashdata('delmsg','Petition Successfully Deleted');
		redirect('Petition/search');
    }      

    public function searchPetition()
	{
        $date1=date('Y-m-d',strtotime($this->input->post('date1')));
        $date2=date('Y-m-d',strtotime($this->input->post('date2')));
        $this->data['date1']=$date1;
        $this->data['date2']=$date2;
        //echo $date1;
        //echo $date2;
        $this->data['petition']=$this->Petitionmodel->get_all_petition_between_date($date1,$date2); 
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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
        $this->render_template('petition/search_dtls', $this->data);
    }
    
    public function todaysPetition()
	{
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_datefrom'=>date('Y-m-d'))); 
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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
        $this->render_template('petition/search_dtls', $this->data);
    }

    public function yesterdaysPetition()
	{
        $yesterday=date('Y-m-d', strtotime('-1 day'));
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_datefrom'=>$yesterday));  
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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
        $this->render_template('petition/search_dtls', $this->data);
    }    

    public function disposedPetition()
	{
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_disposed'=>'Yes')); 
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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
        $this->render_template('petition/search_dtls', $this->data);
    }  

    public function pendingPetition()
	{
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_disposed'=>'No'));  
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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
        $this->render_template('petition/search_dtls', $this->data);
    }  

    public function enquiry()
	{
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_id'=>$p_id));         
        $this->data['enquiry']=$this->Globalmodel->getdata_by_field_array('*','petition_enquiry',array('pq_p_id'=>$p_id),'pq_id', 'asc');	                   
        $this->data['enquiry_nodes']=$this->Globalmodel->getdata_by_field_array('*','petitions',array('p_id'=>$p_id),'p_id', 'asc');
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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

        $this->render_template('petition/enquiry', $this->data);
    }    
    public function refund()
	{
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['dc']=$this->Globalmodel->getdata_by_field_array('*','duty_constable',array('dc_flag'=>'1'),'dc_id', 'asc');	                       
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_id'=>$p_id));                 
        $this->data['enquiry']=$this->Globalmodel->getdata_by_field_array('*','petition_enquiry',array('pq_p_id'=>$p_id),'pq_id', 'asc');	                   
        $this->data['bankdtls']=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$p_id),'bd_id', 'asc');	                   
        
        //echo '<pre>';
        //print_r($this->data['bankdtls']);
        foreach($this->data['petition'] as $r)
        {
            $bankdtls=$this->Globalmodel->getdata_by_field_array('*','petition_bank_details',array('bd_p_id'=>$r->p_id),'bd_id','asc');           
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

        $this->render_template('petition/refund', $this->data);
    }
    public function saveEnquiry()
	{
        $pq_p_id=$this->input->post('pq_p_id');
        $pq_date=$this->input->post('pq_date');
        $pq_time=$this->input->post('pq_time');
        $pq_enquiry=$this->input->post('pq_enquiry');

        //print($this->input->post);
         /*delete data from accused table*/
         $this->Globalmodel->deletedata('petition_enquiry','pq_p_id',$pq_p_id);         
         /*delete data from accused table*/         
        for($i=0;$i<count($pq_enquiry);$i++)
        {
            $data=array(
                'pq_p_id'=>$pq_p_id,                            
                'pq_date'=>date('Y-m-d',strtotime($pq_date[$i])),  
                'pq_time'=>date('H:i',strtotime($pq_time[$i])),  
                'pq_enquiry'=>$pq_enquiry[$i],                                                            
                'pq_datetime'=>date('Y-m-d H:i'), 
                'pq_flag'=>1, 
                'pq_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //print_r($data);
            $this->Globalmodel->savedata('petition_enquiry',$data);
        }
        $this->session->set_flashdata('successmsg','Case Successfully Saved');	
        redirect('Petition/enquiry?q='.urlencode($this->encrypt->encode($pq_p_id)));
    }

    public function saveRefund()
	{   
        $bd_p_id=$this->input->post('bd_p_id');                 //array       
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
                'bd_p_id'=>$bd_p_id[$i],                                            
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
            $this->Globalmodel->updatedata('petition_bank_details','bd_id',$bd_id[$i],$data);
        }
        $this->session->set_flashdata('successmsg','Refund Successfully Saved');	
        redirect('Petition/refund?q='.urlencode($this->encrypt->encode($bd_p_id[0])));        
    }

    public function savePetition()
	{
        /*
        p_type
        p_ref_no
        p_name
        p_address
        p_ps
        p_pincode
        p_mobile
        p_emailid
        p_datefrom
        p_dateto
        p_offence
        p_do_id
        p_status
        p_disposed
        p_disposed_status
        p_datetime
        p_flag
        p_userid
        */
        $data=array(            
            'p_type'=>$this->input->post('p_type'),
            'p_ref_no'=>$this->input->post('p_ref_no'),
            'p_date'=>date('Y-m-d',strtotime($this->input->post('p_date'))),            
            'p_name'=>$this->input->post('p_name'), 
            'p_address'=>$this->input->post('p_address'),  
            'p_ps'=>$this->input->post('p_ps'),  
            'p_pincode'=>$this->input->post('p_pincode'),  
            'p_mobile'=>$this->input->post('p_mobile'),
            'p_emailid'=>$this->input->post('p_emailid'),
            'p_datefrom'=>date('Y-m-d',strtotime($this->input->post('p_datefrom'))),            
            'p_dateto'=>date('Y-m-d',strtotime($this->input->post('p_dateto'))),                        
            'p_offence'=>$this->input->post('p_offence'),
            'p_do_id'=>$this->input->post('p_do_id'),                  
            'p_status'=>$this->input->post('p_status'), 
            'p_disposed'=>$this->input->post('p_disposed'), 
            'p_disposed_status'=>$this->input->post('p_disposed_status'), 
            'p_datetime'=>date('Y-m-d H:i'), 
            'p_flag'=>1, 
            'p_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->savedata('petitions',$data);
        $this->session->set_flashdata('successmsg','Petition Successfully Saved');        
        $last_p_id=$this->Globalmodel->getlastid('petitions','p_id');
        $last_p_id=$last_p_id[0]->p_id;
        //print_r($last_p_id[0]->p_id);
        $bd_p_id=$last_p_id;

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
                'bd_p_id'=>$bd_p_id,                                            
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
            $this->Globalmodel->savedata('petition_bank_details',$data2);
        }

        redirect('Petition/enquiry?q='.urlencode($this->encrypt->encode($last_p_id)));        
    }  

    public function updatePetition()
	{
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));		
        $data=array(            
            'p_type'=>$this->input->post('p_type'),
            'p_ref_no'=>$this->input->post('p_ref_no'),
            'p_date'=>date('Y-m-d',strtotime($this->input->post('p_date'))),            
            'p_name'=>$this->input->post('p_name'), 
            'p_address'=>$this->input->post('p_address'),  
            'p_ps'=>$this->input->post('p_ps'),  
            'p_pincode'=>$this->input->post('p_pincode'),  
            'p_mobile'=>$this->input->post('p_mobile'),
            'p_emailid'=>$this->input->post('p_emailid'),
            'p_datefrom'=>date('Y-m-d',strtotime($this->input->post('p_datefrom'))),            
            'p_dateto'=>date('Y-m-d',strtotime($this->input->post('p_dateto'))),                        
            'p_offence'=>$this->input->post('p_offence'),
            'p_do_id'=>$this->input->post('p_do_id'),                  
            'p_status'=>$this->input->post('p_status'), 
            'p_disposed'=>$this->input->post('p_disposed'), 
            'p_disposed_status'=>$this->input->post('p_disposed_status'), 
            'p_datetime'=>date('Y-m-d H:i'), 
            'p_flag'=>1, 
            'p_userid'=>$this->session->userdata('userdtls')[0]->u_id
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->updatedata('petitions','p_id',$p_id,$data);

        /*delete data from accused table*/
        //$this->Globalmodel->deletedata('petition_bank_details','bd_p_id',$p_id);         
        /*delete data from accused table*/
          
        $bd_id=$this->input->post('bd_id');
        $bd_name=$this->input->post('bd_name');
        $bd_ifsc=$this->input->post('bd_ifsc');
        $bd_acno=$this->input->post('bd_acno');
        $bd_cardtype=$this->input->post('bd_cardtype');
        $bd_cardno=$this->input->post('bd_cardno');
        $bd_amount=$this->input->post('bd_amount');
        $bd_transaction_ref=$this->input->post('bd_transaction_ref');  

        for($i=0;$i<count($bd_name);$i++)
        {
            $data2=array(
                'bd_p_id'=>$p_id,                                            
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
            //echo '<pre>';
            //print_r($data2);

            if($bd_id[$i]!="")
            {
                $this->Globalmodel->updatedata('petition_bank_details','bd_id',$bd_id[$i],$data2);            
            }
            else 
            {
                //echo "save";
                //print_r($data2);
                //echo $bd_id[$i];
                $this->Globalmodel->savedata('petition_bank_details',$data2); 
            }   
        }
        $this->session->set_flashdata('successmsg','Petition Successfully Updated');	        
        redirect('Petition/enquiry?q='.urlencode($this->encrypt->encode($p_id)));
    }  

    public function printPetition()
    {
		$this->load->library('pdf');
        $pdf = $this->pdf->load();
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));
        $this->data['do']=$this->Globalmodel->getdata_by_field_array('*','duty_officer',array('do_flag'=>'1'),'do_id', 'asc');	
        $this->data['petition']=$this->Petitionmodel->get_all_petition(array('p_id'=>$p_id));         
        $this->data['enquiry']=$this->Globalmodel->getdata_by_field_array('*','petition_enquiry',array('pq_p_id'=>$p_id),'pq_id', 'asc');	                   
        
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
			<title>Petition Enquiry Report.pdf</title>
		</head>
		<body>';
        /*        
        p_type
        p_ref_no
        p_name
        p_address
        p_ps
        p_pincode
        p_mobile
        p_emailid
        p_datefrom
        p_dateto
        p_offence
        p_do_id
        p_status
        p_disposed
        p_disposed_status
        */

		$html.='<h1>Anti-Bank Fraud Section Comaplain Register</h1>';
        $html.='<h3>Comaplain Details</h3>';
        $html.='<table id="file_export" class="table table-bordered" >
                                                    <thead>
                                                        <tr class="bg-4798e8 text-white">                                                            
                                                            <th>Ref no</th>
                                                            <th>Name</th>
                                                            <th>Address</th>
                                                            <th>Mobile</th>
                                                            <th>Date of Incident</th>
                                                            <th>Offecnce Noted</th>
                                                            <th>Status</th>        
                                                            <th>DO Name</th>                                                                                                 
                                                            <th>Disposed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                        $i=1; foreach($this->data['petition'] as $r) { 
                                                            $html.='<tr class="alert-primary">                                                                    
                                                                <td>'.$r->p_ref_no.'</td>
                                                                <td>'.$r->p_name.'</td>
                                                                <td>'.$r->p_address.'</td>
                                                                <td>'.$r->p_mobile.'</td>
                                                                <td>'.date("d-M-Y",strtotime($r->p_dateofincident)).'</td>                                                                
                                                                <td>'.$r->p_offence.'</td>                                                                
                                                                <td>'.$r->p_status.'</td>  
                                                                <td>'.$r->do_name.'</td>             
                                                                <td>'.$r->p_disposed.'</td>                                        
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
                                                                <td>'.date('d-M-Y',strtotime($r->pq_date)).'</td>
                                                                <td>'.date('H:i',strtotime($r->pq_time)).'</td>
                                                                <td>'.$r->pq_enquiry.'</td>
                                                            </tr>';
                                                         }
                                                $html.='  </tbody>       
                                                </table>';


        $html.='</body></html>';		
		$pdf->AddPage('L');
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'Petition Report' . date('Y_m_d_H_i_s') . '_.pdf';        
        $pdf->Output("$output", 'I'); // save to file because we can
        exit();
    }

    

}   


