function onlyOneBmi(checkbox) {
    var checkboxes = document.getElementsByName('check1');
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
function onlyOneYear(checkbox) {
    var checkboxes = document.getElementsByName('check2');
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