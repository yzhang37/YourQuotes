<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{	
		$this->load->helper('quote');
		$this->load->helper('nav');
		$this->load->model('langres_model');
		
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('en-us');
		$tag_var = $this->langres_model->load_resource_default(1);
		
		$header_data['title']='123';
		$this->load->view('header', $header_data);
		
		$this->load->view('footer');
		proto_emit_quote('人要坚强', '坚强使者', $tag_var, '善良', '积极', '向上');
		proto_emit_quote('人要自信', '自信使者', $tag_var, '善良', '积极', '向上');
		proto_emit_quote('人要乐观', '乐观使者', $tag_var, '善良', '积极', '向上');
		proto_emit_quote('人要真诚', '真诚使者', $tag_var, '善良', '积极', '向上');
		emit_pagination(1,5,1,10, True);
	}
}
