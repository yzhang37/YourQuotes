<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function index() {
		$this->load->helper('nav');
		$this->load->model('langres_model');
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('zh-cn');
		
		$queryMethod = 'get';
		$qdata = array();
		//there exists some post data, so switched to post mode
		
		if (count($_POST) != 0) {
			$queryMethod = 'post';
			$qdata['type'] = $this->input->post('type');
			$qdata['author_id'] = $this->input->post('aid');
			$qdata['tag_id'] = $this->input->post('tid');
		} else {
			$qdata['type'] = $this->input->get('type');
			$qdata['author_id'] = $this->input->get('aid');
			$qdata['tag_id'] = $this->input->get('tid');
		}
		
		//判断运行模式为 get 或 post
		if ($queryMethod == 'get') {
			//load header files
			$header_data['title']=$this->langres_model->load_resd(20);
			$this->load->view('header', $header_data);
			
			//load navigate bar files
			$navbar_data['website_name'] = $header_data['title'];
			$navbar_item = array();
			$navbar_itemurl = array('/', '/tag', '/author', 'javascript: void(0);');
			for ($i = 0; $i < 4; ++$i) {
				$str = $this->langres_model->load_resd($i + 2);
				array_push($navbar_item, $str);
				if ($i == 3) {
					$navbar_data['selected_item'] = $str;
				}
			}
			$navbar_data['nav_items'] = $navbar_item;
			$navbar_data['nav_itemurls'] = $navbar_itemurl;
			$navbar_data['search_ph'] = $this->langres_model->load_resd(12);
			$this->load->view('navbar', $navbar_data);
		}
		
		$where_args = array();
		
		if (isset($qdata['author_id']))
			$where_args['author.id'] = $qdata['author_id'];
		//if (isset($qdata['tag_id']))
		//	$where_args['quotes_tags.tag_id'] = $qdata['tag_id'];
		
		$this->load->model('Quote_model');
		$quote_content = $this->Quote_model->getTopRateAuthor($where_args);
		$this->load->view('quote', 
			array('tag_label' => $this->langres_model->load_resd(1),
				  'quote_data' => $quote_content));
	}
}
