<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('ctypeesh', $formArray);
    }

    public function getMenu() {
        $result = $this->db->get('ctypeesh')->result_array();
        return $result;
    }

    public function getSingleCtype($id) {
        $this->db->where('d_id', $id);
        $ctype = $this->db->get('ctypeesh')->row_array();
        return $ctype;
    }

    public function update($id, $formArray) {
        $this->db->where('d_id', $id);
        $this->db->update('ctypeesh', $formArray);
    } 

    public function delete($id) {
        $this->db->where('d_id',$id);
        $this->db->delete('ctypeesh');
    }

    public function countCtype() {
        $query = $this->db->get('ctypeesh');
        return $query->num_rows();
    }

    public function getCtypeesh($id) {
        $this->db->where('r_id', $id);
        $ctype = $this->db->get('ctypeesh')->result_array();
        return $ctype;
    }
}
