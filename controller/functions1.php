<?php
$dir = __DIR__;
$path = substr($dir, 0, -10) . '\model\getDatafromDB.php';

include($path);
?>
<script>
    function searchCountry() {
        var countries = document.getElementsByName('toateTarile');
        var input = document.getElementById('search');
        var filter = input.value.toUpperCase();
        countries.forEach((country) => {

            txtValue = country.children[1].innerHTML;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                country.style.display = ""
            } else {
                country.style.display = "none";
            }
        })
    }

    function select() {
        var e = document.getElementById("dimension");
        var text = e.options[e.selectedIndex].text;
        var item = document.getElementById('button');
        if (item != null)
            item.remove();
        var item = document.getElementById('search');
        if (item != null)
            item.remove();
        if (text === "Country") {
            var item = document.getElementById('filtreTari');
            item.remove();
            var item = document.getElementById('titlu');
            if (item != null)
                item.remove();

            var element = document.getElementById('foo');

            var tag = document.createElement("h3");
            tag.setAttribute("id", "titlu")
            tag.textContent = "Country";
            element.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("id", "filtreTari");
            tag.setAttribute("class", "scroll");
            element.appendChild(tag);

            //<input type="button" onclick="selectAll()" value="Select All">
            var tag = document.createElement("input");
            tag.setAttribute("type", "button");
            tag.setAttribute("onclick", "selectAll()");
            tag.setAttribute("value", "Select All");
            tag.setAttribute("id", "button");

            <?php $countries = getCode(); ?>

            countries = <?php echo json_encode($countries[0]); ?>;
            codes = <?php echo json_encode($countries[1]); ?>;

            for (tara in countries) {
                makeCountry(countries[tara], codes[tara]);
            }

            element.appendChild(tag);
            var tag = document.createElement("input");
            tag.setAttribute("type", "text");
            tag.setAttribute("onkeyup", "searchCountry()");
            tag.setAttribute("placeholder", "Search for country...");
            tag.setAttribute("id", "search");
            element.appendChild(tag);
        } else
        if (text === 'Region') {
            var item = document.getElementById('filtreTari');
            item.remove();
            var item = document.getElementById('titlu');
            if (item != null)
                item.remove();

            var element = document.getElementById('foo');

            var tag = document.createElement("h3");
            tag.setAttribute("id", "titlu")
            tag.textContent = "Region";
            element.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("id", "filtreTari");
            tag.setAttribute("class", "scroll");
            element.appendChild(tag);

            makeCountry("Africa", "AFR");
            makeCountry("Americas", "AMR");
            makeCountry("Eastern Mediterranean", "EMR");
            makeCountry("Europe", " EUR");
            makeCountry("South-East Asia", "SEAR");
            makeCountry("Western Pacific", "WPR");
            makeCountry("Global", "Global");
        } else
        if (text === "World Bank Income") {
            var item = document.getElementById('filtreTari');
            item.remove();
            var item = document.getElementById('titlu');
            if (item != null)
                item.remove();

            var element = document.getElementById('foo');

            var tag = document.createElement("h3");
            tag.setAttribute("id", "titlu")
            tag.textContent = "World Bank Income";
            element.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("id", "filtreTari");
            tag.setAttribute("class", "scroll");
            element.appendChild(tag);

            makeCountry("High-income", "WB_HI");
            makeCountry("Low-income", "WB_LI");
            makeCountry("Lower-middle-income", "WB_LMI");
            makeCountry("Upper-middle-income", "WB_UMI");
        }
    }

    function makeCountry(country, id) {
        var element1 = document.getElementById('filtreTari');
        var tag = document.createElement("div");
        tag.setAttribute("id", id);
        tag.setAttribute("name", "toateTarile");
        element1.appendChild(tag);

        var element2 = document.getElementById(id);
        var tag = document.createElement("input");
        tag.setAttribute("type", "checkbox");
        tag.setAttribute("value", id);
        tag.setAttribute("name", "checkCountry[]");
        element2.appendChild(tag);

        var tag = document.createElement("label");
        tag.textContent = country;
        element2.appendChild(tag);
    }


    function selectIndicator() {
        var e = document.getElementById("indicatorCode");
        var text = e.options[e.selectedIndex].value;

        var element1 = document.getElementById('goo');
        var item = document.getElementById("filtreNormale");
        item.remove();

        var tag = document.createElement("div");
        tag.setAttribute("id", "filtreNormale");
        element1.appendChild(tag);

        var element2 = document.getElementById("filtreNormale");
        if (text === "indicatorCode1") {

            //put year
            var tag = document.createElement("h3");
            tag.textContent = "Year";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre1");
            element2.appendChild(tag);

            var element3 = document.getElementById("filtre1");

            <?php $yearss = getYearsByCode(1); ?>

            years1 = <?php echo json_encode($yearss); ?>;
            for (year in years1) {
                putYearFilters(years1[year], element3);
            }


            //put sex
            var tag = document.createElement("h3");
            tag.textContent = "Sex";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre2");
            element2.appendChild(tag);


            element3 = document.getElementById("filtre2");

            <?php $sexx = getSexByCode(1); ?>

            sexes1 = <?php echo json_encode($sexx); ?>;
            for (sex in sexes1) {
                putSexFilters(sexes1[sex], element3);
            }

            //put age
            var tag = document.createElement("h3");
            tag.textContent = "Age";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre3");
            element2.appendChild(tag);


            element3 = document.getElementById("filtre3");

            <?php $agess = getAgesByCode(1); ?>

            ages1 = <?php echo json_encode($agess); ?>;
            for (age in ages1) {
                putAgeFilters(ages1[age], element3);
            }
        } else
        if (text === "indicatorCode2") {
            //year
            var tag = document.createElement("h3");
            tag.textContent = "Year";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre1");
            element2.appendChild(tag);

            var element3 = document.getElementById("filtre1");

            <?php $yearss = getYearsByCode(2); ?>

            years1 = <?php echo json_encode($yearss); ?>;
            for (year in years1) {
                putYearFilters(years1[year], element3);
            }

            //residence area
            var tag = document.createElement("h3");
            tag.textContent = "Residence Area Type";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre2");
            element2.appendChild(tag);

            var element3 = document.getElementById("filtre2");
            <?php $areass = getAreasByCode(2); ?>
            areas1 = <?php echo json_encode($areass); ?>;
            for (area in areas1) {
                putAreaFilters(areas1[area], element3);
            }
        } else
        if (text === "indicatorCode3" || text === "indicatorCode4") {
            //put year
            var tag = document.createElement("h3");
            tag.textContent = "Year";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre1");
            element2.appendChild(tag);

            var element3 = document.getElementById("filtre1");
            if (text === "indicatorCode3") {
                <?php $yearss = getYearsByCode(3); ?>;
                years1 = <?php echo json_encode($yearss); ?>;
            } else {
                <?php $yearss = getYearsByCode(4); ?>;
                years1 = <?php echo json_encode($yearss); ?>;
            }

            for (year in years1) {
                putYearFilters(years1[year], element3);
            }


            //put sex
            var tag = document.createElement("h3");
            tag.textContent = "Sex";
            element2.appendChild(tag);

            var tag = document.createElement("div");
            tag.setAttribute("class", "scroll");
            tag.setAttribute("id", "filtre2");
            element2.appendChild(tag);


            element3 = document.getElementById("filtre2");

            if (text === "indicatorCode3") {
                <?php $sexess = getSexByCode(3); ?>;
                sexes1 = <?php echo json_encode($sexess); ?>;
            } else {
                <?php $sexess = getSexByCode(4); ?>;
                sexes1 = <?php echo json_encode($sexess); ?>;
            }
            for (sex in sexes1) {
                putSexFilters(sexes1[sex], element3);
            }
        }
    }

    function putYearFilters(year, element) {
        var tag = document.createElement("div");
        tag.setAttribute("id", "year" + year);
        element.appendChild(tag);

        var element1 = document.getElementById("year" + year);

        var tag = document.createElement("input");
        tag.setAttribute("type", "checkbox");
        tag.setAttribute("name", "years[]");
        tag.setAttribute("value", "year" + year);
        tag.setAttribute("onclick", "onlyOne(this,'years[]')");
        element1.appendChild(tag);

        var tag = document.createElement("label");
        tag.textContent = year;
        element1.appendChild(tag);

    }

    function putSexFilters(sex, element) {
        var tag = document.createElement("div");
        tag.setAttribute("id", sex);
        element.appendChild(tag);

        var element1 = document.getElementById(sex);

        var tag = document.createElement("input");
        tag.setAttribute("type", "checkbox");
        tag.setAttribute("name", "sexes[]");
        tag.setAttribute("value", sex);
        tag.setAttribute("onclick", "onlyOne(this,'sexes[]')");
        element1.appendChild(tag);

        var tag = document.createElement("label");
        tag.textContent = sex;
        element1.appendChild(tag);

    }

    function getSexR(sex) {

        if (sex == "Male")
            return "MLE";
        if (sex == "Female")
            return "FMLE";
        return "BTSX";

    }

    function getSex(sex) {

        if (sex == "MLE")
            return "Male";
        if (sex == "FMLE")
            return "Female";
        return "Both";

    }

    function putAgeFilters(age, element) {
        var tag = document.createElement("div");
        tag.setAttribute("id", age);
        element.appendChild(tag);

        var element1 = document.getElementById(age);

        var tag = document.createElement("input");
        tag.setAttribute("type", "checkbox");
        tag.setAttribute("name", "ages[]");
        tag.setAttribute("value", age);
        tag.setAttribute("onclick", "onlyOne(this,'ages[]')");
        element1.appendChild(tag);

        var tag = document.createElement("label");
        tag.textContent = age;
        element1.appendChild(tag);

    }

    function putAreaFilters(area, element) {
        var tag = document.createElement("div");
        tag.setAttribute("id", area);
        element.appendChild(tag);

        var element1 = document.getElementById(area);

        var tag = document.createElement("input");
        tag.setAttribute("type", "checkbox");
        tag.setAttribute("name", "areas[]");
        tag.setAttribute("value", area);
        tag.setAttribute("onclick", "onlyOne(this,'areas[]')");
        element1.appendChild(tag);

        var tag = document.createElement("label");
        tag.textContent = area;
        element1.appendChild(tag);

    }
</script>