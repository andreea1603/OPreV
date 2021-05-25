function addButton() {

        var element1=document.getElementById("Country2").children[0];
        var element2=document.getElementById("Year2").children[0];
        var element3=document.getElementById("BMI2").children[0];
        var element4=document.getElementById("Value2").children[0];
        var element5=document.getElementById("New Value2").children[0];
        elements=[element1,element2,element3,element4,element5];
        var ok=1;
        elements.forEach((element)=>{
            if(element.value==="" && element.parentElement.id!="New Value2"){
              ok=0;
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
              var i=2;
              object[0]=({["Method"] : "ADD"});
              object[1]=({["ModifyValue"] : ""});
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
          var element=document.getElementById(valoare+"2").children[0];
          var element1=document.getElementById("New Value2").children[0];
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
                var element1=document.getElementById("Country2").children[0];
                var element2=document.getElementById("Year2").children[0];
                var element3=document.getElementById("BMI2").children[0];
                var element4=document.getElementById("Value2").children[0];
                var element5=document.getElementById("New Value2").children[0];
                elements=[element1,element2,element3,element4,element5];
                
                const object={};
                var i=2;
                object[0]=({["Method"] : "UPDATE"});
                object[1]=({["ModifyValue"] : valoare});
                elements.forEach((element)=>{
                    var cheie=element.parentElement.parentElement.id;
                    object[i]=({ [cheie] : element.value});
                    i++;
                })
                console.log(object);
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
          var element=document.getElementById(valoare+"2").children[0];
          if(element.value==="")
            errorPart("Trebuie sa umplii campul "+ valoare);
          else{
              raspuns=confirmFunction("delete");
              if(raspuns===false)
                errorPart("delete not successfully");
              else{
                var element1=document.getElementById("Country2").children[0];
                var element2=document.getElementById("Year2").children[0];
                var element3=document.getElementById("BMI2").children[0];
                var element4=document.getElementById("Value2").children[0];
                var element5=document.getElementById("New Value2").children[0];
                elements=[element1,element2,element3,element4,element5];
                
                const object={};
                var i=2;
                object[0]=({["Method"] : "DELETE"});
                object[1]=({["ModifyValue"] : ""});
                elements.forEach((element)=>{
                    var cheie=element.parentElement.parentElement.id;
                    object[i]=({ [cheie] : element.value});
                    i++;
                })
                console.log(object);
                const jsonObject=JSON.stringify(object);
                const xhr = new XMLHttpRequest();
                
                xhr.onload=function(){
                  errorPart(this.responseText);
                }
                console.log("saluut");
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