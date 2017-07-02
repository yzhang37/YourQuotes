<?php
class Langres_model extends CI_Model
{
	public $langId = 'en-us';
	public function __construct()
	{
		$this->langId = 'en-us'; //default language for all pages
		$this->load->database();
		parent::__construct();
	}
	
	public function set_default_langid($lang)
	{
		$this->langId = $lang;
	}
	
	public function load_resd($res_id, $lang = '')
	{
		if ( empty($lang) )
		{
			$lang = $this->langId;
		}
		$this->db->select(array('rid', 'langid', 'type', 'text'));
		$where_param = array('rid =' => $res_id, 'langid =' => $lang);
		$this->db->where($where_param);
		$query = $this->db->get('resource');
		
		if ( $query->num_rows() == 1) {
			$row = $query->first_row();
			return $row->text;
		} else {
			return 'res_'.$res_id.'['.$lang.']';
		}
	}
}
