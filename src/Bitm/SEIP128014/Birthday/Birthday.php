<?php namespace App\Bitm\SEIP128014\Birthday;
use App\Bitm\SEIP128014\Book\Message;

class Birthday
{
    public $id;
    public $bday;
    public $trashAt;
    public $name;
    public $conn;
    public $email;
    public $description;
    public $filterByTitle;
    public $filterByDescription;
    public $search;

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
        if(array_key_exists('email',$data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('description',$data)){
            $this->description = $data['description'];
        }
        if (array_key_exists("filterByTitle", $data)) {
            $this->filterByTitle = $data['filterByTitle'];
        }
        if (array_key_exists("filterByDescription", $data)) {
            $this->filterByDescription = $data['filterByDescription'];
        }
        if (array_key_exists("search", $data)) {
            $this->search = $data['search'];
        }

        return $this;
    }

    public function store(){
        $repDate = str_replace("/","-",$this->bday);
        $date = date('Y-m-d', strtotime($repDate));
        $sql = "INSERT INTO `birthday`(`name`, `bday`,`email`,`description`) VALUES ('{$this->name}', '{$date}','{$this->email}','{$this->description}')";
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
        $whereClause= " 1=1 ";
        if(!empty($this->filterByTitle)) {
            $whereClause .= " AND name LIKE '%".$this->filterByTitle."%'";
        }

        if(!empty($this->filterByDescription)){
            $whereClause .= " AND description LIKE '%".$this->filterByDescription."%'";
        }

        if(!empty($this->search)){
            $whereClause .= " AND description LIKE '%".$this->search."%' OR name LIKE '%".$this->search."%'";
        }

        $sql = "SELECT * FROM `birthday` WHERE `trash_at` IS NULL".$whereClause;
        $result = $this->conn->query($sql);
        $bdData = array();
        if ($result){
            while($row = $result->fetch_object()){
                $bdData[] = $row;
            }
        }
        return $bdData;
    }

    public function allName(){
        $_allName= array();
        $query="SELECT name FROM `birthday`";
        $result= $this->conn->query($query);

        while($row = $result->fetch_object()){
            $_allName[]=$row->name;
        }
        return $_allName;
    }
    public function allSummary(){
        $_allName= array();
        $query="SELECT description FROM `birthday`";
        $result= $this->conn->query($query);

        while($row = $result->fetch_object()){
            $_allName[]=$row->description;
        }
        return $_allName;
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
        $repDate = str_replace("/","-",$this->bday);
        $date = date("y-m-d", strtotime($repDate));
        $sql = "UPDATE `birthday` SET `name`='{$this->name}', `bday`='{$date}', `email` = '{$this->email}', `description`= '{$this->description}' WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">Your are <strong>Success!</strong></div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">Your are <strong>Fail!</strong></div>");
            header("Location:index.php");
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
        $sql = "SELECT COUNT(*) AS totalItem FROM `atomicprojectb20`.`birthday` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row->totalItem;
    }

    public function paginator($pageStartFrom=0,$limit=5){
        $sql = "SELECT * FROM `birthday` WHERE `trash_at` IS NULL LIMIT {$pageStartFrom},{$limit}";
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