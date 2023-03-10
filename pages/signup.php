<?php
include '../classes/user.class.php';
if(isset($_POST['signup'])){
    extract($_POST);
$objet = new Admin($email, $password, $username);
$objet->signup();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/sass/style.css"/>
    <title>CultureDev</title>
</head>
<body id="siging">
<div class="row-lg h-100 d-flex align-items-center justify-content-center p-5 flex-wrap text-dark">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div id="signup" class="col-lg-3">
        <div>
            <form action="signup.php" method="POST" class="p-5">
                <p class="signin text-center"> SIGN UP </p>
                <div class="email pt-3">
                    <p>User Name</p>
                    <input class="input form form-control" type="text" name="username" id="username">
                    <small class=""></small>
                </div>
                <div class="email pt-3">
                    <p>Email Address</p>
                    <input class="input form form-control" type="email" name="email" id="email">
                    <small class=""></small>
                </div>
                <div class="password pt-3">
                    <p>Password</p>
                    <input class="input form form-control" type="password" name="password" id="password">
                    <small class=""></small>
                </div>
                <div class="row justify-content-center mt-3"><button class="btn signing" name="signup" id="signin">SIGN UP</button></div>
                <div class="privacy text-center mt-4">
                    By clicking on "SIGN UP" you agree to <a class="link" href="">Privacy Policy</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script src="../assets/scripts/sign.js"></script>