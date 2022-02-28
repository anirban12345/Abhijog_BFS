<?php
class Petitionmodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_all_petition($array)
	{
		$this->db->select('*');		
		$this->db->from('petitions');
		$this->db->join('duty_officer','petitions.p_do_id=duty_officer.do_id');		
		$this->db->where($array);
		$this->db->order_by('p_datetime','desc'); 									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_petition_between_date($date1,$date2)
	{
		$this->db->select('*');		
		$this->db->from('petitions');
		$this->db->join('duty_officer','petitions.p_do_id=duty_officer.do_id');		
		$this->db->where('p_datefrom>=',$date1);									
		$this->db->where('p_datefrom<=',$date2);		
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_petition_status()
	{
		$this->db->select('p_dateofincident,count(p_dateofincident) as c_c');		
		$this->db->from('petitions');
		$this->db->join('duty_officer','petitions.p_do_id=duty_officer.do_id');				
		$this->db->group_by('p_dateofincident');		
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

}

?>