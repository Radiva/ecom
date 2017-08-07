<?php
header('Access-Control-Allow-Origin: *');
    $con = mysql_connect("localhost","root","root") or die('Could not connect: ' . mysqli_error());
    $connect = mysql_select_db("dbEcommerce", $con);

//    if($connect){
//        echo 'sukses konek';
//    }
//    else{
//        echo 'gagal konek';
//    }
?>