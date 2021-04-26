<!DOCTYPE html>
<?php
include('../../controller/init.php');
include('../../controller/functions.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/admin.css">
        <link rel="stylesheet" href="../../styles/style.css">

        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
        <title>OPreV</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="head">
                <ul>
                <li><a href="../Statistici/statistici.php">Statistici</a></li>
                    <li><a href="../Evenimente/events.php">Evenimente</a></li>
                    <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
                    <li><a href=<?php if(!$_SESSION['conectat']) echo "../login/login.php"; else echo "#";?>>Contul meu</a></li>
                </ul>
            </div>
        </div>
        <div class="asTitle"> <br>Contul meu </div>
        <section class="first">
        <div class="container">
        <table  class="tableStyle">
            <tr>
                <td><p class="textSize"><i>Nume:</i> </p></td>
                <td> <p class="textSize"><?php echo $_SESSION['firstname'];?></p> </td>
            </tr>
            <tr>
                <td><p class="textSize"><i>Prenume:</i></p></td>
                <td><p class="textSize"><?php echo $_SESSION['lastname'];?></p></td>
            </tr>
            <tr>
                <td><p class="textSize"><i>Email:</i></p></td>
                <td><p class="textSize"><?php   echo $_SESSION['email'];?></p></td>
            </tr>
            <tr>
                <td><p class="textSize"><i>Tip cont: </i></p></td>
                <td><p class="textSize">Administrator</p></td>
            </tr>
            <tr>
                <td></td><td></td>
            </tr>
            <tr>
                    <td></td>
                <td><a href="../../view/eventsEdit/eventsEdit.php">Editeaza evenimente</a></td>
            </tr>
            <tr> 
                                   <td></td>
                <td><a href="../../view/StatisticiEdit/statisticiEdit.php">Editeaza date</a></td>
            </tr>
             <tr>                    <td></td>
                <td>Log out</td>
            </tr>
        </table>
        </div>

    </section>
    <footer class="fotr">
        <div class="footerAlign">
            <ul>
                <li>
                        <a href="../../Documentation/scholarly.html">
                                Documentatie
                        </a>
                    </li>
                    <li>
                        <a href="../MainPage/main.php">
                            Acasa
                        </a>
                </li>
            </ul>
        </div>
    </footer>
    </body>
</html>