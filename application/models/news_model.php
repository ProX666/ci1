<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     *
     * @param type $call_array
     * @return type
     */
    public function get_news($call_array = FALSE) {

        if (FALSE === $call_array) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', $call_array);
        return $query->row_array();
    }



    /**
     * DRY method for new or edit news items
     *
     * @return type
     */
    public function set_news($id = null) {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        if ($id) {
            // update
            $this->db->where('id', $id);
            return $this->db->update('news', $data);
        } else {
            // new
            return $this->db->insert('news', $data);
        }
    }

    public function delete_news($id) {
        $this->db->delete('news', array('id' => $id));
    }

}