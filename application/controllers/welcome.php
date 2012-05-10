<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('captcha_model');
        $this->load->helper('xml');
    }

    public function index() {
        $segment_active = $this->uri->segment(2);
        if ($segment_active != NULL) {
            $data['menu'] = $this->uri->segment(2);
        } else {
            $data['menu'] = 'home';
        }

        $this->get_content_data($data['menu']);
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        $data['seo_links'] = $this->content_model->get_seo_links();

        $data['sidebar'] = "sidebox/side";
        $data['main_content'] = "global/" . $this->config_theme . "/content";
        $data['cats'] = $this->products_model->get_cats();
        $data['products'] = $this->products_model->get_all_products();
        $data['section2'] = 'global/links';
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['slideshow'] = 'header/slideshow';
        $this->load->vars($data);
        $this->load->view('template/main');
    }

    function test() {
        $data['main_content'] = 'slideshow/slideshow';
        $this->load->vars($data);
        $this->load->view('template/main');
    }

    function get_content_data($menu) {
        $data['content'] = $this->content_model->get_content($menu);
        foreach ($data['content'] as $row):

            $data['title'] = $row->title;
            $data['sidebox'] = $row->sidebox;
            $data['metatitle'] = $row->meta_title;
            $data['topsection'] = $row->top_bar;
            $data['meta_keywords'] = $row->meta_keywords;
            $data['meta_description'] = $row->meta_desc;
            $data['slideshow'] = $row->slideshow;
            $data['mainsize'] = $row->mainsize;
            $data['rightsize'] = $row->rightsize;
            $data['date_added'] = $row->date_added;


        endforeach;
        
        //format the date
        $datestring = "%D %d%S of %M %Y";
        $time = $data['date_added'];
        
       $data['date_added']  = mdate($datestring, $time);
        
        
        $this->load->vars($data);
        return $data;
    }

    function home() {

        $segment_active = $this->uri->segment(3);
        if ($segment_active != NULL) {
            $data['menu'] = $this->uri->segment(3);
        } else {
            $data['menu'] = $this->uri->segment(1);
        }

        $this->get_content_data($data['menu']);
        if ($data['menu'] == 'news') {
        	$data['news'] = $this->content_model->get_content_cat('news');
        }

        $data['captcha'] = $this->captcha_model->initiate_captcha();

        $data['sidebar'] = "sidebox/side";
        $data['main_content'] = "global/" . $this->config_theme . "/content";
        //$data['cats'] = $this->products_model->get_cats();
        //$data['products'] = $this->products_model->get_all_products();
        $data['section2'] = 'global/links';
        $data['seo_links'] = $this->content_model->get_seo_links();
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['slideshow'] = 'header/slideshow';
        $this->load->vars($data);
        $this->load->view('template/main');
    }

    function main() {
        $segment_active = $this->uri->segment(3);
        if ($segment_active != NULL) {
            $data['menu'] = $this->uri->segment(3);
        } else {
            $data['menu'] = 'home';
        }

        $this->get_content_data($data['menu']);
        $data['captcha'] = $this->captcha_model->initiate_captcha();

        $data['main_content'] = "global/" . $this->config_theme . "/content";
        $data['cats'] = $this->products_model->get_cats();
        $data['products'] = $this->products_model->get_all_products();
        $data['section2'] = 'global/links';
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['slideshow'] = 'header/slideshow';
        $this->load->vars($data);
        $this->load->view('template/main');
    }
    
    function feed() {
    	$data['encoding'] = 'utf-8';
    	$data['feed_name'] = 'FlyerDirect';
    	$data['feed_url'] = 'http://www.flyerdirect.co.uk';
    	$data['page_description'] = 'Flyer Direct';
    	$data['page_language'] = 'en-ca';
    	$data['creator_email'] = 'info at flyerdirect dot co dot uk';
    	$data['posts'] = $this->content_model->list_recent_news();
    	header("Content-Type: application/rss+xml");
    	$this->load->view('global/rss', $data);
    }

    function login() {
        if ($this->session->flashdata('message')) {
            $data['message'] = $this->session->flashdata('message');
        }
        $id = 'login';
        $data['content'] = $this->content_model->get_content($id);
        $data['main_content'] = "user/login_form";
        $data['title'] = "Login to Eagle";

        $data['page'] = "login";
        $this->load->vars($data);
        $this->load->view('template/main');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */