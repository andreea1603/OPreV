<?php



include('D:\Xamp\htdocs\proiect\OPreV\model\db-connect.php');

function getOption($filter){

        if(isset($_GET[$filter]))
                return $_GET[$filter];
        return null;
}
?>