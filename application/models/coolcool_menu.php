<?php

class coolcool_menu extends CI_Model{
    function addMenu($data){
        $this->db->select('*');
        $this->db->from('coolcool_menu');
        $this->db->insert('coolcool_menu',$data);
        return true;
    }
    function edit_customer($customer_id,$data){
        $this->db->select('*');
        $this->db->from('web_customer');
        $this->db->where('customer_id',$customer_id);
        $this->db->update('web_customer',$data);
        $this->db->where('customer_id',$customer_id);
        return true;
    }
    function delete_customer($customer_id){
        $this->db->select('*');
        $this->db->from('web_customer');
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('web_customer');
        $this->db->where('customer_id',$customer_id);
        return true;
    }

    public function create_order($order_data) {
        // Insert order data into the 'orders' table
        $this->db->insert('coolcool_order', $order_data);
          // Return the inserted order_id
    }

    // Create order items function
    public function add_order_item($order_item) {
        // Insert each order item into the 'coolcool_order_items' table
         $this->db->insert('coolcool_order_items', $order_item);
    }
}
?>