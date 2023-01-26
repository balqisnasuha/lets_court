<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $admin = $this->session->userdata('admin');
    if (empty($admin)) {
      $this->session->set_flashdata('msg', 'Your session has been expired');
      redirect(base_url() . 'admin/login/index');
    }
  }

  public function index()
  {
    $this->load->model('FeedbackModel');
    $data['feedback'] = $this->FeedbackModel->getFeedback();
    $this->load->view('admin/partials/header');
    $this->load->view('admin/feedback/list', $data);
    $this->load->view('admin/partials/footer');
  }
}
?>