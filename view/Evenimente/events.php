<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/functions.php');
include('../eventsEdit/functionsEditEvents.php');
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

function getEvents(){
    var obj = JSON.parse(JSON.stringify(<?php $test = getEvents(); echo json_encode($test); ?>));
    console.log(obj);
    var element = document.getElementById("events");
  
    for(let i=0;i<obj.length;i++){
      var ul=createULelement(obj[i]);
      var div1=document.createElement("div");
      div1.setAttribute("contenteditable","true");
      div1.appendChild(ul);
  
      var div2=document.createElement("div");
      div2.setAttribute("id","eveniment"+obj[i]["id"]);
  
      div2.appendChild(div1);
  
      element.appendChild(div2);
    }
}
function createULelement(object){
      var element=document.createElement("ul");
      
      var img=document.createElement("img");
      img.src="../../pictures/"+object["imagePath"];
      console.log(img.src);
      var tag1=document.createElement("li");
      tag1.appendChild(img);
  
      var h2=document.createElement("h2");
      h2.textContent=object["titluEvent"];
      h2.setAttribute("name","eveniment"+object["id"]);
      var tag2=document.createElement("li");
      tag2.appendChild(h2);
  
      var tag3=document.createElement("li");
      tag3.textContent=object["descriereEvent"];
      tag3.setAttribute("name","eveniment"+object["id"]);
      tag3.setAttribute("class","event-text");
  
      element.appendChild(tag1);
      element.appendChild(tag2);
      element.appendChild(tag3);
      return element;
  }
</script>