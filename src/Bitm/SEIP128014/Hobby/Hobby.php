<?php
namespace App\Bitm\SEIP128014\Hobby;
use App\Bitm\SEIP128014\Book\Message;
class Hobby
{
    public $id;
    public $hobby;
    public $name;
    public $conn;


    public function prepare($data){
        if(array_key_exists("id",$data)){
            $this->id = $data["id"];
        }
        if(array_key_exists("hobby",$data)){
            $this->hobby = $data["hobby"];
        }
        if(array_key_exists("name",$data)){
            $this->name = $data["name"];
        }
        return $this;
    }


    public function store(){
        $sql = "INSERT INTO `atomicprojectb20`.`hobby` (`name`,`hobby`) VALUES ( '{$this->name}','{$this->hobby}' )";
        $result = $this->conn->query($sql);
        if($result){
            Message::message("You are Successful to Insert your Data");
            header("Location: index.php");
        }else{
            Message::message("You're not success to Insert your data.");
            header("Location: index.php");
        }
    }

    public function index(){
        $sql = "SELECT * FROM `atomicprojectb20`.`hobby`";
        $result = $this->conn->query($sql);
        $allHobby = array();
        if($result){
            while($row = $result->fetch_object()){
                $allHobby[] = $row;
            }
        }
        return $allHobby;
    }

    public function singleView(){
        $sql = "SELECT * FROM `atomicprojectb20`.`hobby` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        $row="";
        if($result){
            $row = $result->fetch_object();
        }
        return $row;
    }

    public function delete(){
        $sql = "DELETE FROM `atomicprojectb20`.`hobby` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if($result){
            Message::message("You are Successful to Delete your Data");
            header("Location: index.php");
        }else{
            Message::message("You're not success to Delete your data.");
            header("Location: index.php");
        }
    }

    public function update(){
        $sql = "UPDATE `atomicprojectb20`.`hobby` SET `name` = `{$this->name}` `hobby` =`{$this->hobby}` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if($result){
            Message::message("You are Successful to Update your Data");
            header("Location: index.php");
        }else{
            Message::message("You're not success to Update your data.");
            header("Location: index.php");
        }
    }

    public function __construct()
    {
        $this->conn = new \mysqli("localhost","root","","atomicprojectb20") or die ("Sorry Your connection is fail");
    }
}