<?php 
include 'database.php';
session_start();

abstract class User extends Database{
    protected $id = NULL;
    protected $username;
    protected $password;
    protected $email;

    public function __construct ($email="" , $password="" , $username="")
    {
        $this->id        = NULL;
        $this->username = $username;
        $this->password  = $password;
        $this->email     = $email;
    }

    public function setusername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getusername(){
        return $this->username ;
    }
    public function getPassword(){
        return $this->password  ;
    }
    public function getEmail(){
        return $this->email  ;
    }
    public function getId(){
        return $this->id;
    }
    
    public function getObject($dbObject){
        $this->id = $dbObject->id;
        $this->username = $dbObject->username;
        $this->password = $dbObject->password;
        $this->email = $dbObject->email;
    }

    public static function viewDashboard(){
        echo "test landing page";
    }


    public function addSession(){
       session_start();
      $_SESSION['name'] = $this->username;
      $_SESSION['id'] = $this->id;
    }
}


class Admin extends User {
    private $matchsReserved = array();

    public function signup(){
        $conn = new Database();
        try{

            $sql1 = "INSERT INTO admin values(NULL,?,?,?)";
            $put = $conn->connection()->prepare($sql1);
            $put->execute([$this->email, $this->username, $this->password]);

            echo"<script>alert('successfully');document.location='../pages/signin.php'</script>";
    
            
        }catch(Exception $e){
            echo 'sdfghjkl';
            return $e->getMessage();
        }
    }

    public function login() { 
        $conn = new Database();

        $sql = "SELECT * FROM admin WHERE email = ? AND password = ?;";
        $stmt =  $conn->connection()->prepare($sql);
        $stmt->execute([$this->email, $this->password]);
        $data = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['name'] = $data['username'];
            $_SESSION['id'] = $data['id'];
            echo"<script>alert('successfully');document.location='../pages/index.php'</script>";
        } else {
            echo"<script>alert('incorrect inputs');document.location='../pages/signin.php'</script>";
        }
    }


    public function logout() {
        if (isset($_SESSION['name'])) {
            session_destroy();
            unset($_SESSION['name']);
            header('location:../pages/signin.php');
        }
    }


}





?>