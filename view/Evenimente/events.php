<!DOCTYPE html>
<?php
include('../../model/setSession.php');
include('../../model/functionsEditEvents.php');
include('../eventsEdit/functionsEvents.php')

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../styles/events.css">
    <link rel="stylesheet" href="../../styles/style.css">

    <link rel="shortcut icon" href="../../pictures/vector-creator.ico">

    <title>OPreV</title>
</head>

<body>
    <section class="head">
        <ul>
            <li><a href="../Statistici/statistici.php">Statistici</a></li>
            <li><a href="../Evenimente/events.php">Evenimente</a></li>
            <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
            <li><a href=<?php if (!isset($_SESSION['conectat'])) echo "../login/login.php";
                        else echo "../Admin/admin.php"; ?>>Contul meu</a></li>
        </ul>
    </section>
    <div>
        <img id="firstpic" src="../../pictures/poza1.jpg" alt="">
    </div>
    <div class="container">
        <h1>Fii Parte Din Familia Noastra</h1>
    </div>
    <section class="wrapped" id="events">

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
<script>
    getEvents();
</script>