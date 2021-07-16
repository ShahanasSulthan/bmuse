<?php
class SubscriptionModel extends CI_Model
{
    public function subscribe($data){
        if($this->db->insert('subscribers',$data)){
            return true;
        }
        return false;
    }
    public function checkEmailIsAlreadyRegistered($email){
        $this->db->select("id");
        $this->db->from('subscribers');   
        $this->db->where('email',$email);
        $query = $this->db->get();        
        if ($query->num_rows() > 0) {
            return true;                     
        }else{
            return false;
        }
    }
}