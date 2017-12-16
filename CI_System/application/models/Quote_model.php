<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quote_model extends CI_Model {
	public function __consturct() {
		$this->load->database();
		$this->load->model('langres_model');
		//TODO: 这一行命令很快应该要删除.
		$this->langres_model->set_default_langid('zh-cn');
		parent::__construct();	
	}
	
	public function getTopRateAuthors($author_id, $count=10) {
		$param = array('author.id' => $author_id);
		return $this->getTopRate($count, $param);
	}
		
	public function getTopRate($count = 10, $where_args = array()) {
		$this->db->select(array(
		'quote.id as qid',
		'author.id as aid',
		'quote.content_rid',
		'author.name_rid as aname_rid',
		'author.rel_uid',
		'quote.rate'
		));
		$this->db->from('quote');
		$this->db->join('author', 'quote.author_aid = author.id');
		$this->db->where($where_args);
		$this->db->order_by('quote.rate', 'DESC');
		$this->db->limit($count);
		$query = $this->db->get();
		$data = array();
		foreach ($query->result() as $row)
		{
		    $line['qid'] = $row->qid;
		    $line['author_id'] = $row->aid;
		    $line['content'] = $this->langres_model->load_resd($row->content_rid);
		    $line['author'] = $this->langres_model->load_resd($row->aname_rid);
		    
		    //$line[''] = $row->rel_uid;
		    //$line['rate'] = $row->rate;
		    
		    //The following gets tags data
		    $this->db->select(
		    		array('tag.name_rid', 'qt.tag_tid', 'qt.taguser_uid', 'qt.rate', 'qt.tagging_date')
		    );
		    $this->db->from('quotes_tags as qt');
		    $this->db->join('tag', 'tag.tid = qt.tag_tid');
		    $this->db->where(array('quote_qid' => $row->qid));
			$tag_query = $this->db->get();
			$line['tags'] = array();
		    $line['tags_id'] = array();
			foreach ($tag_query->result() as $tag_row)
			{
				array_push($line['tags']	, $this->langres_model->load_resd($tag_row->name_rid));
				array_push($line['tags_id']	, $tag_row->tag_tid);
			}
		    array_push($data, $line);
		}
		return $data;
	}
}
