<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {	
	public function _remap($method = '', $args = array())
	{	
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
			if ($i == 1) {
				$navbar_data['selected_item'] = $str;
			}
		}
		$navbar_data['nav_items'] = $navbar_item;
		$navbar_data['nav_itemurls'] = $navbar_itemurl;
		$navbar_data['search_ph'] = $this->langres_model->load_resd(12);
		$this->load->view('navbar', $navbar_data);
		
		if (is_numeric($method)) {
			return call_user_func_array(array($this, 'id'), array($method));
		} elseif ($method == 'index') {
			return call_user_func_array(array($this, 'index'), $args);
		} else {
			return call_user_func_array(array($this, 'name'), array($method));
		}
	}
	
	public function index() {
		$tag_mainpage_data['need'] = $this->langres_model->load_resd(21);
		$tag_mainpage_data['doWhat'] = $this->langres_model->load_resd(22);
		$this->load->view('tag_mainpage', $tag_mainpage_data);
	}
	
	public function id($tag_id)
	{
		
		
	}
	
	public function name($tag_name)
	{
		//on error, display 404 error;
		echo '准备输入'.$tag_name.'进行查找';
		return;
		show_404();
	}
}
