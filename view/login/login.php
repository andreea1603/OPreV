<!DOCTYPE html>
<?php
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/login.css">
        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">

        <title>OPreV</title>
    </head>
    <body>
        <section class="first">
            <div class="container">
                <div class="logo">
                    <img src="../../pictures/logo.png" alt="">
                </div>
                <div class="signin">
                    <div>
                        <h3> Sign in </h3>
                    </div>
                    <form method="post" action="../../controller/log-in.php">
                        <p><input type="text" name="email" class="form-control" placeholder="Enter email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"></p>
                        <p><input type="password" name="password" class="form-control" placeholder="Enter password" required></p>
                        <p><input type="checkbox" name="remember" /> Remember me</p>
                        <button type="submit" id="login-button">Sign in</button>
                    </form>
                    <hr>
                </div>
            </div>
        </section>
    </body>
</html>