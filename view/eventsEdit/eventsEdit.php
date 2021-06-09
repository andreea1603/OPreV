<!DOCTYPE html>
<?php
include('../../model/setSession.php');
include('../../model/functionsEditEvents.php');
include('functionsEvents.php');
if(session_status() == PHP_SESSION_NONE){
  //session has not started
  session_start();
}
if(!isset($_SESSION['conectat'])) header("Location: ../login/login.php"); 

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/eventsEdit.css">
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
                    <li><a href=<?php if(!isset($_SESSION['conectat'])) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
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

        <button class="open-button" onclick="openForm()">Adauga Eveniment</button>

        <div class="form-popup" id="myForm">
          <div class="form-container">
            <h1>Adauga Eveniment</h1>
            <p> 
              <label for="file"><b>Imagine Eveniment</b></label>
              <input type="file"  name="informatii" accept="image/*" >
            </p>
             <p>
              <label for="email"><b>Titlu Eveniment</b></label>
              <input type="text" placeholder="Title" name="informatii" required>
            </p>
            <p>
              <label for="psw"><b>Descriere Eveniment</b></label>
              <input type="text" placeholder="Descriere" name="informatii" required>
            </p>
            <button type="submit" class="btn" onclick="addEvent()">Adauga</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Inchide</button>
          </div>
        </div>
    </body>
</html>

<script>
getEventsForEdit();
</script>