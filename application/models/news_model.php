<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_news($slug = FALSE) {

        if (FALSE === $slug) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news() {
        $this->load->helper('url');


        $slug_old = $this->input->post('slug_old');
        if (isset($slug_old)) {
            $edit = true;
        }

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        if ($edit) {
            $this->db->where('slug', $slug_old);
            return $this->db->update('news', $data);
        } else {
            return $this->db->insert('news', $data);
        }
    }

    public function delete_news($slug) {
        $this->db->delete('news', array('slug' => $slug));
    }

}