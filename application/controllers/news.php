<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index() {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug) {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create($slug = null) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if (isset($slug)) {
            $data['title'] = 'Edit a news item';
        } else {
            $data['title'] = 'Create a news item';
        }

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            if (isset($slug)) {
                $data['news_item'] = $this->news_model->get_news($slug);
                $this->load->view('news/create', $data);
            } else {
                $this->load->view('news/create');
            }
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

    public function delete($id) {
        $this->news_model->delete_news($id);
        $this->load->helper('url');
        $this->load->view('news/success');
    }

}
