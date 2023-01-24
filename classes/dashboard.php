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


        public function addCategory(){
            if (isset($_POST['submit'])) {
                $category = $_POST['category'];
                $a = new Database();
                $a->insert('categories',['categ'=>$category]);
            }
        }
    }
    class Posts{
        private $id = NULL;
        private $user;
        private $title;
        private $article;
        private $img;
        private $category;
        private $datetime;

        public function __construct($title="",$article="",$img="",$category="")
        {
            $this->title = $title;
            $this->article = $article;
            $this->img = $img;
            $this->category = $category;
        }


        public function getId(){
            return $this->id;
        }
        public function getUser(){
            return $this->user;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getArticle(){
            return $this->article;
        }
        public function getImg(){
            return $this->img;
        }
        public function getDateTime(){
            return $this->id;
        }

        public function getCategory(){
            return $this->category;
        }

        public function setUser($id){
            $this->id = $id;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function setArticle($id){
            $this->title = $title;
        }
        public function setImg($id){
            $this->img = $img;
        }
        public function setDateTime($id){
            $this->datetime = $datetime;
        }
        public function setCategory($category){
            $this->category = $category;
        }


        public function addPost(){
            if (isset($_POST['save'])) {
                for($i=0;$i<count($_POST['title']);$i++){
                    $title = $_POST['title'][$i];
                    $article = $_POST['article'][$i];
                    $category = $_POST['categorySelect'][$i];
                    $user = $_POST['user'][$i];
                    $datetime = $_POST['datetime'][$i];
                    $img = $_POST['image'][$i];
                    $post = new Database();
                    $post->insert('post',['user'=>$user,'title'=>$title,'article'=>$article,'image'=>$img,'category'=>$category,'datetime'=>$datetime]);
                }
            
            }
        }
    }







?>