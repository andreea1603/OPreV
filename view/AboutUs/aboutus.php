<!DOCTYPE html>
<?php
include('../../model/setSession.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="../../styles/aboutus.css">
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
                    <li><a href=<?php if(!isset($_SESSION['conectat'])) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
                </ul>
            </div>
            <div>
                <img class="imgclassUP" src="../../pictures/Together.png" alt="">
            </div>
            <div class="asTitle">Despre noi</div> <br>
        <div class="paragraph-align">
           <div class="text-align" >
            Obezitatea, recunoscută de curând ca fiind o boală cronică progresivă, reprezintă
            una dintre cele mai mari probleme cu care ne confruntăm. Ea este definită ca fiind
            cantitatea de grasime în exces din corp.
            Rolul nostru principal este de a îmbunătăți gradul de conștientizare a prevenirii și
            gestionării obezității, dar și privind amploarea problemei dezvoltată în ultimii ani
            pe întreaga planetă, afectând atât copii, tineri cât și adulți de toate vârstele. 
        </div>
<div><img class="imgclass" src="../../pictures/obesity-title-image.jpg" alt="Obesity 1"></div>
           
           <div><img class="imgclass" src="../../pictures/Untitled.png" alt="Obesity 2"></div>

           <div class="text-align"> 
            Există studii ce susțin că obezitatea este, până la un punct,
            o condiție moștenită genetic, însă principalul motiv al obezității este reprezentat de stilul 
            de viață nesănătos, ce implică alimentație nepotrivită și instalarea sedentarismului.
            Noi susținem un stil de viață sănătos ce implică minim 30 de minute de mișcare pe zi și o alimentație
            ce include cât mai puțin fast-food și cât mai multe fructe și legume. Recomandăm, de asemenea, consumul
            a 2l de apă pe zi.

            
            
        </div>

        </div>
        </div>
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