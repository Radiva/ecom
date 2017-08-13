<?php
header('Access-Control-Allow-Origin: *');
    $con = mysql_connect("localhost","root","") or die('Could not connect: ' . mysql_error());
    $connect = mysql_select_db("dbecommerce", $con);

//    if($connect){
//        echo 'sukses konek';
//    }
//    else{
//        echo 'gagal konek';
//    }
?>