function select(){
    var e = document.getElementById("dimension");
    var text = e.options[e.selectedIndex].text;
    var item = document.getElementById('button');
    if(item!=null)
        item.remove();
    if(text==="Country"){
        var item = document.getElementById('filtreTari');
        item.remove();
        var item = document.getElementById('titlu');
        if(item!=null)
            item.remove();
        
        var element = document.getElementById('foo');

        var tag = document.createElement("h3");
        tag.setAttribute("id","titlu")
        tag.textContent="Country";
        element.appendChild(tag);
        
        var tag = document.createElement("div");
        tag.setAttribute("id","filtreTari");
        tag.setAttribute("class","scroll");
        element.appendChild(tag);
        
        //<input type="button" onclick="selectAll()" value="Select All">
        var tag= document.createElement("input");
        tag.setAttribute("type","button");
        tag.setAttribute("onclick","selectAll()");
        tag.setAttribute("value","Select All");
        tag.setAttribute("id","button");
        
        makeCountry("Romania","id"+1);
        makeCountry("albania","id"+2);
        makeCountry("rusia","id"+3);
        makeCountry("Romania","id"+4);
        makeCountry("albania","id"+5);
        makeCountry("rusia","id"+6);

        element.appendChild(tag);
    }
    else
        if(text==='Region'){
            var item = document.getElementById('filtreTari');
            item.remove();
            var item = document.getElementById('titlu');
            if(item!=null)
                item.remove();
            
            var element = document.getElementById('foo');

            var tag = document.createElement("h3");
            tag.setAttribute("id","titlu")
            tag.textContent="Region";
            element.appendChild(tag);
            
            var tag = document.createElement("div");
            tag.setAttribute("id","filtreTari");
            tag.setAttribute("class","scroll");
            element.appendChild(tag);
            
            makeCountry("Africa","id"+1);
            makeCountry("Europa","id"+2);
            makeCountry("Asia","id"+3);
            makeCountry("America","id"+4);
            makeCountry("Antarctica","id"+5);
            makeCountry("Australia","id"+6);
        }
        else
            if(text==="World Bank Income"){
                var item = document.getElementById('filtreTari');
                item.remove();
                var item = document.getElementById('titlu');
                if(item!=null)
                    item.remove();
                
                var element = document.getElementById('foo');
        
                var tag = document.createElement("h3");
                tag.setAttribute("id","titlu")
                tag.textContent="World Bank Income";
                element.appendChild(tag);
                
                var tag = document.createElement("div");
                tag.setAttribute("id","filtreTari");
                tag.setAttribute("class","scroll");
                element.appendChild(tag);
                
                makeCountry("WB_HI","id"+1);
                makeCountry("WB_LI","id"+2);
                makeCountry("WB_LMI","id"+3);
                makeCountry("WB_UMI","id"+4);
        }
        console.log(element);

}
function makeCountry(country,id){
    var element1=document.getElementById('filtreTari');
    var tag = document.createElement("div");
    tag.setAttribute("id",id);
    element1.appendChild(tag);

    var element2=document.getElementById(id);
    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    tag.setAttribute("name","checkCountry[]");
    element2.appendChild(tag);

    var tag = document.createElement("label");
    tag.textContent=country;
    element2.appendChild(tag);
}


