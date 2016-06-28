<?php namespace App\Bitm\SEIP128014\Birthday;
use App\Bitm\SEIP128014\Book\Message;

class Birthday
{
    public $id;
    public $bday;
    public $trashAt;
    public $name;
    public $conn;


    public function prepare(array $data){
        if (array_key_exists('name',$data)){
            $this->name = $data['name'];
        }

        if (array_key_exists('id',$data)){
            $this->id = $data['id'];
        }

        if (array_key_exists('bday',$data)){
            $this->bday = $data['bday'];
        }

        return $this;
    }

    public function store(){
        $sql = "INSERT INTO `birthday`(`name`, `bday`) VALUES ('{$this->name}', '{$this->bday}')";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function selectAll(){
        $sql = "SELECT * FROM `birthday` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($sql);
        $bdData = array();
        if ($result){
            while($row = $result->fetch_object()){
                $bdData[] = $row;
            }
        }
        return $bdData;
    }

    public function selectById(){
        $sql = "SELECT * FROM `birthday` WHERE `id` = {$this->id}";
        $result =$this->conn->query($sql);
        $row = $result->fetch_object();
        return $row;
    }

    public function delete(){
        $sql = "DELETE FROM `birthday` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function update(){
        $sql = "UPDATE `birthday` SET `name`='{$this->name}', `bday`='{$this->bday}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
            //header("Location:index.php");
        }
    }

    public function trash(){
        $this->trashAt = time();
        $sql= "UPDATE `birthday` SET `trash_at` = {$this->trashAt} WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function trashList(){
        $sql = "SELECT * FROM `birthday` WHERE `trash_at` IS NOT NULL";
        $result = $this->conn->query($sql);
        $trashAll = array();
        if ($result){
            while($row = $result->fetch_object()){
                $trashAll[]=$row;
            }
        }
        return $trashAll;
    }

    public function recover(){
        $sql = "UPDATE `birthday` SET `trash_at` = NULL WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
            header("Location:index.php");
        }
    }

    public function deleteMultiple(array $ids){
        if ( (is_array($ids)) && (count($ids)>0) ){
            $IDS = implode(",",$ids);
            $sql="DELETE FROM `birthday` WHERE `id` IN ({$IDS})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
                header("Location:index.php");
            }else{
                Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
                header("Location:index.php");
            }
        }
    }

    public function recoverMultiple(array $ids){
        if ( (is_array($ids)) && (count($ids)>0) ){
            $IDS = implode(",",$ids);
            $sql="UPDATE `birthday` SET `trash_at` = NULL WHERE `id` IN ({$IDS})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
                header("Location:index.php");
            }else{
                Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
                header("Location:index.php");
            }
        }
    }

    public function count(){
        $sql = "SELECT COUNT(*) AS totalItem FROM `atomicprojectb20`.`birthday`";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row->totalItem;
    }

    public function paginator($pageStartFrom=0,$limit=5){
        $sql = "SELECT * FROM `birthday` LIMIT {$pageStartFrom},{$limit}";
        $result = $this->conn->query($sql);
        $allBday = array();
        if($result){
            while($row = $result->fetch_object()){
                $allBday[]=$row;
            }
        }
        return $allBday;
    }


    public function __construct()
    {
        $this->conn = new \mysqli("localhost","root","","atomicprojectb20") or die("Sorry Connection Fail.");
    }



}