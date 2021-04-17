<!DOCTYPE html>
<?php
   include('D:\Xamp\htdocs\Tehnologiiweb\tw\OPreV\controller\functions.php');
   include('D:\Xamp\htdocs\Tehnologiiweb\tw\OPreV\controller\init.php');
   include('D:\Xamp\htdocs\Tehnologiiweb\tw\OPreV\controller\db-connect.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="signUp.css">
        <link rel="shortcut icon" href="../vector-creator.ico">

        <title>OPreV</title>
    </head>
    <body>
        <section class="first">
            <div class="container">
                <div class="logo">
                    <img src="../../MainPage/vector-creator.png" alt="">
                </div>
                <div class="signin">
                    <div>
                        <h1 class="register">Register </h1>
                    </div>
                    <form action="./../../model/sign-up.php" method="POST">
                        <p>Username
                        <input type="text" name="email" class="form-control" placeholder="Enter your name">                        </p>
                        <p>Email
                        <input type="email" class="form-control" placeholder="Enter email">
                        <p>Password
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </p>
                        <button type="submit">Sign UP</button>
                    </form>       
                </div>
            </div>
        </section>
    </body>
</html>