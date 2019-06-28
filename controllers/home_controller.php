<?php
require_once ('controllers/base_controller.php');
require_once ('models/products.php');

class HomeController extends BaseController {
	function __construct() {
		$this->folder = "home";
	}

	public function index() {
		$this->returnView("home");
	}

	public function error() {
		$this->returnView("error");
	}
}
?>