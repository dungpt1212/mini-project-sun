<?php 
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
		$stmt = $db->query("SELECT * FROM `tbl_product_detail`");
		foreach ($stmt->fetchAll() as $product) {
			$list[] = new Products($product["IdProduct"], $product["NameProduct"], $product["OldPrice"], $product["NewPrice"], $product["UrlImage"], $product["Amount"]);
		}

		return $list;
	}

	public function add()
	{
		
	}

}

/*echo '<pre>';
print_r(Products::showAll());
echo '</pre>';*/

 ?>