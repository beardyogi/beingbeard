<?php

class Campaign_model extends MY_Model {

  public function getCampaigns() {
    $sql = "select * from `beard_campaigns` where image_url != ''";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
       {
        return $query->result_array();
       }
       else {
         return NULL;
       }

  }
}
