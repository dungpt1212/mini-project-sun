<?php 
/*include("../connection.php");*/
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
		$stmt = $db->query("SELECT * FROM `tbl_product_detail` ORDER BY IdProduct DESC");
		foreach ($stmt->fetchAll() as $product) {
			$list[] = new Products($product["IdProduct"], $product["NameProduct"], $product["OldPrice"], $product["NewPrice"], $product["UrlImage"], $product["Amount"]);
		}

		return $list;
	}

	public static function add($data = array())
	{
		
		$db = DB::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$stmt= $db->prepare("INSERT INTO `tbl_product_detail`( `NameProduct`, `OldPrice`, `NewPrice`, `UrlImage`,`Amount`) VALUES (?, ?, ?, ?, ?)");
		$stmt->execute($data);
	}

	public function delete($id)
	{
		$db = DB::connect();
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$stmt= $db->prepare("DELETE FROM `tbl_product_detail` WHERE IdProduct = ?");
		$data = array($id);
		$stmt->execute($data);
	}

	public function update($data = array())
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



}
/*echo '<pre>';
print_r(Products::findById(1));
echo '</pre>';
*/
?>