<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session','cart','pagination','form_validation','cart'));
        $this->load->helper(array('url'));
		$this->load->model(array('Login_database'));
    }
	
	function add_to_cart()
{
    $formtype = $this->input->post('formtype');
    $price_per_glass = $this->input->post('price') / $this->input->post('quantity');
    $data = [];

    if ($formtype == 'coffee_milk_v') {
        $options = array(
            'espressoShots' => $this->input->post('espressoDescription'),
            'milk' => $this->input->post('milkname'),
            'sweetness' => $this->input->post('sweetness')
        );
        $data = array(
            'id' => md5($this->input->post('product_id') . json_encode($options)), // Unique ID
            'qty' => $this->input->post('quantity'),
            'price' => $price_per_glass,
            'name' => $this->input->post('nameMenu'),
            'type' => "Coffee Milk",
            'detail' => $options
        );
		print_r($data);
    } elseif ($formtype == 'black_coffee_v') {
        $options = array(
            'espressoShots' => $this->input->post('espressoDescription')
        );
        $data = array(
            'id' => md5($this->input->post('product_id') . json_encode($options)), // Unique ID
            'qty' => $this->input->post('quantity'),
            'price' => $price_per_glass,
            'name' => $this->input->post('nameMenu'),
            'type' => "black_coffee_v",
            'detail' => $options
        );
		print_r($data);
    } elseif ($formtype == 'tea_v') {
        $options = array(
            'milk' => $this->input->post('milkname'),
            'sweetness' => $this->input->post('sweetness')
        );
        $data = array(
            'id' => md5($this->input->post('product_id') . json_encode($options)), // Unique ID
            'qty' => $this->input->post('quantity'),
            'price' => $price_per_glass,
            'name' => $this->input->post('nameMenu'),
            'type' => "tea_v",
            'detail' => $options
        );
		print_r($data);
    }

    if (!empty($data)) {
        // Insert item into cart
		if (!$this->cart->insert($data)) {
			log_message('error', 'Cart Insert Failed. Data: ' . print_r($data, true));
			echo "Error: Failed to insert item into cart. Check logs.";
		} else {
			echo "Item added successfully!";
		}
		redirect(base_url('/menu'));
		
        // Debug: Print cart contents
        // $cart_items = $this->cart->contents();
        // echo "<pre>";
        // print_r($cart_items);
        // echo "</pre>";
    } else {
        echo "Error: Missing data or invalid formtype.";
    }
}

	function cart(){
		$cart_items = $this->cart->contents();
		$total = $this->cart->total(); // Gets the total price
		$username = $this->read_user_information();
		$data = array(
			'cart_items' => $cart_items,
			'total' => $total,
			'content' => "Order/cart_v",
			'customer_username' => $username->username
		);
		
		$this->load->view('welcome_message', $data);
	}
	public function remove_item($rowid) {
		$cart = $this->cart->contents();
		if (isset($cart[$rowid])) {
			$data = [
				'rowid' => $rowid,
				'qty' => 0
			];
			$this->cart->update($data);
		}
		redirect(base_url('/order/cart'));
	}
	public function clear_cart() {
		$this->cart->destroy(); // Clears all items in the cart
		redirect(base_url('Order/cart')); // Redirect to cart page or any other page you prefer
	}
    public function checkout() {
        $this->load->model('coolcool_menu');
        // Get cart data
        $cart_items = $this->cart->contents();
        $unixtimestamp = time();
        $order_data = array(
            'create_date' => $unixtimestamp,
            //'username' => $username,
            'order_id' => $unixtimestamp,
            'total' => $this->cart->total()
        );
        foreach($cart_items as $item){
            $details = '';
            foreach($item['detail'] as $option_name => $option_value){
                $details .= $option_name . ': ' . $option_value . ', ';
            }
            $order_item = array(
                'order_id' => $unixtimestamp,
                'name' => $item['name'],
                'qty' => $item['qty'],
                'detail' => $details,
                'sub_total' => $item['subtotal']
            );
            print_r($order_item);
        }
        
        $this->load->model('coolcool_menu');
        /*if($this->coolcool_menu->create_order($order_data)){
            foreach ($cart_items as $item) {
                // Combine details into a string
                $details = '';
                foreach ($item['detail'] as $option_name => $option_value) {
                    $details .= $option_name . ': ' . $option_value . ', ';
                }
                $details = rtrim($details, ', '); // Remove the last comma and space
            
                // Create the order item array
                $order_item = array(
                    'order_id' => $unixtimestamp,
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                    'detail' => $details,
                    'sub_total' => $item['subtotal']
                );
            
                // Print the array for debugging
                print_r($order_item);
                $this->coolcool_menu->add_order_item($order_item);
            }
            
            echo "tset";
            // Clear the cart and redirect to success page
            $this->cart->destroy();
            redirect('/Order/success');
        }
        // else{

        // }*/
    
        
    }
    
}
