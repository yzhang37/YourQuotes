<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{	
		$this->load->helper('nav');
		$this->load->helper('url');
		$this->load->model('langres_model');
		
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('en-us');
		$tag_var = $this->langres_model->load_resource_default(1);
		
		$header_data['title']='langId: Title Text';
		$this->load->view('header', $header_data);
		
		$quote_content = array();
		for ($i = 0; $i < 5; ++$i) {
			$q_item['content'] = '人要坚强'.$i;
			$q_item['author'] = '坚强使者';
			$q_item['author_id'] = $i;
			$tags = array('善良', '积极', '向上');
			$tags_id = array(1, 2, 3);
			$q_item['tags'] = $tags;
			$q_item['tags_id'] = $tags_id;
			array_push($quote_content, $q_item);
		}
		$this->load->view('quote', array('tag_label' => $tag_var, 'quote_data' => $quote_content));
		
		$pagi_data['start'] = 1;
		$pagi_data['end'] = 120;
		$pagi_data['cur'] = $this->input->get('page');
		if ( empty($pagi_data['cur']))
			$pagi_data['cur'] = 1;
		$pagi_data['disp_count'] = 8;
		$pagi_data['dispnext'] = True;
		$pagi_data['base_path'] = site_url('');
		$this->load->view('pagination', $pagi_data);
		$this->load->view('footer');
	}
}
