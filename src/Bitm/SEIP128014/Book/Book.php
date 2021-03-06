<?php
namespace App\Bitm\SEIP128014\Book;
use App\Bitm\SEIP128014\Book\Message;

class Book
{
    public $id;
    public $conn;
    public $title;
    public $created;
    public $modified;
    public $created_at;
    public $modified_at;
    public $deleted_at;
    public $trash_at;
    public $email;
    public $description;
    public $filterByTitle;
    public $filterByDescription;
    public $search;

    public function prepare($data){
        if(array_key_exists("title",$data)){
            $this->title = $data["title"];
        }

        if(array_key_exists("id",$data)){
            $this->id = $data["id"];
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


    public function count(){
        $sql = "SELECT COUNT(*) AS totalItem FROM `atomicprojectb20`.`book` WHERE `trash_at` IS NULL";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row->totalItem;
    }

    public function paginator($pageStartFrom=0,$limit=5){
        $sql = "SELECT * FROM `book` WHERE `trash_at` IS NULL LIMIT {$pageStartFrom},{$limit}";
        $result = $this->conn->query($sql);
        $allBook = array();
        if($result){
            while($row = $result->fetch_object()){
                $allBook[]=$row;
            }
        }
        return $allBook;
    }

    public function index(){
        $whereClause= " 1=1 ";
        if(!empty($this->filterByTitle)) {
            $whereClause .= " AND title LIKE '%".$this->filterByTitle."%'";
        }

        if(!empty($this->filterByDescription)){
            $whereClause .= " AND description LIKE '%".$this->filterByDescription."%'";
        }

        if(!empty($this->search)){
            $whereClause .= " AND description LIKE '%".$this->search."%' OR  title LIKE '%".$this->search."%'";
        }

        $sql = "SELECT * FROM `book` WHERE `trash_at` IS NULL AND ".$whereClause;
        $result = $this->conn->query($sql);
        $return = array();
        if ($result){
            while($row = $result->fetch_object()) {
               $return[] = $row;
            }
        }
        return $return;
    }
    public function allName(){
        $_allName= array();
        $query="SELECT title FROM `book`";
        $result= $this->conn->query($query);

        while($row = $result->fetch_object()){
            $_allName[]=$row->title;
        }
        return $_allName;
    }
    public function allSummary(){
        $_allName= array();
        $query="SELECT description FROM `book`";
        $result= $this->conn->query($query);

        while($row = $result->fetch_object()){
            $_allName[]=$row->description;
        }
        return $_allName;
    }


    public function views(){
        $sql = "SELECT * FROM `book` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row;
    }

    public function edit(){
        $sql = "SELECT * FROM `book` WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        $row = $result->fetch_object();
        return $row;
    }

    public function delete(){
        $sql = "DELETE FROM `atomicprojectb20`.`book` WHERE `book`.`id` = {$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Deleted Data Successfully
                              </div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Deleted Data Successfully
                              </div>");
            header("Location:index.php");
        }
    }

    public function update(){

        $sql = "UPDATE `atomicprojectb20`.`book` SET `title` = '{$this->title}',`email` = '{$this->email}',`description`='{$this->description}' WHERE `book`.`id` = {$this->id}";
        $result = $this->conn->query($sql);
        
        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Updated Data Successfully
                              </div>");
            header("Location: index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Success</strong>
                                You are not Updated Data Successfully
                              </div>");
            header("Location: index.php");
        }
    }

    public function storeData(){
        $query = "INSERT INTO `atomicprojectb20`.`book` (`title`,`email`,`description`) VALUES ('".$this->title."','{$this->email}','{$this->description}')";
        $result = $this->conn->query($query);
        if($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                You Inserted Data Successfully
                              </div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Error!</strong>
                                    You are not success to insert data
                              </div>");
            echo $this->conn->error;
        }
    }

    public function trash(){
        $this->trash_at = time();
        $sql = "UPDATE `book` SET `trash_at`='{$this->trash_at}' WHERE `id` = {$this->id}";
        $result = $this->conn->query($sql);

        if ($result){
            Message::message("<div class=\"alert alert-success\">
                                <strong>Success</strong>
                                    You are Successfully trashed the data
                              </div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\">
                                <strong>Sorry!</strong>
                                    You are not success to trash the data
                              </div>");
            header("Location:index.php");
        }
    }

    public function trashed(){
        $sql = "SELECT * FROM `atomicprojectb20`.`book` WHERE `trash_at` IS NOT NULL";
        $result = $this->conn->query($sql);
        $allTrashed = array();
        if ($result){
            while($row = $result->fetch_object()){
                $allTrashed[] = $row;
            }
        }
        return $allTrashed;
    }

    public function recover(){
        $sql = "UPDATE `atomicprojectb20`.`book` SET `trash_at` = NULL WHERE `id`={$this->id}";
        $result = $this->conn->query($sql);
        if ($result){
            Message::message("<div class=\"alert alert-success\"'><strong>Success! </strong> Your Successfully Recover trash item.</div>");
            header("Location:index.php");
        }else{
            Message::message("<div class=\"alert alert-warning\"'><strong>Success! </strong> Your Successfully Recover trash item.");
            header("Location;index.php");
        }
    }

    public function recoverMultiple($ids){
        if (( is_array($ids) )&& ( count($ids)>0 )){
            $IDS = implode(",", $ids);
            $sql = "UPDATE `atomicprojectb20`.`book` SET `trash_at` = NULL WHERE `id` IN ({$IDS})";
            $result = $this->conn->query($sql);

            if ($result){
                Message::message("<div class=\"alert alert-success\"><strong>Success! You're successfully recovered all selected Item</strong></div>");
                header("Location:index.php");
            }else{
                Message::message("<div class=\"alert alert-warning\"><strong>Sorry!</strong>You're not successful to recovered All Selected Items</div>");
                header("Location:index.php");
            }
        }
    }


    public function deleteMultiple($ids){
        if ((is_array($ids))&&( count($ids)>0)){
            $IDS = implode(",", $ids);
            $sql = "DELETE FROM `atomicprojectb20`.`book` WHERE `book`.`id` IN ({$IDS})";
            $result = $this->conn->query($sql);
            if ($result){
                Message::message("<div class=\"alert alert-success\"><strong>Success! You are Success to Delete All Selected Data</strong></div>");
                header("Location:index.php");
            }else{
                Message::message("<div class=\"alert alert-warning\"><strong>Sorry! You aren't Success to Delete Selected Item</strong></div>");
                header("Location:index.php");
            }
        }
    }


    public function __construct()
    {
        $this->conn = new \mysqli("localhost", "root", "", "atomicprojectb20") or die("Sorry Connection Establish Fail!");
    }


}