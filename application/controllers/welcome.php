<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('captcha_model');
    }

    public function index() {
        $segment_active = $this->uri->segment(2);
        if ($segment_active != NULL) {
            $data['menu'] = $this->uri->segment(2);
        } else {
            $data['menu'] = 'home';
        }

        $data['content'] = $this->content_model->get_content($data['menu']);
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        $data['seo_links'] = $this->content_model->get_seo_links();
        foreach ($data['content'] as $row):

            $data['title'] = $row->title;
            $data['sidebox'] = $row->sidebox;
            $data['metatitle'] = $row->meta_title;
            $data['meta_description'] = $row->meta_desc;
             $data['meta_keywords'] = $row->meta_keywords;
        endforeach;
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

    function home() {

        $segment_active = $this->uri->segment(3);
        if ($segment_active != NULL) {
            $data['menu'] = $this->uri->segment(3);
        } else {
            $data['menu'] = $this->uri->segment(1);
        }

        $data['content'] = $this->content_model->get_content($data['menu']);
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        foreach ($data['content'] as $row):

            $data['title'] = $row->title;
            $data['sidebox'] = $row->sidebox;
            $data['metatitle'] = $row->meta_title;
            $data['meta_description'] = $row->meta_desc;
            $data['meta_keywords'] = $row->meta_keywords;

        endforeach;
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

        $data['content'] = $this->content_model->get_content($data['menu']);
        $data['captcha'] = $this->captcha_model->initiate_captcha();
        foreach ($data['content'] as $row):

            $data['title'] = $row->title;
            $data['sidebox'] = $row->sidebox;
            $data['metatitle'] = $row->meta_title;
            $data['meta_description'] = $row->meta_desc;
            $data['meta_keywords'] = $row->meta_keywords;

        endforeach;
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