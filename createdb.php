<?php
class createdb
{
public $servername;
public $username;
public $password;
public $dbname;
public $tablename;
public $con;
public function __construct($dbname="newdb",
$tablename="productdb",
$servername="localhost",
$username="root",
$password="12345"
)	

{
	$this->dbname=$dbname;
	$this->tablename=$tablename;
	$this->servername=$servername;
	$this->username=$username;
	$this->password=$password;
	$this->con=mysqli_connect($servername,$username,$password);
	if(!$this->con)
	{
		die("connection failed:".mysqli_connect_error());
	}
	$sql="create database if not exists $dbname";
	if(mysqli_query($this->con,$sql))
	{
		$this->con=mysqli_connect($servername,$username,$password,$dbname);
		$sql="create table if not exists $tablename
		(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		product_name VARCHAR(25) NOT NULL,product_price FLOAT,
		product_img VARCHAR(100))";
		if(!mysqli_query($this->con,$sql)){
			echo"error creating table:".mysqli_error($this->con);
		}
	}
	else
		return false;
}
public function getdata()
{
	$sql="Select * from $this->tablename";
	$result=mysqli_query($this->con,$sql);
	if(mysqli_num_rows($result)>0)
		return $result;
}
}
?>