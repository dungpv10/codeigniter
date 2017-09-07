<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->_loadModel(array(
           'Order_model' => 'order'
        ));
        $this->load->library(array('pagination'));
        $this->load->helper(array('url'));
    }

    public function index()
    {
        $data['orders'] = $this->order->paginate();
        $this->load->view('welcome_message', $data);
    }



    public function delete($id){
        $this->order->delete($id);
        redirect('http://codeigniter.dev/welcome/index');
    }


    private function _loadModel($models = array()){
        foreach($models as $model => $alias){
            $this->load->model($model, $alias);
        }
    }

    public function _remap($method, $params = array())
    {
        if( method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
}
