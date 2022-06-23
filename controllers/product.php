<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        //$this->load->model('product');
    }
    
    function index(){
        $data = array();
        $data['products'] = $this->product->getRows();
        $this->load->view('product/index', $data);
    }
    
    function addToCart($proID)
    {
        $product = $this->product->getRows($proID);
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['price'],
            'name'    => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);
        redirect('cart/');
    }
    
}
?>