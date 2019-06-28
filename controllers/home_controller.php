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

			// ob_start();/*ham ob_start(): client gui request len thi server se xu ly. Nhung khi dung ham nay thi truoc khi gui len server, du lieu se duoc luu vao 1 vung nho tam(buffer) de tien hanh 1 thao tac nao do truoc roi moi gui len. */
				require_once ($path_file);		
			// $content = ob_get_clean();// ham ob_get_clean(): lay du lieu tu bo nho tam de xu ly, sau do se xoa luon
			
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