<?php
require_once ('controllers/base_controller.php');
require_once ('models/products.php');

class ProductController extends BaseController {
	function __construct() {
		$this->folder = "product";
	}

	public function index() {
		$products = Products::showAll();
		$data = array("products" => $products);
		$this->returnView("index", $data);
	}

	

}
?>