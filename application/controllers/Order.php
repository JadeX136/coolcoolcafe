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
	// function add_to_cart(){
	// 	$formtype = $this->input->post('formtype');
	// 	if($formtype == 'coffee_milk_v'){
	// 		$price_per_glass = $this->input->post('price') / $this->input->post('quantity');
	// 		$data = array(
	// 			'id' => $this->input->post('product_id'),
	// 			'qty' => $this->input->post('quantity'),
	// 			'price' => $price_per_glass,
	// 			'name' => $this->input->post('nameMenu'),
	// 			'type' => "Coffee Milk",
	// 			'detail' => array(
	// 				'espressoShots' => $this->input->post('espressoDescription'),
	// 				'milk' => $this->input->post('milkname'),
	// 				'sweetness' => $this->input->post('sweetness')
	// 			)
	// 		);
	// 		print_r($data);
	// 	}
	// 	else if($formtype == 'black_coffee_v'){
	// 		$price_per_glass = $this->input->post('price') / $this->input->post('quantity');
	// 		$data = array(
	// 			'id' => $this->input->post('product_id'),
	// 			'qty' => $this->input->post('quantity'),
	// 			'price' => $price_per_glass,
	// 			'name' => $this->input->post('nameMenu'),
	// 			'type' => "Black Coffee",
	// 			'detail' => array(
	// 				'espressoShots' => $this->input->post('espressoDescription')
	// 			)
	// 		);
	// 		print_r($data);
	// 	}
	// 	else if($formtype == 'tea_v'){
	// 		$price_per_glass = $this->input->post('price') / $this->input->post('quantity');
	// 		$data = array(
	// 			'id' => $this->input->post('product_id'),
	// 			'qty' => $this->input->post('quantity'),
	// 			'price' => $price_per_glass,
	// 			'name' => $this->input->post('nameMenu'),
	// 			'type' => "Tea",
	// 			'detail' => array(
	// 				'milk' => $this->input->post('milkname'),
	// 				'sweetness' => $this->input->post('sweetness')
	// 			)
	// 		);
	// 		print_r($data);
	// 	}
		
	// 	//$this->cart->insert($data);
	// 	$this->cart->insert($data);
	// 	//redirect(base_url('/menu'));
		
		
    // 	// Retrieve and display the cart contents
	//     $cart_items = $this->cart->contents();
    // 	echo "<pre>";
    // 		print_r($cart_items); // This will display all items in the cart
    // 	echo "</pre>";




	// }
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
        $this->cart->insert($data);

        // Debug: Print cart contents
        $cart_items = $this->cart->contents();
        echo "<pre>";
        print_r($cart_items);
        echo "</pre>";
    } else {
        echo "Error: Missing data or invalid formtype.";
    }
}

	public function show_cart() {
		$this->show_cart();
	}
	public function clear_cart() {
		$this->cart->destroy(); // Clears all items in the cart
		redirect(base_url('Order/show_cart')); // Redirect to cart page or any other page you prefer
	}
	
}