function selectIndicator(){
    var e = document.getElementById("indicatorCode");
    var text = e.options[e.selectedIndex].value;
    
    var element1 = document.getElementById('goo');
    var item= document.getElementById("filtreNormale");
    item.remove();

    var tag=document.createElement("div");
    tag.setAttribute("id","filtreNormale");
    element1.appendChild(tag);

    var element2=document.getElementById("filtreNormale");
    if(text==="indicatorCode1"){
        
        //put year
        var tag = document.createElement("h3");
        tag.textContent="Year";
        element2.appendChild(tag);

        var tag = document.createElement("div");
        tag.setAttribute("class","scroll");
        tag.setAttribute("id","filtre1");
        element2.appendChild(tag);

        var element3=document.getElementById("filtre1");
        years=[2008,2009,2010,2011,2012];
        for(year in years){
            putYearFilters(years[year],element3);
        }


        //put sex
        var tag = document.createElement("h3");
        tag.textContent="Sex";
        element2.appendChild(tag);

        var tag = document.createElement("div");
        tag.setAttribute("class","scroll");
        tag.setAttribute("id","filtre2");
        element2.appendChild(tag);
    
        
        element3=document.getElementById("filtre2");

        sexes=["Male","Famele","Both"];
        for(sex in sexes){
            putSexFilters(sexes[sex],element3);
        }

        //put age
        var tag = document.createElement("h3");
        tag.textContent="Age";
        element2.appendChild(tag);

        var tag = document.createElement("div");
        tag.setAttribute("class","scroll");
        tag.setAttribute("id","filtre3");
        element2.appendChild(tag);
    
        
        element3=document.getElementById("filtre3");

        ages=["5-9","9-19","5-19","18+"];
        for(age in ages){
            putAgeFilters(ages[age],element3);
        }
    }
    else 
        if(text==="indicatorCode2"){
            //year
            var tag = document.createElement("h3");
            tag.textContent="Year";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class","scroll");
            tag.setAttribute("id","filtre1");
            element2.appendChild(tag);

            var element3=document.getElementById("filtre1");
            years=[2008,2009,2010,2011,2012];
            for(year in years){
                putYearFilters(years[year],element3);
            }

            //residence area
            var tag = document.createElement("h3");
            tag.textContent="Residence Area Type";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class","scroll");
            tag.setAttribute("id","filtre2");
            element2.appendChild(tag);

            var element3=document.getElementById("filtre2");
            areas=["Urban","Rural"];
            for(area in areas){
                putAreaFilters(areas[area],element3);
            }
        }
        else 
            if(text==="indicatorCode3" || text==="indicatorCode4"){
                //put year
                var tag = document.createElement("h3");
                tag.textContent="Year";
                element2.appendChild(tag);

                var tag = document.createElement("div");
                tag.setAttribute("class","scroll");
                tag.setAttribute("id","filtre1");
                element2.appendChild(tag);

                var element3=document.getElementById("filtre1");
                years=[2008,2009,2010,2011,2012];
                for(year in years){
                    putYearFilters(years[year],element3);
                }


                //put sex
                var tag = document.createElement("h3");
                tag.textContent="Sex";
                element2.appendChild(tag);

                var tag = document.createElement("div");
                tag.setAttribute("class","scroll");
                tag.setAttribute("id","filtre2");
                element2.appendChild(tag);
            
                
                element3=document.getElementById("filtre2");

                sexes=["Male","Famele","Both"];
                for(sex in sexes){
                    putSexFilters(sexes[sex],element3);
                }
            }
    console.log(element1);
}
function putYearFilters(year,element){

    var tag = document.createElement("div");
    tag.setAttribute("id","year"+year);
    element.appendChild(tag);
    
    var element1=document.getElementById("year"+year);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    element1.appendChild(tag);

    var tag = document.createElement("label");
    tag.textContent=year;
    element1.appendChild(tag);

}

function putSexFilters(sex,element){
    var tag = document.createElement("div");
    tag.setAttribute("id",sex);
    element.appendChild(tag);

    var element1=document.getElementById(sex);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    element1.appendChild(tag);

    var tag = document.createElement("label");
    tag.textContent=sex;
    element1.appendChild(tag);

}
function putAgeFilters(age,element){
    var tag = document.createElement("div");
    tag.setAttribute("id","age"+age);
    element.appendChild(tag);

    var element1=document.getElementById("age"+age);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    element1.appendChild(tag);

    var tag = document.createElement("label");
    tag.textContent=age;
    element1.appendChild(tag);

}
function putAreaFilters(area,element){
    var tag = document.createElement("div");
    tag.setAttribute("id",area);
    element.appendChild(tag);

    var element1=document.getElementById(area);

    var tag = document.createElement("input");
    tag.setAttribute("type","checkbox");
    element1.appendChild(tag);

    var tag = document.createElement("label");
    tag.textContent=area;
    element1.appendChild(tag);
}