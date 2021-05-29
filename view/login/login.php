<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/login.css">
        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
        <script src='../signUp/verificareCredentiale.js'></script>
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
                        <p><input type="text" name="email" id="Email" class="form-control" placeholder="Enter email"></p>
                        <p><input type="password" name="password" id="Password" class="form-control" placeholder="Enter password"></p>
                        <div id="gresit" class="error"></div>
                        <button type="submit" id="login-button" onclick="verificareCredentialeLogin()">Sign in</button>
                    <hr>
                </div>
            </div>
        </section>
    </body>
</html>