<?php
class Complainmodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_all_complain($array)
	{
		$this->db->select('*');		
		$this->db->from('complains');
		$this->db->join('duty_officer','complains.c_do_id=duty_officer.do_id');	
		$this->db->join('duty_constable','complains.c_dc_id=duty_constable.dc_id');	
		$this->db->join('pstation','pstation.ps_id=complains.c_ps');	
		$this->db->where($array);
		$this->db->order_by('c_dateofincident','desc'); 									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_complain_between_date($date1,$date2)
	{
		$this->db->select('*');		
		$this->db->from('complains');
		$this->db->join('duty_officer','complains.c_do_id=duty_officer.do_id');	
		$this->db->join('duty_constable','complains.c_dc_id=duty_constable.dc_id');		
		$this->db->where('c_dateofincident>=',$date1);									
		$this->db->where('c_dateofincident<=',$date2);		
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_all_complain_status()
	{
		$this->db->select('c_dateofincident,count(c_dateofincident) as c_c');		
		$this->db->from('complains');
		$this->db->join('duty_officer','complains.c_do_id=duty_officer.do_id');
		$this->db->join('duty_constable','complains.c_dc_id=duty_constable.dc_id');					
		$this->db->group_by('c_dateofincident');		
		$this->query=$this->db->get();		
		return $this->query->result();  
	}
}

?>