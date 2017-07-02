<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
	public function _remap($method = '', $args = array()) {
		if (is_numeric($method) OR $method == 'id') {
			return call_user_func_array(array($this, 'author_id'), array($method));
		} else if ($method == 'name') {
			return call_user_func_array(array($this, 'name'), $args);
		} else {
			show_404();
		}
	}
	
	public function author_id($id) {
		echo '查找作者id号'.$id;
	}
	
	public function name($author_name, $langId) {
		echo '//TODO: 需要处理查找在 langId = '.$langId.'下的用户名为'.$author_name.'的用户';
	}
}
?>