function onlyOne(checkbox,check) {
    var checkboxes = document.getElementsByName(check);
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
function selectAll() {
    var ele=document.getElementsByName('checkCountry[]');
    var ok=0;
    for(var i=0; i<ele.length; i++){  
         if(ele[i].type=='checkbox')
            if(ele[i].checked)
                ok=ok+1;  
    }
    if(ok==0)
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=true;  
        }
    else
    for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=false;  
        }
}
function searchCountry(){
    var countries=document.getElementsByName('toateTarile');
    var input=document.getElementById('search');
    var filter= input.value.toUpperCase();
    countries.forEach((country) => {
        
        txtValue=country.children[1].innerHTML;
        //console.log(txtValue);
        //console.log(filter);
        if (txtValue.toUpperCase().indexOf(filter) > -1){
            country.style.display=""
        }
        else{
            console.log(country);
            country.style.display="none";
        }
    })
}
