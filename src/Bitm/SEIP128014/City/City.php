<?php
namespace App\Bitm\SEIP128014\City;
use App\Bitm\SEIP128014\Book\Message;
class City{

	public $name;
	public $city;
	public $id;
	public $trashAt;
	public $conn;
	public $email;
	public $description;

	public function __construct()
	{
		$this->conn = new \mysqli("localhost","root","","atomicprojectb20") or die("Sorry Your connection fail.");
	}


	public function prepare(array $data){
		if (array_key_exists("id", $data)) {
			$this->id = $data["id"];
		}

		if (array_key_exists("name", $data)) {
			$this->name = $data["name"];
		}

		if (array_key_exists("city", $data)) {
			$this->city = $data["city"];
		}
		if(array_key_exists('email',$data)){
			$this->email = $data['email'];
		}
		if(array_key_exists('description',$data)){
			$this->description = $data['description'];
		}
		return $this;
	}

	public function count(){
		$sql = "SELECT COUNT(*) AS totalItem FROM `atomicprojectb20`.`city` WHERE `trash_at` IS NULL";
		$result = $this->conn->query($sql);
		$row = $result->fetch_object();
		return $row->totalItem;
	}

	public function paginator($pageStartFrom=0,$limit=5){
		$sql = "SELECT * FROM `city` WHERE `trash_at` IS NULL LIMIT {$pageStartFrom}, {$limit}";
		$result = $this->conn->query($sql);
		$allCity = array();
		if($result){
			while($row = $result->fetch_object()){
				$allCity[]=$row;
			}
		}
		return $allCity;
	}

	public function store(){
		$sql = "INSERT INTO `city` (`name`,`city`,`email`,`description`) VALUES ('{$this->name}', '{$this->city}', '{$this->email}','{$this->description}')";
		$result = $this->conn->query($sql);
		if ($result) {
			Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
			header("Location:index.php");
		}
	}

	public function selectById(){
		$sql = "SELECT * FROM `city` WHERE `id`={$this->id}";
		$result = $this->conn->query($sql);
		$row = $result->fetch_object();
		return $row;
	}


	public function selectAll(){
		$sql = "SELECT * FROM `city` WHERE `trash_at` IS NULL";
		$result = $this->conn->query($sql);
		$data = array();
		if ($result) {
			while($row = $result->fetch_object()){
				$data[] = $row;
			}
		}
		return $data;
	}


	public function delete(){
		$sql = "DELETE FROM `city` WHERE `id`={$this->id}";
		$result = $this->conn->query($sql);
		if ($result) {
			Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
			header("Location:index.php");
		}
	}


	public function update(){
		$sql = "UPDATE `city` SET `name` = '{$this->name}',`city` = '{$this->city}', `email` = '{$this->email}',`description`='{$this->description}' WHERE `id` = {$this->id}";
		$result = $this->conn->query($sql);
		if ($result) {
			Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
			header("Location:index.php");
		}
	}


	public function trash(){
		$this->trashAt = time();
		$sql = "UPDATE `city` SET `trash_at` = {$this->trashAt} WHERE `id`={$this->id}";
		$result = $this->conn->query($sql);
		if ($result) {
			Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
			header("Location:index.php");
		}
	}


	public function trashList(){
		$sql = "SELECT * FROM `city` WHERE `trash_at` IS NOT NULL";
		$result = $this->conn->query($sql);
		$trashData=array();
		if ($result) {
			while($row = $result->fetch_object()){
				$trashData[] = $row;
			}
		}
		return $trashData;
	}


	public function recover(){
		$sql = "UPDATE `city` SET `trash_at` = NULL WHERE `id` = {$this->id}";
		$result = $this->conn->query($sql);
		if ($result) {
			Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
			header("Location:index.php");
		}
	}


	public function recoverMultiple(array $ids){
		if ( (is_array($ids)) && (count($ids) > 0) ) {
			$IDS = implode(",", $ids);
			$sql = "UPDATE `city` SET `trash_at` = NULL WHERE `id` IN ({$IDS})";
			$result = $this->conn->query($sql);

			if ($result) {
				Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
				header("Location:index.php");
			}else{
				Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
				//header("Location:index.php");
			}
		}
	}

	public function deleteMultiple(array $ids){
		if ( (is_array($ids)) && (count($ids) > 0)) {
			$IDS = implode(",", $ids);
			$sql = "DELETE FROM `city` WHERE `id` IN ({$IDS})";
			$result = $this->conn->query($sql);
			if ($result) {
				Message::message("<div class=\"alert alert-succes\">You are <strong>Success</strong></div>");
				header("Location:index.php");
			}else{
				Message::message("<div class=\"alert alert-danger\">Your are <strong>Fail</strong></div>");
				//header("Location:index.php");
			}
		}
	}



} 