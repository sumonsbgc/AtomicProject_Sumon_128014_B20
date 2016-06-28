<?php
namespace App\Bitm\SEIP128014\Summary;
use App\Bitm\SEIP128014\Book\Message;
class Summary
{
    public $conn;
    public $id;
    public $name;
    public $summary;
    public $trashAt;

    public function __construct()
    {
        $this->conn = new \mysqli("localhost","root","","atomicprojectb20") or die("Sorry Connection Fail");
    }

    public function prepare(array $data){
        if (array_key_exists("id",$data)){
            $this->id = $data["id"];
        }
        if (array_key_exists("name",$data)){
            $this->name = $data["name"];
        }
        if (array_key_exists("summary",$data)){
            $this->summary = $data["summary"];
        }
        return $this;
    }

    public function count(){
        $sql = "SELECT COUNT(*) AS totalItem FROM `atomicprojectb20`.`summary`";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row->totalItem;
    }

    public function paginator($pageStartFrom=0,$limit=5){
        $sql = "SELECT * FROM `summary` LIMIT {$pageStartFrom}, {$limit}";
        $result = $this->conn->query($sql);
        $allSummary = array();
        if($result){
            while($row = $result->fetch_object()){
                $allSummary[]=$row;
            }
        }
        return $allSummary;
    }


    public function store(){
        $sql = "INSERT INTO `summary` (`name`,`summary`) VALUES ('{$this->name}','{$this->summary}')";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function selectAll(){
        $sql = "SELECT * FROM `summary` WHERE `trash_at` IS NULL ";
        $result = $this->conn->query($sql);
        $singleItem = array();
        if ($result){
            while($row = $result->fetch_object()){
                $singleItem[] = $row;
            }
        }
        return $singleItem;
    }

    public function selectById(){
        $sql = "SELECT * FROM `summary` WHERE `id` = {$this->id}";
        $result =$this->conn->query($sql);
        $row = $result->fetch_object();
        return $row;
    }


    public function delete(){
        $sql = "DELETE FROM `summary` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function update(){
        $sql = "UPDATE `summary` SET `name`='{$this->name}',`summary` = '{$this->summary}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function trash(){
        $this->trashAt = time();
        $sql = "UPDATE `summary` SET `trash_at`= {$this->trashAt} WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function recover(){
        $sql = "UPDATE `summary` SET `trash_at` = NULL WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
        }else{
            Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
        }
    }

    public function trashList(){
        $sql = "SELECT * FROM `summary` WHERE `trash_at` IS NOT NULL";
        $result = $this->conn->query($sql);
        $trashData = array();
        if ($result){
            while($row = $result->fetch_object()){
                $trashData[]=$row;
            }
        }
        return $trashData;
    }


    public function recoverMultiple(array $ids){
        if ( (is_array($ids)) && (count($ids)>0) ){
            $IDS=implode(",",$ids);
            $sql= "UPDATE `summary` SET `trash_at`= NULL WHERE `id` IN ({$IDS})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
                header("Location:index.php");
            }else{
                Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
                header("Location:index.php");
            }
        }
    }


    public function deleteMultiple(array $ids){
        if ( (is_array($ids)) && (count($ids))){
            $IDS = implode(",",$ids);
            $sql = "DELETE FROM `summary` WHERE `id` IN ({$IDS})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div class=\"alert alert-success\">You are <strong>Success!</strong></div>");
                header("Location:index.php");
            }else{
                Message::message("<div class=\"alert alert-danger\">You are <strong>Fail!</strong></div>");
                header("Location:index.php");
            }
        }
    }
}