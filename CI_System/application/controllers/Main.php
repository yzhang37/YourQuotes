<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{	
		$this->load->helper('nav');
		$this->load->helper('url');
		$this->load->model('langres_model');
		$this->load->model('Quote_model');
		
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
			if ($i == 0) {
				$navbar_data['selected_item'] = $str;
			}
		}
		$navbar_data['nav_items'] = $navbar_item;
		$navbar_data['nav_itemurls'] = $navbar_itemurl;
		$navbar_data['search_ph'] = $this->langres_model->load_resd(12);
		$this->load->view('navbar', $navbar_data);
		
		//load quote contents		
		$quote_content = $this->Quote_model->getTopRate(10);
		$this->load->view('quote', 
			array('tag_label' => $this->langres_model->load_resd(1),
				  'quote_data' => $quote_content));
		
		//load pagination files
		$pagi_data['start'] = 1;
		$pagi_data['end'] = 20;
		$pagi_data['cur'] = $this->input->get('page');
		if ( empty($pagi_data['cur']))
			$pagi_data['cur'] = 1;
		$pagi_data['disp_count'] = 8;
		$pagi_data['dispnext'] = True;
		$pagi_data['base_path'] = site_url('');
		$pagi_data['next_page'] = $this->langres_model->load_resd(10);
		$pagi_data['prev_page'] = $this->langres_model->load_resd(11);
		$this->load->view('pagination', $pagi_data);
		$this->load->view('footer');
	}
}
