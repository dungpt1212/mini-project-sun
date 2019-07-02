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

	public function add()
	{
		$this->returnView("add");
	}

	public function postAdd()
	{
		if(isset($_POST["btn_add"])){
			$name = $_POST['NameProduct'];
			$oldprice = $_POST['OldPrice'];
			$newPrice = $_POST['NewPrice'];
			$amount = $_POST['Amount'];

			if($_FILES['UrlImage']['error']>0){
				echo '<br> Co loi trong viec upload len serve';
			}else
			move_uploaded_file($_FILES['UrlImage']['tmp_name'], 'assets/images/'.$_FILES['UrlImage']['name']);
			$image = $_FILES['UrlImage']['name'];

			$data = array($name, $oldprice, $newPrice, $image, $amount);
			Products::add($data);
			header("location: index.php?controller=product");
		}
	}

	public function delete()
	{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
			Products::delete($id);
			header("location: index.php?controller=product");
		}
	}

	public function update()
	{
		if(isset($_GET["id"])){
			$id = $_GET["id"];
		}
		$product = Products::findById($id);
		$data = array("product" => $product);
		$this->returnView('update', $data);
	}

	public function postUpdate()
	{
		if(isset($_POST["btn_update"])){
			$id= $_POST['IdProduct'];
			$name = $_POST['NameProduct'];
			$oldprice = $_POST['OldPrice'];
			$newPrice = $_POST['NewPrice'];
			$amount = $_POST['Amount'];
			$image = $_POST['image'];
			if($_FILES['UrlImage']['error']>0 || !$_FILES['UrlImage'] ){
				echo '<br> Co loi trong viec upload len serve';
			}else{
				move_uploaded_file($_FILES['UrlImage']['tmp_name'], 'assets/images/'.$_FILES['UrlImage']['name']);
				$image = $_FILES['UrlImage']['name'];
			}

			$data = array(
				"NameProduct" => $name,
				"OldPrice" => $oldprice,
				"NewPrice" => $newPrice,
				"UrlImage" => $image,
				"Amount" => $amount,
				"IdProduct" => $id

			);
			Products::update($data);
			header("location: index.php?controller=product");
		}
	}



	

}
?>