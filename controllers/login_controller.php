<?php
require_once ('controllers/base_controller.php');
require_once ('models/admin.php');

class LoginController extends BaseController {
	function __construct() {
		$this->folder = "login";
	}

	public function returnView($file, $data = array()) { //override lai phuong thuc returnView() tu BaseController nham muc dich khong cho view su dung view master
		//Kiem tra file duoc goi co ton tai khong
		$path_file = "views/".$this->folder."/".$file.".php";
		if (is_file($path_file)) {
			extract($data);// extract la function nhan vao 1 array va coi cac key trong array nhu cac bien

			// ob_start();/*ham ob_start(): client gui request len thi server se xu ly. Nhung khi dung ham nay thi truoc khi gui len server, du lieu se duoc luu vao 1 vung nho tam(buffer) de tien hanh 1 thao tac nao do truoc roi moi gui len. */

			require_once ($path_file);
			// $content = ob_get_clean();// ham ob_get_clean(): lay du lieu tu bo nho tam de xu ly, sau do se xoa luon
			/*require_once ('views/layouts/master.php');*/
		} else {
			header("location: index.php?controller=home&action=error");
		}
	}
	public function index() {
		if(isset($_COOKIE['admin'])){ // kiem tra ton tai cookie thi cho ngay vao trang chu 
			$_SESSION["admin"] = $_COOKIE["admin"];
			header("location: index.php?controller=home");
		}// neu khong ton tai thi hien form dang nhap
		$data = array("error" => "");
		$this->returnView("index", $data);
	}

	public function checkLogin() // ham kiem tra dang nhap
	{
		if (isset($_POST["btn_login"])) {
			if(isset($_POST["email"]) && isset($_POST["pass"])){
				$email = $_POST["email"];
				$pass = $_POST["pass"];
				if(Admin::findByEmail($email, $pass) > 0){ // kiem tra neu email va pass trung khop voi csdl thi kiem tra den nguoi dung tick vao remember me chua
					if(isset($_POST["remember-me"])){// TH1: da click thi luu ca session va cookie 
						$_SESSION['admin'] = $email;
						$time = 60*60*24;
						setcookie("admin", $email, time() + $time);
						header("location:index.php?controller=home");
					}else{//th2: chua click thi chi luu session
						$_SESSION['admin'] = $email;
						header("location:index.php?controller=home");
					}
					
				}else {//neu khong trung quay tro lai trang login va dua ra thong bao loi
					$this->folder = "login";
					$data = array("error" => "Sai thông tin đăng nhập");
					$this->returnView("index", $data);
				}
			}
		}
		
	}

	public function logout()
	{
		unset($_SESSION["admin"]);
		setcookie("admin", $email, time() - 99999999);
		header("location: index.php?controller=login");
	}

	

}
?>