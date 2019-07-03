<?php
class BaseController {
	protected $folder;// ten folder trong view

	public function returnView($file, $data = array()) {
		//Kiem tra file duoc goi co ton tai khong
		$path_file = "views/".$this->folder."/".$file.".php";
		if (is_file($path_file)) {
			extract($data);// extract la function nhan vao 1 array va coi cac key trong array nhu cac bien
			if(isset($_SESSION["admin"])){//kiem tra neu ton tai session["admin"] moi cho truy cap vao view theo yeu cau
				require_once ('views/layouts/master.php');
			}
			else{// khong ton tai session thi dieu huong ve trang login
				header("location: index.php?controller=login");
			}	
		} else {
			header("location: index.php?controller=home&action=error");
		}
	}


}

?>