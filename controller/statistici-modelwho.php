<?php
function checkMare($nume){
    $array=[];

    if (isset($_POST['submit'])) {

        if (!empty($_POST[$nume])) {

            foreach ($_POST[$nume] as $value) {
                array_push($array, $value);
            }
        }else
            array_push($array,"indicatorCode1");
        
        }
    else
        array_push($array,"indicatorCode1");
    return $array;
}

function checkAllwho(){
    checkMare("checkCountry");
    checkMare("sexes");
    checkMare("ages");
    checkMare("areas");
    checkMare("years");
    checkMare("indicatorCode");
}

function mapWho($labels,$datasets){

    $dir=__DIR__;
    $path1=substr($dir, 0, -10).'\view\StatisticiWho\resources\data.csv';
    $path2=substr($dir, 0, -10).'\view\StatisticiWho\resources\temporary.csv';

    echo 'salut';
    print($labels[0]);
    $input = fopen($path1, 'r');
    $output = fopen($path2, 'w');
    $data = fgetcsv($input);
    fputcsv( $output, $data);
    while( false !== ( $data = fgetcsv($input) ) ){ 
        $i=0;
        $ok=0;      
        foreach($labels as $tara){
            if ($data[2] == $tara) {
                $data[1] =$datasets[$i];
                $ok=1;
            }
            $i++;
        }
        if($ok==0)
            $data[1]=0;
        fputcsv( $output, $data);
    }
    fclose( $input );
    fclose( $output );

  
    unlink($path1);
    rename($path2, $path1);

}
?>