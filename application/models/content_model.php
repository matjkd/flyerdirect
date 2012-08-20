<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Content_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_content($title) {

		$this->db->where('menu', $title);
		$query = $this->db->get('content');
		if ($query->num_rows == 1)
			; {
			return $query->result();
		}
	}

	function get_content_cat($cat) {

		$this->db->where('category', $cat);
		$this->db->order_by('date_added', 'desc');
		$query = $this->db->get('content');
		if ($query->num_rows > 0) {
			return $query->result();
		}
	}

	function get_seo_links() {
		$this->db->select('menu, title, content_id');
		$this->db->where('category', 'seo');
		$query = $this->db->get('content');
		if ($query->num_rows > 0)
			 {
			return $query->result();
		}
	}

	function get_content_id($id) {

		$this->db->where('content_id', $id);
		$query = $this->db->get('content');
		if ($query->num_rows == 1)
			 {
			return $query->result();
		}
	}

	function edit_content($id) {

		//check menu
		$now = time();
		$menu_link = $this->input->post('menu');
		$search = array(" ");
		$replace = "-";
		
		if ($menu_link == NULL) {
		
			$subject = $this->input->post('title');
			$menu_link = str_replace($search, $replace, $subject);
			 
		} else {
			$subject = $this->input->post('menu');
			$menu_link = str_replace($search, $replace, $subject);
		}
		
		$check_menu = $this->check_menu_duplicate($menu_link, $id);
		
		if($check_menu != TRUE) {
			$menu = $menu_link.$now;
		} else {
			$menu = $menu_link;
		}

		$content_update = array(
				'content' => $this->input->post('content'),
				'menu' => $menu,
				'title' => $this->input->post('title'),
				'added_by' => $this->input->post('added_by'),
				'extra' => $this->input->post('extra'),
				'meta_desc' => $this->input->post('meta_desc'),
				'meta_keywords' => $this->input->post('meta_keywords'),
				'meta_title' => $this->input->post('meta_title'),
				'sidebox' => $this->input->post('sidebox'),
				'top_bar' => $this->input->post('top_bar')
		);




		$this->db->where('content_id', $id);
		$update = $this->db->update('content', $content_update);
		return $update;
	}

	function get_all_content() {
		$query = $this->db->get('content');
		if ($query->num_rows > 0)
		{
			return $query->result();
		}
	}

	function get_all_products() {


		$query = $this->db->get('products');
		if ($query->num_rows > 0)
		{
			return $query->result();
		}
	}

	function get_all_news() {

		$this->db->where('content_type', 'news');
		$this->db->orderby('content_id', 'desc');
		$query = $this->db->get('content');
		if ($query->num_rows > 0)
			; {
			return $query->result();
		}
	}

	function get_news($id) {

		$this->db->where('menu', $id);
		$query = $this->db->get('content');
		if ($query->num_rows > 0)
		{
			return $query->result();
		}
	}

	function get_service_groups() {

		$query = $this->db->get('service_groups');
		if ($query->num_rows > 0)
			; {
			return $query->result();
		}
	}

	function get_services() {
		$query = $this->db->get('services');
		if ($query->num_rows > 0)
			; {
			return $query->result();
		}
	}

	function latest_news() {
		$this->db->where('content_type', 'news');
		$this->db->orderby('content_id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('content');
		if ($query->num_rows == 1)
			; {
			return $query->result();
		}
	}
	function list_recent_news($offset=0) {
		$data = array();
		//$this->db->where('page_type', 1);
		$this->db->where('category', 'news');
		 
		$this->db->order_by('date_added', 'DESC');
		$query = $this->db->get('content', 5, $offset);
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row)
				$data[] = $row;
		}
		$query->free_result();
	
		return $data;
	}

	function check_menu_duplicate($menu, $id =0) {
		$this->db->where('menu', $menu);
		$this->db->where_not_in('content_id', $id);
		$query = $this->db->get('content');
		if ($query->num_rows > 0)
		{
			return false;
		} else {
			return true;
		}
	}

	function add_content() {

		// build array for the model
		if($this->input->post('added_by') != NULL) {
			$name = $this->input->post('added_by');
		} else {
			$name = "" . $this->session->userdata('firstname') . " " . $this->session->userdata('lastname') . "";
		}
			
		if($this->input->post('date_added2') != NULL) {
			$datetime = $this->input->post('date_added2');
		} else {
			$now = time();
			$datetime = $now;
		}

		//check menu
		$now = time();
	 $menu_link = $this->input->post('menu');
	 $search = array(" ");
	 $replace = "-";
	 
	 if ($menu_link == NULL) {

	 	$subject = $this->input->post('title');
	 	$menu_link = str_replace($search, $replace, $subject);
	 	
	 } else {
	 	$subject = $this->input->post('menu');
	 	$menu_link = str_replace($search, $replace, $subject);
	 }
	 
	 $check_menu = $this->check_menu_duplicate($menu_link);
	 
	 if($check_menu != TRUE) {
	 	$menu = $menu_link.$now;
	 } else {
	 	$menu = $menu_link;
	 }
	 	

	 	


		$form_data = array(
				'title' => set_value('title'),
				'content' => $this->input->post('content'),
				'menu' => $menu,
				'category' => set_value('category'),
				'added_by' => $name,
				'date_added' => $datetime
		);
		$insert = $this->db->insert('content', $form_data);
		return $insert;
	}

}