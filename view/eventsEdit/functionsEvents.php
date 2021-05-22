<?php
?>
<script>
function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
  
  function getEvents(){
    var obj = JSON.parse(JSON.stringify(<?php $test = getEvents(); echo json_encode($test); ?>));
    console.log(obj);
    var element = document.getElementById("events");
  
    for(let i=0;i<obj.length;i++){
      var ul=createULelement(obj[i]);
      var div1=document.createElement("div");
      div1.setAttribute("contenteditable","true");
      div1.appendChild(ul);
  
      var button1=createButton("edit",obj[i]["id"]);
      var button2=createButton("delete",obj[i]["id"]);
  
      var div2=document.createElement("div");
      div2.setAttribute("id","eveniment"+obj[i]["id"]);
  
      div2.appendChild(div1);
      div2.appendChild(button1);
      div2.appendChild(button2);
  
      element.appendChild(div2);
    }
  }
  
  function createButton(action,id){
    var button=document.createElement("input");
    button.setAttribute("type","button");
    button.setAttribute("class","button3");
    button.setAttribute("name","eveniment"+id);
    button.setAttribute("value",action);
    if(action==="edit")
      button.setAttribute("onclick","editEvent(name)");
    else
      button.setAttribute("onclick","deleteEvent(name)");
    return button;
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
  function addEvent(){
    var elements=document.getElementsByName("informatii");
  
    console.log(elements[0].value);
    if(elements[0].value!="" && elements[1].value!="" && elements[2].value!=""){
      const object = {"metoda":"add","image":elements[0].value,"titlu": elements[1].value,"descriere" : elements[2].value};
  
      const xhr = new XMLHttpRequest();
      xhr.onload=function(){
      console.log(this.responseText);
      }
      xhr.open("POST","functionsEditEvents.php");
      xhr.setRequestHeader("Content-type","application/json");
      xhr.send(JSON.stringify(object));
    }
    
  }
  function deleteEvent(name){
    var raspuns=confirmFunction("delete");
    if(raspuns===true){
      var element1=document.getElementById(name);
      element1.remove();
      
      var object = {"metoda": "delete","id": name.substring(9,name.length)};
      const xhr = new XMLHttpRequest();
  
      xhr.onload=function(){
        console.log(this.responseText);
      }
      xhr.open("POST","functionsEditEvents.php");
      xhr.setRequestHeader("Content-type","application/json");
      xhr.send(JSON.stringify(object));
    }
  }
  function editEvent(nume){
      var element=document.getElementsByName(nume);
  
      const object = {"metoda":"edit","id": [nume[nume.length-1]],"titlu" : element[0].textContent,"descriere" : element[1].textContent};
      
      const xhr = new XMLHttpRequest();
      xhr.onload=function(){
      console.log(this.responseText);
      }
      xhr.open("POST","functionsEditEvents.php");
      xhr.setRequestHeader("Content-type","application/json");
      xhr.send(JSON.stringify(object));
    }
  
    function confirmFunction(text) {
    if (confirm("Are you sure you wanna "+text+"?"))
        return true;
    else 
        return false;
  }
</script>