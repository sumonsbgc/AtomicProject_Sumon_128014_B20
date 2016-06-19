<?php
namespace App\Bitm\SEIP128014\Email;
use App\Bitm\SEIP128014\Book\Message;

class Email
{
    public $id;
    public $conn;
    public $email;
    public $created;
    public $modified;
    public $created_at;
    public $modified_at;
    public $deleted_at;
    public $trashAt;


    
    public function prepare($data){
        if(array_key_exists("email",$data)){
            $this->email = $data["email"];
        }
        if (array_key_exists("id",$data)){
            $this->id = $data["id"];
        }
        return $this;
    }

    public function storeData(){
        $query = "INSERT INTO `atomicprojectb20`.`email` (`email`) VALUES ('".$this->email."')";
        $result = $this->conn->query($query);
        if ($result){
            Message::message("<div class=\"alert alert-success\"><strong>Success!</strong>Insert Successfully</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\"><strong>Sorry!</strong>Your can't Insert Successfully</div>");
            header("Location:index.php");
        }
    }

    public function index(){
        $sql = "SELECT * FROM `email` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($sql);
        $allEmail = array();

        if ($result){
            while($row = $result->fetch_object()){
                $allEmail[] = $row;
            }
        }
        return $allEmail;
    }

    
    public function views(){
        $sql = "SELECT * FROM `email` WHERE id={$this->id}";
        $result = $this->conn->query($sql);
        $row = "";
        if ($result){
            $row = $result->fetch_object();
        }
        return $row;
    }

    public function edit(){
        $sql = "UPDATE `email` SET `email`= '{$this->email}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\"><strong>Success!</strong>Update Successfully</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\"><strong>Sorry!</strong>Your can't Update Successfully</div>");
            header("Location:index.php");
        }
    }

    public function delete(){
        $sql = "DELETE FROM `email` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\"><strong>Success!</strong>Delete Successfully</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\"><strong>Sorry!</strong>Your can't Delete Successfully</div>");
            header("Location:index.php");
        }
    }

    public function trash(){
        $this->trashAt = time();
        $sql = "UPDATE `email` SET `trash_at`={$this->trashAt} WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\"><strong>Success!</strong>Trash Successfully</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\"><strong>Sorry!</strong>Your can't Trash Successfully</div>");
            header("Location:index.php");
        }
    }

    public function trashList(){
        $sql = "SELECT * FROM `email` WHERE `trash_at` IS NOT NULL";
        $result = $this->conn->query($sql);
        $AllTrash = array();
        if ($result){
            while($row = $result->fetch_object()){
                $AllTrash[] = $row;
            }
        }
        return $AllTrash;
    }

    public function recover(){

        $sql = "UPDATE `email` SET `trash_at` = NULL WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\"><strong>Success!</strong>Recover Successfully</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\"><strong>Sorry!</strong>Your can't Recover Successfully</div>");
            header("Location:index.php");
        }
    }

    public function recoverMultiple($IDS){
        if ( (is_array($IDS)) && (count($IDS)>0) ){
            $ids = implode(",", $IDS);
            $sql = "UPDATE `atomicprojectb20`.`email` SET `trash_at` = NULL WHERE `id` IN ({$ids})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div>You're <strong>Success!</strong> To Recover All Selected Item</div>");
                header("Location:index.php");
            }else{
                Message::message("<div>You're not <strong>Success!</strong> To Recover All Selected Item</div>");
                header("Location:index.php");
            }
        }
    }


    public function deleteMultiple($IDS){
        if ( (is_array($IDS)) && (count($IDS)>0) ){
            $ids = implode(",",$IDS);
            $sql = "DELETE FROM `atomicprojectb20`.`email` WHERE `email`.`id` IN ({$ids})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div>You're <strong>Success!</strong> To Delete All Selected Item</div>");
                header("Location:index.php");
            }else{
                Message::message("<div>You're not <strong>Success!</strong> To Delete All Selected Item</div>");
                header("Location:index.php");
            }
        }
    }


    public function __construct()
    {
        $this->conn = new \mysqli("localhost","root","","atomicprojectb20") or die("Database Connection Establish Fail.");
    }

}