<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/sass/style.css"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <title>CultureDev</title>
</head>

<body id="siging">
    

<div class="row-lg h-100 d-flex align-items-center justify-content-center p-5 flex-wrap text-dark">


        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
    <div id="signin" class="col-lg-3">
    
        <div>
            <form action="sign.php" method="POST">
                <p class="signin text-center"> SIGN IN </p>
                <div class="email pt-3">
                    <p>Email Address</p>
                    <input name="email" class="input form form-control" type="email">
                </div>
                <div class="password pt-3">
                    <p>Password</p>
                    <input class="input form form-control" type="password" name="password">
                </div>
                <div class="row justify-content-center mt-3"><button class="btn signing" name="signIN">SIGN IN NOW</button></div>
                <div class="signup text-center mt-4">Don't have an account?<a class="link" href="#" id="sign">Create an account</a>
                </div>
                <div class="privacy text-center mt-4">By clicking on "sign in now" you agree to <a class="link" href="">Privacy Policy</a>
                </div>
            </form>
        </div>
    </div>



<div id="signup" class="col-lg-3">
        <div>
            <form action="sign.php" method="POST">
                <p class="signin text-center"> SIGN UP </p>
                <div class="email pt-3">
                    <p>User Name</p>
                    <input class="input form form-control" type="text" name="user">
                </div>
                <div class="email pt-3">
                    <p>Email Address</p>
                    <input class="input form form-control" type="email" name="email">
                </div>
                <div class="password pt-3">
                    <p>Password</p>
                    <input class="input form form-control" type="password" name="password">
                </div>
                <div class="row justify-content-center mt-3"><button class="btn signing" name="signup">SIGN UP</button></div>
                <div class="privacy text-center mt-4">
                    By clicking on "SIGN UP" you agree to <a class="link" href="">Privacy Policy</a>
                </div>
                </form>
            </div>
        </div>

    </div>




    
        <script src="../assets/scripts/scripts.js"></script>
</body>
</html>