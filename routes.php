<?php
// tao ra mang $controllers voi key la ten cac controller va value la ten cac ham(action)
$controllers = array(
	"home" => ["index", "error"],
	"product" => ["index"],
	"login" => ["index", "checkLogin", "logout"],
);
//kiem tra su ton tai cua controller va action. Neu khong ton tai thi dua ra trang bao loi
if(!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])){
	$controller = "home";
	$action = "error";
}
//Neu ton tai controller va action thi goi file controller,  khoi tao controller va goi toi action
require_once("controllers/".$controller."_controller.php");
$namecontroller = ucwords($controller)."Controller";// ucwords la function chuyen cac chu cai dau tien trong cuoi thanh chi in hoa 
$controller = new $namecontroller();
$controller->$action();
?>