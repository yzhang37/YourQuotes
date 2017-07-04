<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Author_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		$this->load->model('langres_model');
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('zh-cn');
		parent::__construct();
	}
	public function getInfoById($id) {
		$this->db->select(array('*', 'YEAR(now()) - YEAR(birthdate) - CASE WHEN MONTH(now()) > MONTH(birthdate) THEN 0 WHEN MONTH(now()) < MONTH(birthdate) THEN 1 ELSE CASE WHEN DAY(now()) < DAY(birthdate) THEN 1 ELSE 0 END END as virtAge'));
		$where_param = array('id =' => $id);
		$this->db->where($where_param);
		$query = $this->db->get('author');

		if ( $query->num_rows() != 0) {
			$row = $query->first_row();
			if ( ! empty($row->name_rid)) {
				$res['auth_name'] = $this->langres_model->load_resd($row->name_rid)	;
			}
			if ( ! empty($row->dspr_rid)) {
				$res['auth_dspr'] = $this->langres_model->load_resd($row->dspr_rid)	;
			}
			$key_s = array();
			$value_s = array();
			
			array_push($key_s, $this->langres_model->load_resd(15));
			if ( ! isset($row->sex)) {
				array_push($value_s, '');
			} else if ($row->sex == '1') {
				array_push($value_s, $this->langres_model->load_resd(17));
			} else {
				array_push($value_s, $this->langres_model->load_resd(18));
			}
			
			if ( isset($row->birthdate) && isset($row->deathdate)) {
				array_push($key_s, $this->langres_model->load_resd(19));
				array_push($value_s, $row->birthdate);
				array_push($key_s, $this->langres_model->load_resd(31));
				array_push($value_s, $row->deathdate);
			} else if ( ! isset($row->birthdate) && isset($row->deathdate)) {
				
			} else if ( isset($row->birthdate) && ! isset($row->deathdate)) {
				array_push($key_s, $this->langres_model->load_resd(19));
				array_push($value_s, $row->birthdate);
				array_push($key_s, $this->langres_model->load_resd(32));
				array_push($value_s, $row->virtAge);
			}
			
			$res['key_data'] = $key_s;
			$res['value_data'] = $value_s;	
			return $res;
		} else {
			return array();
		}
	}
}