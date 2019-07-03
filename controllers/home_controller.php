<?php
require_once ('controllers/base_controller.php');
require_once ('models/products.php');

class HomeController extends BaseController {
	function __construct() {
		$this->folder = "home";
	}
	public function returnView($file, $data = array()) {
		//Kiem tra file duoc goi co ton tai khong
		$path_file = "views/".$this->folder."/".$file.".php";
		if (is_file($path_file)) {
			extract($data);// extract la function nhan vao 1 array va coi cac key trong array nhu cac bien
				require_once ($path_file);		
		} else {
			header("location: index.php?controller=home&action=error");
		}
	}
	public function index() {
		parent::returnView("home");
	}

	public function error() {
		$this->returnView("error");
	}
}
?>