<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {	
	public function _remap($method = '', $args = array())
	{
		if (is_numeric($method))
		{
			return call_user_func_array(array($this, 'id'), array($method));
		}
		elseif ($method == 'index')
		{
			echo '没有参数，应该要加载默认的视图并进行显示';
		}
		else
		{
			return call_user_func_array(array($this, 'name'), array($method));
		}
	}
	
	public function id($tag_id)
	{
		echo '准备输入'.$tag_id;
		return;
		//on error, display 404 error;
		show_404();
	}
	
	public function name($tag_name)
	{
		//on error, display 404 error;
		echo '准备输入'.$tag_name.'进行查找';
		return;
		show_404();
	}
}
