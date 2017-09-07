<?php

class Order_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();

        $this->_table = 'orders';
        $this->_baseUrl = 'http://codeigniter.dev/welcome/index';
    }

    public function delete($id){
        $this->db->delete($this->_table, array('id' => $id));
    }
}