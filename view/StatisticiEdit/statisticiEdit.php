<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/functions.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/statisticiEdit.css">
        <link rel="stylesheet" href="../../styles/style.css">
        <link rel="stylesheet" type="text/css" href="file:///C:/Users/Ovidiu%20Gabor/Downloads/fontawesome-free-5.15.3-web/css/all.css">
        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">

        <title>OPreV</title>
    </head>
    <body>
            <section class="head">
                <ul>
                    <li><a href="../Statistici/statistici.php">Statistici</a></li>
                    <li><a href="../Evenimente/events.php">Evenimente</a></li>
                    <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
                    <li><a href=<?php if(!$_SESSION['conectat']) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
                </ul>
            </section>
            <section class="nested">
                <div class="leftmenu">
                    <h2>Filtre</h2>
                    <div class="filter">
                        <form action="a">
                            <label for="country"> Tara</label>
                            <button><i class="fas fa-trash"></i></button>
                            <select id="country">
                                <option value="Country">Tara</option>
                                <option value="Country">Romania</option>
                                <option value="Country">America</option>
                                <option value="Country">Germania</option>
                            </select>
                            <label for="age"> Age</label>
                            <button><i class="fas fa-trash"></i></button>
                            <select id="age">
                                <option value="Age">Varsta</option>
                                <option value="Age">5-10</option>
                                <option value="Age">10-15</option>
                                <option value="Age">15-25</option>
                                <option value="Age">25-40</option>
                                <option value="Age">40-60</option>
                                <option value="Age">60-</option>
                            </select>
                            <label for="sex"> Sex</label>
                            <button><i class="fas fa-trash"></i></button>
                            <select id="sex">
                                <option value="sex">Sex</option>
                                <option value="sex">Masculin</option>
                                <option value="sex">Feminin</option>
                            </select>
                            <label for="BodyMassIndex">Indice de masa corporala</label>
                            <button><i class="fas fa-trash"></i></button>
                            <select id="BodyMassIndex">
                                <option value="BodyMassIndex">Indice de masa corporala</option>
                                <option value="BodyMassIndex">Supraponderal</option>
                                <option value="BodyMassIndex">Pre-obez</option>
                                <option value="BodyMassIndex">Obez</option>
                            </select>
                            <label for="representation"> Reprezentare</label>
                            <select id="representation">
                                <option value="Representation">Reprezentare</option>
                                <option value="Representation">Bara</option>
                                <option value="Representation">Linii</option>
                                <option value="Representation">Tabel</option>
                                <option value="Representation">Mapa</option>
                            </select>
                            <div id="div-add-filter-button">
                                <button id="add-filter-button"> Add Filter </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="statistica">
                    <div class="generare">
                        <img src="../../pictures/poza1.png" alt="">
                    </div>
                    <div class="butoane">
                        <div><a href="#">CSV</a></div>
                        <div><a href="#">JPG</a></div>
                        <div><a href="#">PDF</a></div>
                    </div>
                </div>
                <div></div>
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