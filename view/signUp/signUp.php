<!DOCTYPE html>
<?php
   include('./../../controller/functions.php');
   include('./../../controller/init.php');
   include('./../../controller/db-connect.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/signUp.css">
        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">

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
                    <form action="./../../model/sign-up.php" method="POST">
                        <p>FirstName
                        <input type="text" name="first_name"  class="form-control" placeholder="Enter your name"></p>
                        <p>Last name
                        <input type="text"  name="last_name" class="form-control" placeholder="Enter your name"></p>
                        <p>Email
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
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