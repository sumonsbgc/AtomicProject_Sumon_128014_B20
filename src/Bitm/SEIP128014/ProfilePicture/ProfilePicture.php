<?php
namespace App\Bitm\SEIP128014\ProfilePicture;
use App\Bitm\SEIP128014\Book\Message;
class ProfilePicture
{
    public $conn;
    public $id;
    public $image;
    public $name;
    public $trashAt;

    public function __construct()
    {
        $this->conn = new \mysqli("localhost","root","","atomicprojectb20");
    }

    public function prepare( array $data){
        if (array_key_exists("id",$data)){
            $this->id = $data['id'];
        }
        if (array_key_exists("image",$data)){
            $this->image = $data['image'];
        }
        if(array_key_exists("name",$data)){
            $this->name = $data['name'];
        }
        return $this;
    }

    public function insertData(){
        $sql = "INSERT INTO `profile`(`name`, `image`) VALUES ('{$this->name}','{$this->image}')";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Success! to Insert</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">Sorry! Not Insert</div>");
            header("Location:index.php");
        }
    }

    public function selectAllData(){
        $sql = "SELECT * FROM `profile` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($sql);
        $selectAll = array();
        if ($result){
            while($row = $result->fetch_object()){
                $selectAll[] = $row;
            }
        }
        return $selectAll;
    }

    public function selectById(){
        $sql = "SELECT * FROM `profile` WHERE `id` = {$this->id}";
        $result = $this->conn->query($sql);
        $row = "";
        if ($result){
            $row = $result->fetch_object();
        }
        return $row;
    }

    public function deleteData(){
        $sql = "DELETE FROM `profile` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Success! to Delete</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">Sorry! Not Delete</div>");
            header("Location:index.php");
        }
    }

    public function updateData(){
        $sql = "UPDATE `profile` SET `name` = '{$this->name}', `image` = '{$this->image}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Success! to Update</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-danger\">Sorry! Not Update</div>");
            header("Location:index.php");
        }
    }

    public function trash(){
        $this->trashAt = time();
        $sql = "UPDATE `profile` SET `trash_at` = '{$this->trashAt}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">Success! to Trash</div>");
            header("Location:index.php");
        } else {
            Message::message("<div class=\"alert alert-danger\">Sorry! Not Trash</div>");
            header("Location:index.php");
        }
    }

    public function trashList(){
        $sql = "SELECT * FROM `profile` WHERE `trash_at` IS NOT NULL";
        $result = $this->conn->query($sql);
        $trashAll= array();
        if ($result){
            while($row= $result->fetch_object()){
                $trashAll[] = $row;
            }
        }
        return $trashAll;
    }
    
    public function recover(){
        $sql = "UPDATE `profile` SET `trash_at` = NULL WHERE `id` = '{$this->id}'";
        $result = $this->conn->query($sql);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">Success! to recover</div>");
            header("Location:index.php");
        } else {
            Message::message("<div class=\"alert alert-danger\">Sorry! Not recover</div>");
            header("Location:index.php");
        }
    }

    public function recoverMultiple($ids){
        if ( (is_array($ids)) && (count($ids)>0) ){
            $IDS = implode(",",$ids);
            $sql = "UPDATE `profile` SET `trash_at` = NULL WHERE `id` IN ({$IDS})";
            $result = $this->conn->query($sql);
            if ($result) {
                Message::message("<div class=\"alert alert-success\">Success! to recover Selected Data</div>");
                header("Location:index.php");
            } else {
                Message::message("<div class=\"alert alert-danger\">Sorry! Not recover</div>");
                header("Location:index.php");
            }
        }
    }

    public function deleteMultiple( array $ids){
        if ( (is_array($ids)) && (count($ids)>0) ){
            $IDS = implode(",",$ids);
            $sql = "DELETE FROM `profile` WHERE `id` IN {$IDS}";
            $result = $this->conn->query($sql);
            if ($result) {
                Message::message("<div class=\"alert alert-success\">Success! to recover Selected Data</div>");
                header("Location:index.php");
            } else {
                Message::message("<div class=\"alert alert-danger\">Sorry! Not recover</div>");
                header("Location:index.php");
            }
        }
    }

}