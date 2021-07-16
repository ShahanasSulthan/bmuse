<?php
class AdminModel extends CI_Model
{
    public function getAllSubscribers(){
        $this->db->select("id,name,email");
        $this->db->from('subscribers');   
        $this->db->order_by("id", "asc");
        $query = $this->db->get();        
        if ($query->num_rows() > 0) {
            return $query->result_array();                     
        }else{
            return array();
        }
    }
    public function getSubscriberMailIds($ids){
        $this->db->select("email");
        $this->db->from('subscribers');   
        $this->db->where_in('id', $ids );
        $query = $this->db->get();        
        if ($query->num_rows() > 0) {
            return $query->result_array();                     
        }else{
            return array();
        }
    }
    public function deleteSubscribers($ids){       
        foreach($ids as $id){
            $this->db->where('id', $id);
            $this->db->delete('subscribers');
        }
        return true;
    }
}