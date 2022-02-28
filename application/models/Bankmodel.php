<?php
class Bankmodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_bank_details($array)
	{
		$this->db->select('*');		
		$this->db->from('bank_details');				
		$this->db->join('bank_refund','bank_details.bd_id=bank_refund.br_bd_id');	
		$this->db->where($array);
		//$this->db->order_by('br_id','desc'); 									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}
}

?>