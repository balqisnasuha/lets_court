<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Ctype extends CI_Controller {

    function __construct(){
        parent::__construct();
        //Load cart libraray
        $this->load->library('cart');
    }

    public function list($id) {
        $this->load->model('Menu_model');
        $ctypeesh = $this->Menu_model->getCtypeesh($id);

        $this->load->model('Courtmin_model');
        $res = $this->Courtmin_model->getCourtmin($id);

        $data['ctypeesh'] = $ctypeesh;
        $data['res'] = $res;
        $this->load->view('front/partials/header');
        $this->load->view('front/ctype', $data);
        $this->load->view('front/partials/footer');
    }

    public function addToCart($id) {
        $this->load->model('Menu_model');
        $ctypeesh = $this->Menu_model->getSingleCtype($id);
        $data = array (
            'id'    => $ctypeesh['d_id'],
            'r_id'  => $ctypeesh['r_id'],
            'qty'   =>1,
            'price' => $ctypeesh['price'],
            'name' => $ctypeesh['name'],
            'image' => $ctypeesh['img']
        );
        $this->cart->insert($data);
        redirect(base_url(). 'cart/index');
    }
}