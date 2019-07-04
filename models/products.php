<?php 
// include("../connection.php");
class Products{
	public $id;
	public $name;
	public $oldprice;
	public $newprice;
	public $image;
	public $amount;

	function __construct($id, $name, $oldprice, $newprice, $image, $amount){
		$this->id = $id;
		$this->name = $name;
		$this->oldprice = $oldprice;
		$this->newprice = $newprice;
		$this->image = $image;
		$this->amount = $amount;
	}

	public static function showAll()
	{
		$list = [];
		$db = DB::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$news_onepage = 10;//Xác định số bản tin trong một trang
		$stmt = $db->prepare("select COUNT(IdProduct) as total from tbl_product_detail");
		$stmt->execute();
		$product = $stmt->fetch();
		$total_record = $product["total"];	//tong so ban ghi co trong database
      $total_page = ceil($total_record/$news_onepage);//Xác định tổng số trang
      if(isset($_GET["PageNo"])){//XĐ trang hiện tại
      	$page = is_numeric($_GET["PageNo"])? $_GET["PageNo"] : 1; 
      }else $page = 1;
      $first_record = ($page-1)*$news_onepage;//xác định stt bản ghi bắt đầu của 1 trang
  //phan trang end
      $sql= "select* from tbl_product_detail  ORDER BY IdProduct DESC LIMIT $first_record,$news_onepage ";
      $stmt = $db->query($sql);

      foreach ($stmt->fetchAll() as $product) {
      	$list[] = new Products($product["IdProduct"], $product["NameProduct"], $product["OldPrice"], $product["NewPrice"], $product["UrlImage"], $product["Amount"]);
      }
      $list["total_page"] = $total_page;
      return $list;


  }

  public static function add($data = array())
  {

  	$db = DB::connect();
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  	$stmt= $db->prepare("INSERT INTO `tbl_product_detail`( `NameProduct`, `OldPrice`, `NewPrice`, `UrlImage`,`Amount`) VALUES (?, ?, ?, ?, ?)");
  	$stmt->execute($data);
  }

  public static function delete($id)
  {
  	$db = DB::connect();
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  	$stmt= $db->prepare("DELETE FROM `tbl_product_detail` WHERE IdProduct = ?");
  	$data = array($id);
  	$stmt->execute($data);
  }

  public static function update($data = array())
  {
  	$db = DB::connect();
  	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  	$stmt= $db->prepare("UPDATE `tbl_product_detail` SET `NameProduct`=:NameProduct,`OldPrice`=:OldPrice,`NewPrice`=:NewPrice,`UrlImage`=:UrlImage,`Amount`=:Amount WHERE IdProduct = :IdProduct");
  	$stmt->execute($data);
  }

public static function findById($id) // function tra ve ban ghi theo id
{
	$db = DB::connect();
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$stmt = $db->prepare("SELECT * FROM `tbl_product_detail` WHERE IdProduct= ?");
	$stmt->execute(array($id));
	$product = $stmt->fetch();
	$list = new Products($product["IdProduct"], $product["NameProduct"], $product["OldPrice"], $product["NewPrice"], $product["UrlImage"], $product["Amount"]);
	return $list;
	
}

public static function search($key="lung"){
	$list = [];
	$db = DB::connect();
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$stmt = $db->prepare("SELECT * FROM `tbl_product_detail` WHERE NameProduct like :key");
	$stmt->bindValue(':key', '%' . $key . '%');
	$stmt->execute();
	$count = $stmt->rowCount(); 
	// $product = $stmt->fetchAll();
	foreach ($stmt->fetchAll() as $product) {
		$list[] = new Products($product["IdProduct"], $product["NameProduct"], $product["OldPrice"], $product["NewPrice"], $product["UrlImage"], $product["Amount"]);
	}
	$list['count_search'] = $count;
	return $list;
}

}
  /*echo '<pre>';
  print_r(Products::search());
  echo '</pre>';*/

  ?>