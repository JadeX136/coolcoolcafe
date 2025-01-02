<?php

class customer_database extends CI_Model{
   // Insert registration data in database
    public function signup($data) {
    // Query to check whether username already exist or not
        $condition = "username =" . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('coolcool_customer');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
        // Query to insert data in database
        $this->db->insert('coolcool_customers', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } 
        else {
            return false;
        }
    }
    
   /* public function registration_update($data,$id){
        // $condition = "username =" . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('coolcool_admin');
        $this->db->where('id',$id);
        $this->db->update('coolcool_admin',$data);
        $this->db->where('id',$id);
        return true;
    
    }*/
    
    /*public function deleteadmin($id){
        $this->db->select('*');
        $this->db->from('coolcool_admin');
        $this->db->where('id',$id);
        $this->db->delete('coolcool_admin');
        $this->db->where('id',$id);
        return true;
    }*/
    
    // Read data using username and password
    public function login($data) {    
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('coolcool_customer');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    // Read data from database to show data in admin page
    public function read_user_information($username) {
    
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('coolcool_customer');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
}
?>