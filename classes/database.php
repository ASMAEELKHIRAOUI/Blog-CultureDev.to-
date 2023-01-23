<?php

class Database{
    public function connection(){
      try {
         $db = new PDO("mysql:host=localhost;dbname=culturedev","root","");
        $db ->exec("set names utf8");
        $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db ;
        
      } catch (PDOException $e) {
        echo "rrrr".$e;
      }
      
    }
    public function insert($table,$para=array()){
      $table_columns = implode(',', array_keys($para));
      $table_value = implode("','", $para);

      $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";
      $pdo = $this->connection();
      $query = $pdo->prepare($sql);
      $query->execute();
      header('location:../pages/index.php');
  }
  public function update($table,$para=array(),$id){
    $args = array();

    foreach ($para as $key => $value) {
        $args[] = "$key = '$value'"; 
    }

    $sql="UPDATE  $table SET " . implode(',', $args);

    $sql .=" WHERE $id";

    $pdo = $this->connection();
      $query = $pdo->prepare($sql);
      $query->execute();
}

public function delete($table,$id){
    $sql="DELETE FROM $table";
    $sql .=" WHERE $id ";
    $sql;
    $pdo = $this->connection();
      $query = $pdo->prepare($sql);
      $query->execute();
      header('location:../pages/index.php');
}

public $sql;

public function getCategory($table,$rows="*",$where = null){
    if ($where != null) {
        $sql="SELECT $rows FROM $table WHERE $where";
    }else{
        $sql="SELECT $rows FROM $table";
    }

    $this->sql = $result = $this->connection()->query($sql);
  }
}

?>