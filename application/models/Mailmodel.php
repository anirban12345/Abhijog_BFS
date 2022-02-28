<?php
class Mailmodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_all_mail($array)
	{
		$this->db->select('*');		
		$this->db->from('mail_tracking');
		$this->db->join('duty_officer','mail_tracking.mt_do_id=duty_officer.do_id');		
		$this->db->where($array);
		$this->db->order_by('mt_date','desc'); 									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_mail_between_date($date1,$date2)
	{
		$this->db->select('*');		
		$this->db->from('mail_tracking');
		$this->db->join('duty_officer','mail_tracking.mt_do_id=duty_officer.do_id');		
		$this->db->where('mt_date>=',$date1);									
		$this->db->where('mt_date<=',$date2);		
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_complain_status()
	{
		$this->db->select('mt_date,count(mt_date) as c_c');		
		$this->db->from('mail_tracking');
		$this->db->join('duty_officer','mail_tracking.mt_do_id=duty_officer.do_id');				
		$this->db->group_by('mt_date');		
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_dipsose_pending_status()
	{
		$this->db->select('mt_disposed,count(mt_disposed) as c_c');		
		$this->db->from('mail_tracking');
		$this->db->join('duty_officer','mail_tracking.mt_do_id=duty_officer.do_id');				
		$this->db->group_by('mt_disposed');	
		$this->db->order_by('mt_disposed','desc'); 	
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

}

?>