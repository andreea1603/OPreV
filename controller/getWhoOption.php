<?php
$dir=__DIR__;
$path=substr($dir, 0, -10).'\model\putInCsv1.php';
include($path);

function getOption($filter){

        if(isset(htmlspecialchars($_GET[$filter])))
                return htmlspecialchars($_GET[$filter]);
        return null;
}
?>