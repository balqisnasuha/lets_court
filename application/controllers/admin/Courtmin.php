<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Courtmin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
    }

    public function index() {
        $this->load->model('Courtmin_model');
        $courtmins = $this->Courtmin_model->getCourtmins();
        $courtmin_data['courtmins'] = $courtmins;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/courtmin/list', $courtmin_data);
        $this->load->view('admin/partials/footer');
    }

    public function create_court() {

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/court/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        

        $this->load->model('Courtmin_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('res_name', 'Court name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('phone', 'Phone','trim|required');
        $this->form_validation->set_rules('url', 'URL','trim|required');
        $this->form_validation->set_rules('o_hr', 'o_hr','trim|required');
        $this->form_validation->set_rules('c_hr', 'c_hr','trim|required');
        $this->form_validation->set_rules('o_days', 'o_days','trim|required');
        $this->form_validation->set_rules('c_name', 'category','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) {


            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully

                    
                    $data = $this->upload->data();


                    //resizing image for admin
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);
                    

                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('res_name');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['phone'] = $this->input->post('phone');
                    $formArray['url'] = $this->input->post('url');
                    $formArray['o_hr'] = $this->input->post('o_hr');
                    $formArray['c_hr'] = $this->input->post('c_hr');
                    $formArray['o_days'] = $this->input->post('o_days');
                    $formArray['c_id'] = $this->input->post('c_name');
                    $formArray['address'] = $this->input->post('address');
        
                    $this->Courtmin_model->create($formArray);
        
                    $this->session->set_flashdata('res_success', 'Court added successfully');
                    redirect(base_url(). 'admin/courtmin/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['cats'] = $cat;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/courtmin/add_res', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {
                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('res_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['phone'] = $this->input->post('phone');
                $formArray['url'] = $this->input->post('url');
                $formArray['o_hr'] = $this->input->post('o_hr');
                $formArray['c_hr'] = $this->input->post('c_hr');
                $formArray['o_days'] = $this->input->post('o_days');
                $formArray['c_id'] = $this->input->post('c_name');
                $formArray['address'] = $this->input->post('address');
    
                $this->Courtmin_model->create($formArray);
    
                $this->session->set_flashdata('res_success', 'Court added successfully');
                redirect(base_url(). 'admin/courtmin/index');
            }

        } else {
            $data['cats'] = $cat;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/courtmin/add_res', $data);
            $this->load->view('admin/partials/footer');
        }
        
    }

    public function edit($id) {
        $this->load->model('Courtmin_model');
        $courtmin = $this->Courtmin_model->getCourtmin($id);

        $this->load->model('Category_model');
        $cat = $this->Category_model->getCategory();

        if(empty($courtmin)) {
            $this->session->set_flashdata('error', 'Courtmin not found');
            redirect(base_url().'admin/courtmin/index');
        }

        $this->load->helper('common_helper');

        $config['upload_path']          = './public/uploads/court/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['encrypt_name']         = true;

        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('res_name', 'Court name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('phone', 'Phone','trim|required');
        $this->form_validation->set_rules('url', 'URL','trim|required');
        $this->form_validation->set_rules('o_hr', 'o_hr','trim|required');
        $this->form_validation->set_rules('c_hr', 'c_hr','trim|required');
        $this->form_validation->set_rules('o_days', 'o_days','trim|required');
        $this->form_validation->set_rules('c_name', 'category','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) {

            if(!empty($_FILES['image']['name'])){
                //image is selected
                if($this->upload->do_upload('image')) {
                    //file uploaded suceessfully

                    
                    $data = $this->upload->data();


                    //resizing image
                    resizeImage($config['upload_path'].$data['file_name'], $config['upload_path'].'thumb/'.$data['file_name'], 300,270);


                    $formArray['img'] = $data['file_name'];
                    $formArray['name'] = $this->input->post('res_name');
                    $formArray['email'] = $this->input->post('email');
                    $formArray['phone'] = $this->input->post('phone');
                    $formArray['url'] = $this->input->post('url');
                    $formArray['o_hr'] = $this->input->post('o_hr');
                    $formArray['c_hr'] = $this->input->post('c_hr');
                    $formArray['o_days'] = $this->input->post('o_days');
                    $formArray['c_id'] = $this->input->post('c_name');
                    $formArray['address'] = $this->input->post('address');
        
                    $this->Courtmin_model->update($id, $formArray);
        
                    //deleting existing files

                    if (file_exists('./public/uploads/court/'.$courtmin['img'])) {
                        unlink('./public/uploads/court/'.$courtmin['img']);
                    }

                    if(file_exists('./public/uploads/court/thumb/'.$courtmin['img'])) {
                        unlink('./public/uploads/court/thumb/'.$courtmin['img']);
                    }

                    $this->session->set_flashdata('res_success', 'Court updated successfully');
                    redirect(base_url(). 'admin/courtmin/index');

                } else {
                    //we got some errors
                    $error = $this->upload->display_errors("<p class='invalid-feedback'>","</p>");
                    $data['errorImageUpload'] = $error;
                    $data['courtmin'] = $courtmin;
                    $data['cats'] = $cat;
                    $this->load->view('admin/partials/header');
                    $this->load->view('admin/courtmin/edit', $data);
                    $this->load->view('admin/partials/footer');
                }

                
            } else {

                //if no image is selcted we will add res data without image
                $formArray['name'] = $this->input->post('res_name');
                $formArray['email'] = $this->input->post('email');
                $formArray['phone'] = $this->input->post('phone');
                $formArray['url'] = $this->input->post('url');
                $formArray['o_hr'] = $this->input->post('o_hr');
                $formArray['c_hr'] = $this->input->post('c_hr');
                $formArray['o_days'] = $this->input->post('o_days');
                $formArray['c_id'] = $this->input->post('c_name');
                $formArray['address'] = $this->input->post('address');
    
                $this->Courtmin_model->update($id ,$formArray);
    
                $this->session->set_flashdata('res_success', 'Court updated successfully');
                redirect(base_url(). 'admin/courtmin/index');
            }


        } else {
            $data['courtmin'] = $courtmin;
            $data['cats'] = $cat;
            $this->load->view('admin/partials/header');
            $this->load->view('admin/courtmin/edit', $data);
            $this->load->view('admin/partials/footer');
        }

    }

    public function delete($id){

        $this->load->model('Courtmin_model');
        $courtmin = $this->Courtmin_model->getCourtmin($id);

        if(empty($courtmin)) {
            $this->session->set_flashdata('error', 'court not found');
            redirect(base_url().'admin/courtmin');
        }

        if (file_exists('./public/uploads/court/'.$courtmin['img'])) {
            unlink('./public/uploads/court/'.$courtmin['img']);
        }

        if(file_exists('./public/uploads/court/thumb/'.$courtmin['img'])) {
            unlink('./public/uploads/court/thumb/'.$courtmin['img']);
        }

        $this->Courtmin_model->delete($id);

        $this->session->set_flashdata('res_success', 'Court deleted successfully');
        redirect(base_url().'admin/courtmin/index');

    }
}