<?php

abstract class Transform
{
    private $config;
    private $uri;
    private $pagination;
    public function __construct()
    {
        $this->config['base_url'] = 'http://codeigniter.dev/welcome/index';
        $this->config['total_rows'] = $this->order->count();
        $this->config['per_page'] = 10;
        $this->config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($this->config);
        $start = $this->uri->segment(3);
    }

    abstract public function paginate();
}