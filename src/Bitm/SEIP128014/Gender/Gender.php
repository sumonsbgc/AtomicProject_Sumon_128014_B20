<?php
namespace App\Bitm\SEIP128014\Gender;
use App\Bitm\SEIP128014\Book\Message;
class Gender{
	public $conn;
	public $id;
	public $name;
	public $gender;
	public $trashAt;

	public function __construct(){
		$this->conn = new \mysqli("localhost","root","","atomicprojectb20") or die("Your are fail to connection!");
	}


	public function count(){
		$sql = "SELECT COUNT(*) AS totalItem FROM `atomicprojectb20`.`gender`";
		$result = $this->conn->query($sql);
		$row = $result->fetch_object();
		return $row->totalItem;
	}

	public function paginator($pageStartFrom=0,$limit=5){
		$sql = "SELECT * FROM `gender` LIMIT {$pageStartFrom}, {$limit}";
		$result = $this->conn->query($sql);
		$allGender = array();
		if($result){
			while($row = $result->fetch_object()){
				$allGender[]=$row;
			}
		}
		return $allGender;
	}

	public function prepare(array $input){
		if (array_key_exists("id", $input)) {
			$this->id = $input["id"];
		}
		if (array_key_exists("name", $input)) {
			$this->name = $input["name"];
		}
		if (array_key_exists("gender", $input)) {
			$this->gender = $input["gender"];
		}
		return $this;
	}

	public function insertData(){
		$sql = "INSERT INTO `gender` (`name`,`gender`) VALUES ('{$this->name}','{$this->gender}')";
		$result = $this->conn->query($sql);
		if($result){
			Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
			header("Location:index.php");
		}
	}

	public function selectById(){
		$sql = "SELECT * FROM `gender` WHERE `id`={$this->id}";
		$result = $this->conn->query($sql);
		$row = $result->fetch_object();
		return $row;
	}

	public function selectAll(){
		$sql = "SELECT * FROM `gender` WHERE `trash_at` IS NULL";
		$result = $this->conn->query($sql);
		$allData = array();
		if ($result) {
			while($row = $result->fetch_object()){
				$allData[] = $row;
			}
		}
		return $allData;
	}

	public function update(){
		$sql = "UPDATE `gender` SET `name`='{$this->name}',`gender`='{$this->gender}' WHERE `id`={$this->id}";
		$result = $this->conn->query($sql);
		if($result){
			Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
			header("Location:index.php");
		}
	}

	public function delete(){
		$sql = "DELETE FROM `gender` WHERE `id`= {$this->id}";
		$result = $this->conn->query($sql);
		if($result){
			Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
			header("Location:index.php");
		}
	}

	public function trash(){
		$this->trashAt = time();
		$sql = "UPDATE `gender` SET `trash_at` = {$this->trashAt} WHERE `id` = {$this->id}";
		$result = $this->conn->query($sql);
		if($result){
			Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
			header("Location:index.php");
		}
	}

	public function recover(){
		$sql = "UPDATE `gender` SET `trash_at`= NULL WHERE `id`={$this->id}";
		$result = $this->conn->query($sql);
		if($result){
			Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
			header("Location:index.php");
		}else{
			Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
			header("Location:index.php");
		}
	}


	public function trashList(){
		$sql = "SELECT * FROM `gender` WHERE `trash_at` IS NOT NULL";
		$result = $this->conn->query($sql);
		$trashData = array();

		if ($result) {
			while ($row = $result->fetch_object()) {
				$trashData[]=$row;
			}
		}
		return $trashData;
	}

	public function recoverMultiple(array $ids){
		if ( (is_array($ids)) && (count($ids)>0) ) {	
			$IDS = implode(",", $ids);
			$sql = "UPDATE `gender` SET `trash_at` = NULL WHERE `id` IN ({$IDS})";
			$result = $this->conn->query($sql);
			if($result){
				Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
				header("Location:index.php");
			}else{
				Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
				header("Location:index.php");
			}
		}
	}

	public function deleteMultiple(array $ids){
		if( (is_array($ids)) && (count($ids)>0) ){
			$IDS = implode(",", $ids);
			$sql = "DELETE FROM `gender` WHERE `id` IN ({$IDS})";
			$result = $this->conn->query($sql);
			if($result){
				Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong> </div>");
				header("Location:index.php");
			}else{
				Message::message("<div class=\"alert alert-success\"><strong>Sorry! </strong>You are <strong>Fail!</strong> </div>");
				header("Location:index.php");
			}
		}
	}

}