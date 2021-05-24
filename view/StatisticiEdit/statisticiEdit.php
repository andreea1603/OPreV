<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/functions.php');
include('../../model/db-connect.php');
include('../../model/functions_repres.php');

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/edit.css">
    <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
        <script src="../Statistici/functions.js"></script>
    <script src="functionsForEditEurostat.js"></script>

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
    <section class="first">
            <div id="cont" class="container">
                <div>
                  <h3>Edit Eurostat Data</h3>
                
                
                <div id="formClass" class="edit">
                  <div id="loo">
                        <input type="checkbox" name="boxes[]" value="Country" onclick="onlyOne(this,'boxes[]')" class="checkboxes">
                        <label for=""> Country </label>
                        <input type="checkbox" name="boxes[]" value="BMI" onclick="onlyOne(this,'boxes[]')" class="checkboxes">
                        <label for=""> BMI </label>
                        <input type="checkbox" name="boxes[]" value="Year" onclick="onlyOne(this,'boxes[]')" class="checkboxes">
                        <label for=""> Year </label>
                        <table id="table" class="styled-table">
                            <tr id="Country">
                                <td id="Country1">
                                    <label for="">Country</label>
                                </td>
                                <td id="Country2">
                                    <input type="text">
                                </td>
                            </tr>
                            <tr id="BMI">
                                <td id="BMI1">
                                    <label for="">BMI</label>
                                </td>
                                <td id="BMI2">
                                    <input type="text">
                                </td>
                            </tr>
                            <tr id="Year">
                                <td id="Year1">
                                    <label for="">Year</label>
                                </td>
                                <td id="Year2">
                                    <input type="text">
                                </td>
                            </tr>
                            <tr id="Value">
                                <td id="Value1">
                                    <label for="">Value</label>
                                </td>
                                <td id="Value2">
                                    <input type="text">
                                </td>
                            </tr>
                            <tr id="New Value">
                                <td id="New Value1">
                                    <label for="">New Value</label>
                                </td>
                                <td id="New Value2">
                                    <input type="text">
                                </td>
                            </tr>
                        </table>
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