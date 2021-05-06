<?php
    
    function makeTable()
    {

        $tabel = "<table border='1' style='margin-top:380px;'>
        <th></th>
        <th></th>
        <th>preobesity</th>
        <th></th>
        <th></th>
        <th>overweight</th>
        <th></th>
        <th></th>
        <th>obese</th>
        <th></th>
        <tr>
        
        <th>Country</th>
        
        <th>2008</th>
        <th>2014</th>
        <th>2017</th>
        <th>2008</th>
        <th>2014</th>
        <th>2017</th>
        <th>2008</th>
        <th>2014</th>
        <th>2017</th>
            </tr>
        ";
        $i = 0;
        $result_countries = checkCountry();
        $countries = $result_countries;

        $rez=getPreobesity($countries);
        $names=$rez[0];
        $pre2008 = $rez[1];
        $pre2014 = $rez[2];
        $pre2017 = $rez[3];


        $rez2=getOverweight($countries);
        $names1=$rez2[0];
        $over2008 = $rez2[1];
        $over2014 = $rez2[2];
        $over2017 = $rez2[3];


        $rez2=getObese($countries);
        $names2=$rez2[0];
        $obese2008 = $rez2[1];
        $obese2014 = $rez2[2];
        $obese2017 = $rez2[3];


        while ($i + 1 < 37) {

            $tabel = $tabel . "<tr>";

            $tabel = $tabel . "<td>" . $names[$i] . "</td>";

            $tabel = $tabel . "<td>" . $pre2008[$i] . "</td>";

            $tabel = $tabel . "<td>" . $pre2014[$i] . "</td>";


            $tabel = $tabel . "<td>" . $pre2017[$i] . "</td>";


            $tabel = $tabel . "<td>" . $over2008[$i] . "</td>";

            $tabel = $tabel . "<td>" . $over2014[$i] . "</td>";

            $tabel = $tabel . "<td>" . $over2017[$i] . "</td>";


            $tabel = $tabel . "<td>" . $obese2008[$i] . "</td>";

            $tabel = $tabel . "<td>" . $obese2014[$i] . "</td>";

            $tabel = $tabel . "<td>" . $obese2017[$i] . "</td>";


            $tabel = $tabel . "</tr>";
            $i = $i + 1;
        }
        $tabel = $tabel . "</table>";
        return $tabel;
    }

    ?>
    <?php $salut=makeTable();?>
<script>
    function tableChart(){
        var variabila = <?php echo json_encode($salut);?>;
        console.log(variabila);
        
        var item = document.getElementById('myChart');
        item.remove();
        var tag = document.createElement("div");
        tag.setAttribute("id","myChart");
        tag.innerHTML=variabila.trim();
        var element = document.getElementById('foo');
        element.appendChild(tag);
    }
</script>