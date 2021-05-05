<!DOCTYPE html>
<?php
include('../../controller/init.php');
include('../../controller/functions.php');
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
            <h1>Fi Parte Din Familia Noastra</h1>
        </div>
        <section class="wrapped">
            <div>
                <ul>
                    <li><img src="../../pictures/eveniment1.jpg" alt=""></li>
                    <li><h2> Maraton de alergat in parc </h2></li>
                    <li class="event-text"> Săptămânal, au loc antrenamente pentru cei care doresc să se pregatească din timp pentru probele de maraton și semimaraton de la Wizz Air Cluj-Napoca Marathon din data de 15 aprilie 2021. Participă cu precădere cei care au fost selectați în programul special de antrenamente Primul Maraton sau Semimaraton.
                        În fiecare duminică, oricine poate participa la aceste antrenamente.</li>
                    <li><button class="button3">Sterge Eveniment</button></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><img src="../../pictures/eveniment2.jpg" alt=""></li>
                    <li><h2> Ziua Mondiala a Sanatatii 2021 </h2></li>
                    <li class="event-text"> De Ziua Mondială a Sănătății, 7 aprilie 2021, vă vom invita să vă alăturați unei noi campanii de construire a unei lumi mai corecte și mai sănătoase.te noua...</li>
                    <li><button class="button3">Sterge Eveniment</button></li>    
                </ul>
            </div><div>
                <ul>
                    <li><img src="../../pictures/eveniment3.jpg" alt=""></li>
                    <li><h2>Webinar - Un apel urgent pentru a lucra împreună pentru a combate inechitățile în materie de sănătate </h2></li>
                    <li class="event-text"> Ziua Mondială a Sănătății 2021 va marca echitatea în sănătate și va fi punctul de plecare pentru o campanie de echitate pe tot parcursul unui an care vizează reunirea oamenilor pentru a construi o lume mai corectă și mai sănătoasă. COVID-19 a luminat și a mărit inechitățile de sănătate.</li>
                    <li><button class="button3">Sterge Eveniment</button></li>    
                </ul>
            </div>
            <div>
                <ul>
                    <li><img src="../../pictures/eveniment4.jpg" alt=""></li>
                    <li><h2> Global Youth Summit 2021 │ 23-25 April </h2></li>
                    <li class="event-text"> The Global Youth Summit is a unique virtual event designed with young people, for young people. Over three-days, the Summit will convene young people from all over the world and key stakeholders from UN agencies, national governments and corporate partners to discuss the needs of young people in a post-COVID-19 world.</li>
                    <li><button class="button3">Sterge Eveniment</button></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><img src="../../pictures/eveniment5.jpg" alt=""></li>
                    <li><h2> Ziua mondială a siguranței alimentare 2021 </h2></li>
                    <li class="event-text"> Ziua Mondială a Siguranței Alimentelor (WFSD) sărbătorită la 7 iunie 2021 își propune să atragă atenția și să inspire acțiuni pentru a ajuta la prevenirea, detectarea și gestionarea riscurilor alimentare, contribuind la securitatea alimentară, sănătatea umană, prosperitatea economică, agricultură, acces pe piață, turism și dezvoltare durabilă.</li>
                    <li><button class="button3">Sterge Eveniment</button></li>    
                </ul>
            </div>
            <div>
                <ul>
                    <li><img src="../../pictures/eveniment6.jpg" alt=""></li>
                    <li><h2> Conferința globală 2021 privind sănătatea și schimbările climatice </h2></li>
                    <li class="event-text"> Conferința globală din 2021 privind sănătatea și schimbările climatice, cu un accent special pe justiția climatică și recuperarea sănătoasă și ecologică de la COVID-19, va avea loc la marginea conferinței ONU privind schimbările climatice COP26. Scopul conferinței este de a face apel la guverne, companii, instituții și actori financiari pentru a stimula o recuperare ecologică, sănătoasă și rezistentă din COVID-19.</li>
                    <li><button class="button3">Sterge Eveniment</button></li>    
                </ul>
            </div>
        </section>
        <div class="btn-adauga">
            <button>Adauga Eveniment</button>
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