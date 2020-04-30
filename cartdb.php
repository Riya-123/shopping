<?php
class cartdb
{
public $servernam;
public $usernam;
public $passwor;
public $dbnam;
public $tablenam;
public $co;
public function __construct($dbnam="artdb",
$tablenam="catdb",
$servernam="localhost",
$usernam="root",
$passwor="12345"
)	

{
	$this->dbnam=$dbnam;
	$this->tablenam=$tablenam;
	$this->servernam=$servernam;
	$this->usernam=$usernam;
	$this->passwor=$passwor;
	$this->co=mysqli_connect($servernam,$usernam,$passwor);
	if(!$this->co)
	{
		die("connection failed:".mysqli_connect_error());
	}
	$sql="create database if not exists $dbnam";
	if(mysqli_query($this->co,$sql))
	{
		$this->co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
		$sql="create table if not exists $tablenam
		(product_name VARCHAR(25) NOT NULL,product_price FLOAT,
		product_img VARCHAR(100),product_quant INT(11) NOT NULL)";
		if(!mysqli_query($this->co,$sql)){
			echo"error creating table:".mysqli_error($this->co);
		}
	}
	else
		return false;
}
public function getdata()
{
	$sql="Select * from $this->tablenam";
	$result=mysqli_query($this->co,$sql);
	if(mysqli_num_rows($result)>0)
		return $result;
}
}
?>