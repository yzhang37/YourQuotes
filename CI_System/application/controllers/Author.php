<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
	public function _remap($method = '', $args = array()) {
		
		$this->load->helper('nav');
		$this->load->model('langres_model');
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('zh-cn');
		//load header files
		$header_data['title']=$this->langres_model->load_resd(20);
		$this->load->view('header', $header_data);
		
		//load navigate bar files
		$navbar_data['website_name'] = $header_data['title'];
		$navbar_item = array();
		$navbar_itemurl = array('/', '/tag', '/author');
		for ($i = 0; $i < 3; ++$i) {
			$str = $this->langres_model->load_resd($i + 2);
			array_push($navbar_item, $str);
			if ($i == 2) {
				$navbar_data['selected_item'] = $str;
			}
		}
		$navbar_data['nav_items'] = $navbar_item;
		$navbar_data['nav_itemurls'] = $navbar_itemurl;
		$navbar_data['search_ph'] = $this->langres_model->load_resd(12);
		$this->load->view('navbar', $navbar_data);
		
		if (is_numeric($method) OR $method == 'id') {
			return call_user_func_array(array($this, 'author_id'), array($method));
		} else if ($method == 'name') {
			return call_user_func_array(array($this, 'name'), $args);
		} else {
			return call_user_func_array(array($this, 'index'), $args);
		}
	}
	
	public function index() {
		
	}
	
	public function author_id($id) {
		$this->load->model('Author_model');
		$result = $this->Author_model->getInfoById($id);
		
		if (count($result) == 0) {
			echo '没有找到这个 id 对应的作者。';
		} else {
			$this->load->view('author_detail', $result);
		}
	}
	
	public function name($author_name, $langId) {
		echo '//TODO: 需要处理查找在 langId = '.$langId.'下的用户名为'.$author_name.'的用户';
	}
}
?>