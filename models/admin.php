<?php
class Admin{
	public $email;
	public $pass;

	function __construct($email, $pass)
	{
		$this->email = $email;
		$this->pass = $pass;
	}

	public static function findByEmail($email,$pass) // function tim kiem so ban ghi Admin theo email va pass
	{
		$db = DB::connect();
		$stmt = $db->prepare("select * from tbl_admin where Email = :email and Pass = :pass");
		$stmt->execute(array("email" => $email, "pass"=>md5($pass)));
		$count = $stmt->rowCount(); 
		return $count;
	}
}

 ?>