<script type="text/javascript"> 
function prepHref(linkElement, ok) { 
    if(ok===1){
    var myDiv = document.getElementById('imagine'); 
    var myImage = myDiv.children[0]; 
    linkElement.href = myImage.src; 
    }
    else{
        //linePlotlySvg();
        var myDiv = document.getElementById('imagine1'); 
        var myImage = myDiv.children[0]; 
        linkElement.href = myImage.src; 
    }
} 
</script> 