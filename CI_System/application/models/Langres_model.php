<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
			$this->db->select(array('rid', 'langid', 'type', 'text'));
			$where_param = array('rid =' => $res_id);
			$this->db->where($where_param);
			$query = $this->db->get('resource');
			
			if ( $query->num_rows() > 0) {
				$row = $query->first_row();
				return $row->text;
			} else {
				return 'res_'.$res_id.'['.$lang.']';
			}
		}
	}
	
	//TODO: 原型函数，直接查找是否存在对应的资源
	// 如果对应的资源找到，就返回 ID 号。否则就不查找。
	public function proto_search_res($key, $langId, $type) {
		
	}
	
	//TODO: 原型函数，查找空余的可用资源 ID 号。
	public function proto_get_free_res_ID() {
		
	}
	
	//TODO: 原型函数：直接插入一条记录。成功返回 True，失败返回 False
	public function proto_insert_res() {
		
	}
	
	//TODO: 创建函数，查找资源是否存在。如果不存在，那么插入返回数值。
	public function insert_resd() {
		
	}
}
