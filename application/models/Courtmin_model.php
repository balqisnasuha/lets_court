<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Courtmin_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('court', $formArray);
    }

    public function getCourtmins() {
        $result = $this->db->get('court')->result_array();
        return $result;
    }

    public function getCourtmin($id=null) {
        $this->db->where('r_id', $id);
        $courtmin = $this->db->get('court')->row_array();
        return $courtmin;
    }

    public function update($id, $formArray) {
        $this->db->where('r_id', $id);
        $this->db->update('court', $formArray);
    } 

    public function delete($id) {
        $this->db->where('r_id',$id);
        $this->db->delete('court');
    }

    public function countCourtmin() {
        $query = $this->db->get('court');
        return $query->num_rows();
    }

    public function getResInfo() {
        $this->db->select('*');
        $this->db->from('court');
        $this->db->join('res_category','court.c_id = res_category.c_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

}
