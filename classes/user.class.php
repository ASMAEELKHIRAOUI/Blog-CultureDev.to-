<?php 
include 'database.php';

// class User extends Database{
//     private $id;
//     private $username;
//     private $email;
//     private $password;
// }
    // function __construct($username, $password, $email){
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->email = $email;
    // }
//     function login($email, $password) {
//         // $conn= $this->connection();
//         // $this->email = $email;
//         // $this->password = $password;
//         // $sql = "SELECT * FROM admin WHERE email = :email";
//         // $stmt = $this->conn->prepare($sql);
//         // $stmt->bindParam(':email', $this->email);
//         // $stmt->execute();
//         // $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         // if ($result) {
//         //     if (password_verify($this->password, $result['password'])) {
//         //         // $_SESSION['id'] = $result['id'];
//         //         // $_SESSION['email'] = $result['email'];
//         //         $_SESSION['fullName'] = $result['username'];
//         //         header('Location: ../pages/index.php');
//         //     } else {
//         //         $_SESSION['passwordError'] = 'Wrong password.';
//         //     }
//         // } else {
//         //     $_SESSION['emailError'] = 'This email does not exist.';
//         // }


//     //     if (isset($_POST['email']) && isset($_POST['password'])) {
//     //         $email = $_POST['email'];
//     //         $password = $_POST['password'];
//     //         $sql = "SELECT * FROM admin WHERE email = :email";
//     //         $stmt = $this->connect->prepare($sql);
//     //         $stmt->bindParam(':email', $this->email);
//     //         $stmt->execute();
//     //         $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     //         if ($result) {
//     //             if($password == $result['password']){
//     //             session_start();
//     //             $_SESSION['username'] = $username;
//     //             header("Location: ../pages/index.php");
//     //             }
//     //         } else {
//     //             echo "Invalid username or password";
//     //         }
//     //     }
//     }
//     function signup($email, $password, $username){
//         // $conn= $this->connection();
//         $this->email = $email;
//         $this->password = $password;
//         $this->username = $username;
//         //check if email already exists
//         // $sql = "SELECT * FROM admin WHERE email = :email";
//         // $stmt = $this->db->prepare($sql);
//         // $stmt->bindParam(':email', $this->email);
//         // $stmt->execute();
//         // $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         // if ($result) {
//         //     // $_SESSION['emailError'] = 'Email already exists.';
//         // } else {
//             $sql = "INSERT INTO admin VALUES (:email, :password, :username)";
//             $stmt = $this->db->prepare($sql);
//             $stmt->bindParam(':email', $this->email);
//             $stmt->bindParam(':password', $this->password);
//             $stmt->bindParam(':username', $this->username);
//             $stmt->execute();
//             $_SESSION['registerSuccess'] = 'Registration Successful. Please login.';
//             header('Location: ../pages/signin.php');
//         // }


//     }







// }

// // class User {
// //     private $username;
// //     private $password;

// //     public function __construct($username, $password) {
// //         $this->username = $username;
// //         $this->password = $password;
// //     }

// //     // public function checkCredentials() {
// //     //     // Connect to database and check if the entered
// //     //     // username and password match a record
// //     //     // return true if they match, false otherwise
// //     // }
// // }

// // class Login extends User{
// //     function login() {
// //         $conn= $this->connection();
// //         if (isset($_POST['email']) && isset($_POST['password'])) {
// //             $email = $_POST['email'];
// //             $password = $_POST['password'];
// //             $sql = "SELECT * FROM admin WHERE email = :email";
// //             $stmt = $this->connect->prepare($sql);
// //             $stmt->bindParam(':email', $this->email);
// //             $stmt->execute();
// //             $result = $stmt->fetch(PDO::FETCH_ASSOC);
// //             if ($result) {
// //                 if($password == $result['password']){
// //                 session_start();
// //                 $_SESSION['username'] = $username;
// //                 header("Location: ../pages/index.php");
// //                 }
// //             } else {
// //                 echo "Invalid username or password";
// //             }
// //         }
// //     }
// // }

//         // $stmt = $this->con->prepare($sql);
//         // $stmt->bindParam(':email', $this->email);
//         // $stmt->execute();
//         // $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         // if ($result) {
//         //     if (password_verify($this->password, $result['password'])) {
//         //         $_SESSION['id'] = $result['id'];
//         //         $_SESSION['email'] = $result['email'];
//         //         $_SESSION['fullName'] = $result['username'];
//         //         header('Location: /Blog-CultureDev.to/pages/dashboard.php');
//         //     } else {
//         //         $_SESSION['passwordError'] = 'Wrong password.';
//         //     }
//         // } else {
//         //     $_SESSION['emailError'] = 'This email does not exist.';
//         // }


// $login = new User();
// $login->login();


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
        $this->username = $fn;
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


class Spectateur extends User {
    private $matchsReserved = array();
    //crud


    // public function isExistAdmin($email){
    //     $database = new Database();
    //     $sql = "SELECT * FROM `admin` WHERE email =?";

