<?php

class Feeds_model extends MY_Model {

  public function getFeeds() {
    $sql = "select * from `feeds` order by feed_date desc limit 12";
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
