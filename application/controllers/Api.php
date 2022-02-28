
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends My_Controller 
{
	public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Mailmodel')			;
    }

    public function printComplainGraph()
    {   
        //echo '<pre>';
        $this->data['disposed']=$this->Mailmodel->get_all_complain_status(array());
        //print_r($this->data['disposed']);
        print_r(json_encode($this->data['disposed']));                
    }   
    public function printDisposePendingGraph()
    {   
        //echo '<pre>';
        $this->data['disposed']=$this->Mailmodel->get_all_dipsose_pending_status(array());
        //print_r($this->data['disposed']);
        print_r(json_encode($this->data['disposed']));                
    }  
}   


