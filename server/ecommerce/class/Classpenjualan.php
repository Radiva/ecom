<?php

class penjualan{

function insertpenjualan($Data){
	$columns = implode(", ",array_keys($Data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        $values  = implode("', '", $escaped_values);
        $sql = "INSERT INTO tblpenjualan($columns) VALUES ('$values')";
        return mysql_query($sql) ? $Data : false;
}

function insertdetailpenjualan($Data){
	$columns = implode(", ",array_keys($Data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        $values  = implode("', '", $escaped_values);
        $sql = "INSERT INTO tbldetailpenjualan($columns) VALUES ('$values')";
        return mysql_query($sql) ? $Data : false;
}

function updatestatuspembayaran($pembayaran){
	$sql = "UPDATE tblpenjualan SET pembayaran = '$pembayaran'";
	$query = mysql_query($sql);
	if($query){
		return true;
	}
	else{
		return false;
	}
}

function updatemetodepembayaran($idkategoripembayaran){
	$sql = "UPDATE tblpenjualan SET  tblpenjualan.idkategoripembayaran= tblkategoripembayaran.namakategoripembayaran FROM tblpenjualan INNER JOIN tblkategoripembayaran ON tblpenjualan.idkategoripembayaran = tblkategoripembayaran.idkategoripembayaran";
	$query = mysql_query($sql);
	if($query){
		return true;
	}
	else{
		return false;
	}
}

}