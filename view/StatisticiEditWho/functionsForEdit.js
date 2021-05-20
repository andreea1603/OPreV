function getIndicator(){
var e = document.getElementById("indicatorCode");
var text = e.options[e.selectedIndex].value;
console.log(text);

var element1 = document.getElementById('formClass');
var item= document.getElementById('loo');
item.remove();


var tag = document.createElement("div");
tag.setAttribute("id","loo");
element1.appendChild(tag);

var element2 = document.getElementById('loo');
if(text==="indicatorCode1"){

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Country");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    console.log(tag);
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Country";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Year");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Year";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Sex");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Sex";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Age");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Age";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Value");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Value";
    element2.appendChild(tag);

    var tag=document.createElement("table");
    tag.setAttribute("id","table");
    tag.setAttribute("class","styled-table");
    element2.appendChild(tag);

    var element3=document.getElementById("table");
    createLabel("Country",element3);
    createLabel("Year",element3);
    createLabel("Sex",element3);
    createLabel("Age",element3);
    createLabel("Value",element3);
    createLabel("New Value",element3);

    
}
else
    if(text==="indicatorCode2"){
    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Country");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    console.log(tag);
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Country";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Year");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Year";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Area");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Area";
    element2.appendChild(tag);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","boxes[]");
    tag.setAttribute("value","Value");
    tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
    tag.setAttribute("class","checkboxes");
    element2.appendChild(tag);
    var tag = document.createElement("label");
    tag.textContent="Value";
    element2.appendChild(tag);

    var tag=document.createElement("table");
    tag.setAttribute("id","table");
    tag.setAttribute("class","styled-table");
    element2.appendChild(tag);

    var element3=document.getElementById("table");
    createLabel("Country",element3);
    createLabel("Year",element3);
    createLabel("Area",element3);
    createLabel("Value",element3);
    createLabel("New Value",element3);

    console.log(element1);
    }
    else
    if(text==="indicatorCode3" || text==="indicatorCode4"){
        var tag = document.createElement("input");
        tag.setAttribute("type","checkbox");
        tag.setAttribute("name","boxes[]");
        tag.setAttribute("value","Country");
        tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
        tag.setAttribute("class","checkboxes");
        console.log(tag);
        element2.appendChild(tag);
        var tag = document.createElement("label");
        tag.textContent="Country";
        element2.appendChild(tag);

        var tag = document.createElement("input");
        tag.setAttribute("type","checkbox");
        tag.setAttribute("name","boxes[]");
        tag.setAttribute("value","Year");
        tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
        tag.setAttribute("class","checkboxes");
        element2.appendChild(tag);
        var tag = document.createElement("label");
        tag.textContent="Year";
        element2.appendChild(tag);

        var tag = document.createElement("input");
        tag.setAttribute("type","checkbox");
        tag.setAttribute("name","boxes[]");
        tag.setAttribute("value","Sex");
        tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
        tag.setAttribute("class","checkboxes");
        element2.appendChild(tag);
        var tag = document.createElement("label");
        tag.textContent="Sex";
        element2.appendChild(tag);

        var tag = document.createElement("input");
        tag.setAttribute("type","checkbox");
        tag.setAttribute("name","boxes[]");
        tag.setAttribute("value","Value");
        tag.setAttribute("onclick","onlyOne(this,'boxes[]')");
        tag.setAttribute("class","checkboxes");
        element2.appendChild(tag);
        var tag = document.createElement("label");
        tag.textContent="Value";
        element2.appendChild(tag);

        var tag=document.createElement("table");
        tag.setAttribute("id","table");
        tag.setAttribute("class","styled-table");
        element2.appendChild(tag);

        var element3=document.getElementById("table");
        createLabel("Country",element3);
        createLabel("Year",element3);
        createLabel("Sex",element3);
        createLabel("Value",element3);
        createLabel("New Value",element3);

        console.log(element1);
    }
}

function createLabel(id,element){
    var tag = document.createElement("tr");
    tag.setAttribute("id",id);
    element.appendChild(tag);

    var element1=document.getElementById(id);

    var tag=document.createElement("td");
    tag.setAttribute("id",id+"1");
    element1.appendChild(tag);

    var element2=document.getElementById(id+"1");
    var tag = document.createElement("label");
    tag.textContent=id;
    element2.appendChild(tag);

    var tag=document.createElement("td");
    tag.setAttribute("id",id+"2");
    element1.appendChild(tag);

    var element2=document.getElementById(id+"2");
    var tag = document.createElement("input");
    tag.setAttribute("type","text");
    element2.appendChild(tag);
}