    //     $stmt = $database->connect()->prepare($sql);
    //     $stmt->execute([$email]);

    //     return $stmt->rowCount();
        
    // }

    public function signup(){
        $conn = new Database();
        try{

            $sql1 = "INSERT INTO admin values(NULL,?,?,?)";
            $put = $conn->connection()->prepare($sql1);
            $put->execute([$this->username, $this->email, $this->password]);

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
            echo"<script>alert('incorrect inputs');document.location='../pages/signup.php'</script>";
        }
    }


    // public function loginAdmin() { 
    //     $conn = new Database();

    //     $sql = "SELECT * FROM `admin` WHERE email = ? AND password = ?;";
    //     $stmt =  $conn->connect()->prepare($sql);
    //     $stmt->execute([$this->email, $this->password]);
    //     $admin = $stmt -> fetch(PDO::FETCH_ASSOC);
    //     if ($stmt->rowCount() > 0) {
            
    //         $_SESSION['name'] = $admin['first_name'];
    //         $_SESSION['last-name'] = $admin['last_name'];
    //         $_SESSION['id'] = $admin['id'];
    //         $_SESSION['roll'] = 'admin';

    //         echo"<script>alert('successfully');document.location='../pages/dashboard.php'</script>";
    //     } else {
    //         echo"<script>alert('incorrect inputs');document.location='../pages/signin.php'</script>";
    //     }
    // }
    

    // public function logOut() {
    //     if (isset($_SESSION['name'])) {
    //         session_destroy();
    //         // unset($_SESSION['name']);
    //         // header('location:../pages/signin.php');
    //         echo"<script>alert('successfully');document.location='../pages/signin.php'</script>";
    //     }
    // }
    
    
    // public function getSpectateur()
    // {
    //     $sql = "SELECT * FROM spectator WHERE id = $this->id";
    //     $conn = Database::connect();
    //     $stmt = $conn->prepare($sql); 
    //     $stmt->execute();   
    //     $arr =  $stmt->fetch(PDO::FETCH_ASSOC);
    //     //var_dump($arr);

    //     $this->setFirstName($arr['first_name']);
    //     $this->setLastName($arr['last_name']);
    //     $this->setEmail($arr['email']);
    //     $this->setPassword($arr['password']);
    
    // }
    // public function getOldReservation()
    // {
    //     //!!!!!!!!!!!!!!modify this content !!!!!!!!!!!!! 

    //     $sql = "SELECT * FROM spectator WHERE id = $this->id";
    //     $conn = Database::connect();
    //     $stmt = $conn->prepare($sql); 
    //     $stmt->execute();   
    //     $arr =  $stmt->fetch(PDO::FETCH_ASSOC);
    //     //var_dump($arr);

    //     $this->setFirstName($arr['first_name']);
    //     $this->setLastName($arr['last_name']);
    //     $this->setEmail($arr['email']);
    //     $this->setPassword($arr['password']);
    
    // }


    // public function updateSpectateur()
    // {        
    //     $id = $_POST['id'];
    //     $firstName   = $_POST['firstName'];
    //     $lastName    = $_POST['lastName'];  
    //     $email       = $_POST['email'];
    //     $password    = $_POST['password'];
        
    //     $sql = "UPDATE `spectator` 
    //                 SET first_name='$firstName', last_name='$lastName',
    //                 email='$email',password='$password' WHERE id = $this->id";
    //     $conn = Database::connect();
    //     $stmt = $conn->prepare($sql); 
    //     $stmt->execute();

    //     // session_destroy();
    //     // session_start();

    //     $_SESSION['name'] = $firstName;
    //     // $_SESSION['id'] = $id;
    //     $_SESSION['last-name'] = $lastName;
    //     $_SESSION['roll'] = 'spectator';

    //     header('location: ../pages/landingpage.php');
    // }

    // public function deleteSpectateur()
    // {
    //     $sql = "DELETE  FROM `spectator` WHERE id = $this->id";
    //     $conn = Database::connect();
    //     $stmt = $conn->prepare($sql); 
    //     $stmt->execute();
    //     session_destroy();
    //     header('location: ../pages/landingpage.php');
    // }

    // public function cancel_changes()
    // {
    //     header('location: ../pages/editprofile.php');
    // }

    // public function setReservation($matchId){
    //     include_once 'match.class.php';

    //     $ticket = new Ticket( $this->id ,$matchId);

    //     // if(!array_search($match , $this->matchsReserved)){
    //         $ticket->add();
    //         $this->matchsReserved  =  $ticket->gets();
    //     // } else echo "this match is alredy reserved";

    // }

    // public function getMatchsReserved(){
    //     include_once 'match.class.php';


    //     $ticket = new Ticket( $this->id );

    //     $this->matchsReserved  =  $ticket->gets();


    //     return $this->matchsReserved;
    // }


    // public function getMatchReserved($matchId){
    //     include_once 'match.class.php';

    //     $ticket = new Ticket( $this->id );

    //     $this->matchsReserved  =  $ticket->get($matchId);


    //     return $this->matchsReserved;
    // }




}





?>