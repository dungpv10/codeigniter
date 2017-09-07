<?php

class Base_model extends CI_Model
{
    public $_baseUrl;

    public $_table;

    public $_config;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
    }


    private function initPaginate()
    {
        $this->load->library(array('pagination'));
        $this->_config = array(
            'base_url' => $this->_baseUrl,
            'total_rows' => $this->count(),
            'per_page' => 10,
            'use_page_numbers' => true
        );
        $this->pagination->initialize($this->_config);
    }

    public function paginate()
    {
        $this->initPaginate();
        $start = $this->uri->segment(3);
        return $this->db->get($this->_table, $this->_config['per_page'], $start * $this->_config['per_page'])->result();
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }

}
