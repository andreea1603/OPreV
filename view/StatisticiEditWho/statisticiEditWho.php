<?php
include('../../model/setSession.php');
include('../../model/db-connect.php');
include('../../model/urlBuilderEurostat.php');

if(!isset($_SESSION['conectat']))
        header("Location: ../login/login.php");
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/style.css">
        <link rel="stylesheet" href="../../styles/StatisticiEditWho.css">

        <link rel="stylesheet" href="../../styles/edit.css">
        <script src="../Statistici/functions.js"></script>
        <script src="functionsForEdit.js"></script>
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

        <section class="first">
            <div id="cont" class="container">
                <div>
                  <h3>Edit Who Data</h3>
                </div>
                <select id="indicatorCode" class="ic" name="indicatorCode[]" onclick="getIndicator()">
                    <option value="indicatorCode"  >Indicator code</option>
                    <option value="indicatorCode1" >Prevalence of obesity among children and adolescents</option>
                    <option value="indicatorCode2" >Obesity prevalence in non-pregnant women aged 15-49 years</option>
                    <option value="indicatorCode3" >Prevalence of obesity among adults(crude estimate)</option>
                    <option value="indicatorCode4" >Prevalence of obesity among adults(age-standardized estimate)</option>
                </select>
                
                <div id="formClass" class="edit">
                  <div id="loo">

                  </div>
                </div>
                <div class="butoane">
                    <div ><button id="add" class="button" onclick="addButton()">Add</button> </div>
                    <div ><button id="modify" class="button" onclick="editButton()">Edit</button></div>
                    <div ><button id="delete" class="button" onclick="deleteButton()">Delete</button></div>
                </div>
                <div id="error">

                </div>
            </div>
        </section>
    </body>
</html>