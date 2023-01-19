<?php
include_once 'database.php';
    class Categories{

        private $id = NULL;
        private $category;

        public function __construct($category="")
        {
            $this->category = $category;
        }


        public function getId(){
            return $this->id;
        }

        public function getCategory(){
            return $this->category;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setCategory($category){
            $this->category = $category;
        }


        // public function getObject($id, $category){
        //     $this->id = $id->id;
        //     $this->category = $category->category;
        // }


        // crud same as jointure (d'ont us jointure jus use this SVP ) all you need is here  : abdellah

        // public function getTeame_1_obj(){
        //     $database = new Database();
        //     $sql = "SELECT * FROM `category` WHERE id=?";
        //     $stmt = $database->connection()->prepare($sql);
        //     $stmt->execute([$this->category]);
        //     $dbTeames_1 = $stmt->fetch(PDO::FETCH_OBJ);

        //     include_once 'teame.class.php';
        //     $teme_1 = new Team();
        //     $teme_1->getObject($dbTeames_1);
        //     return $teme_1;
        // }

        // public function getTeame_2_obj(){
        //     $database = new Database();
        //     $sql = "SELECT * FROM `team` WHERE id=?";
        //     $stmt = $database->connect()->prepare($sql);
        //     $stmt->execute([$this->matchTeame_2_id]);
        //     $dbTeames_2 = $stmt->fetch(PDO::FETCH_OBJ);

        //     include_once 'teame.class.php';
        //     $teme_2 = new Team();
        //     $teme_2->getObject($dbTeames_2);

        //     return $teme_2;
        // }

        // public function getStaduim_obj(){
        //     $database = new Database();
        //     $sql = "SELECT * FROM `stad` WHERE id=?";
        //     $stmt = $database->connect()->prepare($sql);
        //     $stmt->execute([$this->matchStaduim_id]);
        //     $dbStaduim = $stmt->fetch(PDO::FETCH_OBJ);
        //     include_once 'stad.class.php';
        //     $staduim = new Stad();
        //     $staduim->getObject($dbStaduim);

        //     return $staduim;
        // }

        // public function getMatcheasma($id){ // cette function n'est pas fonctionné
        //     $database = new Database();
        //     $sql = "SELECT * FROM matches where id = ?";
        //     $stmt = $database->connect()->prepare($sql);
        //     $stmt->execute([$id]);
        //     if($stmt){
        //         $row = $stmt->fetch();
        //         $this->setId($row['id']);
        //         $this->setDateTime($row['datetime']);
        //         $this->seTeame_1_ID($row['match_team1']);
        //         $this->seTeame_2_ID($row['match_team2']);
        //         $this->setStaduimID($row['stad']);
        //         $this->setprice($row['price']);
        //         $this->setdescription($row['description']);
        //         return $row;
        //         }
        // }

        //crud
        // public static function getMatch($id){ 
        //     $database = new Database();
        //     $sql = "SELECT * FROM `matches` WHERE id=?";  
        //     $stmt = $database->connect()->prepare($sql);
        //     $stmt->execute([$id]);
        //     $dbMatch = $stmt->fetch(PDO::FETCH_OBJ);
            
        //     $match = new Matches();
        //     $match->getObject($dbMatch);

        //     return $match;
        // }

            


        public function addCategory(){
            // $conn = new Database();
            // $sql = "INSERT INTO categories(category) VALUES(?)";
            // $conn= $conn->connection()->prepare($sql)->execute([$this->category]);
            // if (isset($_POST['submit'])) {
            //     $category = $_POST['name'];
        
            //     $a = new Database();
            //     $a->insert('data',['category'=>$category,'email'=>$email,'phone'=>$phone,'subject'=>$subject,'message'=>$message,'created'=>$date,'updated'=>$not]);
            //     if ($a == true) {
            //         header('location:index.php');
            //     }
            // }

            if (isset($_POST['save'])) {
                $category = $_POST['category'];
        
                $a = new Database();
                $a->insert('categories',['categ'=>$category]);
                if ($a == true) {
                }
            }



            // $conn->execute([$this->matchTeame_1_id,$this->matchTeame_2_id ,$this->matchStaduim_id,$this->price,$this->description,$this->dateTime,$this->code]);
        }


        

        // public function getCategories(){
        //     $conn = new Database();
        //     $sql = "SELECT * FROM categories";  
        //     $stmt = $conn->connection()->prepare($sql);
        //     $stmt->execute();
        //     $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

        //     $cats = array();
            
        //     $i=0;
        //     foreach($categories as $category){
        //         $cats[$i] = new Categories();
        //         // $cats[$i]->getId();
        //         $cats[$i]->getCategory();
        //         $i++;
        //     }

        //     return $cats;

        // }

        // public function updateMatch($id){
        //     $database = new Database();
        //     $query="UPDATE matches SET match_team1=? , match_team2=? , stad=? , price=? , description=? , datetime=? WHERE id=?";
        //     $result = $database->connect()->prepare($query);
        //     $result->execute([$this->getTeame_1_ID(),$this->getTeame_2_ID(), $this->getStaduimID(), $this->getprice() ,$this->getdescription() ,$this->getDateTime(), $id]);
        //     if($result)
        //         header('location: dashboard.php');
        // }


        // public function deleteMatch($id){
        //     $database =new Database();
        //     $query="DELETE FROM matches WHERE id=?";
        //     $result = $database->connect()->prepare($query);
        //     $result->execute([$id]);
        //     if($result)
        //         header('location: dashboard.php');
        // }

        // public static function  search($property , $data){
        //     $database = new Database();
        //     $sql = "SELECT m.*,t_1.country , t_2.country  FROM matches m INNER JOIN team t_1 ON m.match_team1 = t_1.id 
        //     INNER JOIN team t_2 ON m.match_team2 = t_2.id 
        //     WHERE t_1.$property LIKE '$data%' OR t_2.$property LIKE '$data%' ";  
        //     $stmt = $database->connect()->prepare($sql);
        //     $stmt->execute();
        //     $dbMatchs = $stmt->fetchAll(PDO::FETCH_OBJ);

        //     $matchs = array();
            
        //     $i=0;
        //     foreach($dbMatchs as $dbmatch){
        //         $dbDate = date('Y-m-d', strtotime($dbmatch->datetime));
        //         $dbTime = date('H:i', strtotime($dbmatch->datetime));
        //         if($dbDate > date('Y-m-d')){
        //             $matchs[$i] = new Matches();
        //             $matchs[$i]->getObject($dbmatch);
        //             $i++;
        //         }
        //         else if($dbDate == date('Y-m-d') && $dbTime >= date('H:i')){
        //             $matchs[$i] = new Matches();
        //             $matchs[$i]->getObject($dbmatch);
        //             $i++;
        //         }
                
        //     }

            

        //     return $matchs;
        // }
        
    }







?>