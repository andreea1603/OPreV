<!DOCTYPE html>
<?php
   include('./../../model/functions.php');
   include('./../../model/init.php');
   include('./../../model/db-connect.php');
   echo $_SESSION["conectat"];
   if(!isset($_SESSION["conectat"])){
      echo "cf ssefule";
      header('Location:../login/login.php');
   }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/signUp.css">
        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
        <script src='verificareCredentiale.js'></script>
        <title>OPreV</title>
    </head>
    <body>
        <section class="first">
            <div class="container">
                <div class="logo">
                    <img src="../../pictures/vector-creator.png" alt="">
                </div>
                <div class="signin">
                    <div>
                        <h1 class="register">Register </h1>
                    </div>
                        <p>
                          FirstName
                          <div id="firstName1" class="error">
                          </div>
                          <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Enter your name"></p>
                        <p>
                          Last name
                          <div id="lastName1" class="error">
                          </div>
                          <input type="text"  name="last_name" id="lastName" class="form-control" placeholder="Enter your name"></p>
                        <p>
                          Email
                          <div id="email1" class="error">
                          </div>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                        <p>
                          Password
                          <div id="password1" class="error">
                          </div>
                          <input type="password" name="password"id="password" class="form-control" placeholder="Enter password">
                        </p>
                        <p>
                        <button type="submit" onclick="verificareCredentiale()">Sign UP</button>
                        </p>
                        <div id="reusit" class="error">
                        </div>
                </div>
            </div>
        </section>
    </body>
</html>