function getElemente(indicator){
    if(indicator==="indicatorCode1"){
      var element1=document.getElementById("Country2").firstChild;
      var element2=document.getElementById("Year2").firstChild;
      var element3=document.getElementById("Sex2").firstChild;
      var element4=document.getElementById("Age2").firstChild;
      var element5=document.getElementById("Value2").firstChild;
      var element6=document.getElementById("New Value2").firstChild;
      var elements = [element1,element2,element3,element4,element5,element6];
    }
    else
      if(indicator==="indicatorCode2"){
        var element1=document.getElementById("Country2").firstChild;
        var element2=document.getElementById("Year2").firstChild;
        var element3=document.getElementById("Area2").firstChild;
        var element4=document.getElementById("Value2").firstChild;
        var element5=document.getElementById("New Value2").firstChild;
        var elements = [element1,element2,element3,element4,element5];
      }
      else
        if(indicator==="indicatorCode3" || indicator==="indicatorCode4"){
          var element1=document.getElementById("Country2").firstChild;
          var element2=document.getElementById("Year2").firstChild;
          var element3=document.getElementById("Sex2").firstChild;
          var element4=document.getElementById("Value2").firstChild;
          var element5=document.getElementById("New Value2").firstChild;
          var elements = [element1,element2,element3,element4,element5];
        }
    return elements;
}
function addButton() {

        var e = document.getElementById("indicatorCode");
        var text = e.options[e.selectedIndex].value;
        var elements=getElemente(text);
        var ok=1;
        elements.forEach((element)=>{
            if(element.value==="" && element.parentElement.id!="New Value2"){
              ok=0;
              console.log(element.parentElement.parentElement.id);
            }
        })
        if(ok===0)
          errorPart("nu ai completat toate campurile necesare");
        else{
          raspuns=confirmFunction("add");
          if(raspuns===false)
            errorPart("add not successfully");
          else{
              const object={};
              var i=3;
              object[0]=({["IndicatorCode"] : text});
              object[1]=({["Method"] : "ADD"});
              object[2]=({["ModifyValue"] : ""});
              elements.forEach((element)=>{
                  var cheie=element.parentElement.parentElement.id;
                  object[i]=({ [cheie] : element.value});
                  i++;
              })
              const jsonObject=JSON.stringify(object);
              const xhr = new XMLHttpRequest();
              
              xhr.onload=function(){
                errorPart(this.responseText);
              }
              xhr.open("POST","../../Api/who_agestd/test.php");
              xhr.setRequestHeader("Content-type","application/json");
              xhr.send(jsonObject);
            }
          //clearInputs(elements);
        }
}
function editButton() { 
        var inputs = document.getElementsByName('boxes[]');
        ok=0;
        for (var i = 0; i < inputs.length; i++) {   
            if(inputs[i].checked){
              var valoare=inputs[i].value;
              ok=1;
            }
        }
        if(ok===0)
          errorPart("selecteaza un camp");
        else{
          var element=document.getElementById(valoare+"2").firstChild;
          var element1=document.getElementById("New Value2").firstChild;
          if(element.value==="")
            errorPart("Trebuie sa umplii campul "+ valoare);
          else
            if(element1.value==="")
              errorPart("Trebuie sa umplii campul New Value");
            else{
              raspuns=confirmFunction("edit");
              if(raspuns===false)
                errorPart("edit not successfully");
              else{
                var e = document.getElementById("indicatorCode");
                var text = e.options[e.selectedIndex].value;
                var elements=getElemente(text);
                
                const object={};
                var i=3;
                object[0]=({["IndicatorCode"] : text});
                object[1]=({["Method"] : "UPDATE"});
                object[2]=({["ModifyValue"] : valoare});
                elements.forEach((element)=>{
                    var cheie=element.parentElement.parentElement.id;
                    object[i]=({ [cheie] : element.value});
                    i++;
                })
                const jsonObject=JSON.stringify(object);
                const xhr = new XMLHttpRequest();
                
                xhr.onload=function(){
                  errorPart(this.responseText);
                }
                xhr.open("POST","../../Api/who_agestd/test.php");
                xhr.setRequestHeader("Content-type","application/json");
                xhr.send(jsonObject);
              }
            }
        }
}
function deleteButton(){
        var inputs = document.getElementsByName('boxes[]');
        ok=0;
        for (var i = 0; i < inputs.length; i++) {   
            if(inputs[i].checked){
              var valoare=inputs[i].value;
              ok=1;
            }
        }
        if(ok===0)
          errorPart("selecteaza un camp");
        else{
          var element=document.getElementById(valoare+"2").firstChild;
          if(element.value==="")
            errorPart("Trebuie sa umplii campul "+ valoare);
          else{
              raspuns=confirmFunction("delete");
              if(raspuns===false)
                errorPart("delete not successfully");
              else{
                var e = document.getElementById("indicatorCode");
                var text = e.options[e.selectedIndex].value;
                var elements=getElemente(text);
                
                const object={};
                var i=3;
                object[0]=({["IndicatorCode"] : text});
                object[1]=({["Method"] : "DELETE"});
                object[2]=({["ModifyValue"] : ""});
                elements.forEach((element)=>{
                    var cheie=element.parentElement.parentElement.id;
                    object[i]=({ [cheie] : element.value});
                    i++;
                })
                const jsonObject=JSON.stringify(object);
                const xhr = new XMLHttpRequest();
                
                xhr.onload=function(){
                  errorPart(this.responseText);
                }
                xhr.open("POST","../../Api/who_agestd/test.php");
                xhr.setRequestHeader("Content-type","application/json");
                xhr.send(jsonObject);
              }
          }
        }
}

function errorPart(message){
      var tag=document.getElementById("error");
      tag.remove();

      var element=document.getElementById("cont")
      var tag=document.createElement("div");
      tag.setAttribute("id","error");
      tag.textContent=message;

      element.appendChild(tag);

}

function confirmFunction(text) {
  if (confirm("Are you sure you wanna "+text+"?"))
      return true;
  else 
      return false;
}

function clearInputs(elements){
    elements.forEach((element)=>{
        element.value="";
    })
}