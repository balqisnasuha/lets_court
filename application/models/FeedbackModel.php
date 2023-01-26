<?php

class FeedbackModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function insertFeedback($feedback)
  {
    $query = array('name' => $feedback['name'], 'email' => $feedback['email'], 'subject' => $feedback['subject'], 'message' => $feedback['message']);

    if (!$this->db->insert('feedback', $query)) {
      return $this->db->error();
    }


  }

  public function getFeedback()
  {
    $query = $this->db->get('Feedback');
    return $query->result();
  }
}

?>