<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tag_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
		$this->load->model('langres_model');
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('zh-cn');
		parent::__construct();	
	}
	
	//This function need caller to handle null when wrong id is provided.
	public function getInfoById($tag_id) {
		$this->db->select();
		$this->db->from('tag');
		$this->db->where(array('tid' => $tag_id));
		$query = $this->db->get();
		$row = $query->first_row();
		return $row;
	}
	
	public function listTopRated($top_count = 10) {
		$this->db->select();
		$this->db->from('tag');
		$this->db->order_by('rate DESC');
		$this->db->limit($top_count);
		$query = $this->db->get();
		
		$res = array();
		foreach ($query->result() as $row)
		{
			$item['tid'] = $row->tid;
			$item['rid'] = $row->name_rid;
			array_push($res, $item);
		}
		return $res;
	}
}
