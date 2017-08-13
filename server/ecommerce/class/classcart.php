<?php
/*
classcart.php
Creator : Radiva H.O
Date    : 20 Juli 2017
*/

class cart
{
	function insertcart($DataProduct) {
		$columns = implode(", ",array_keys($DataProduct));
        $escaped_values = array_map('mysql_real_escape_string', array_values($DataProduct));
        $values  = implode("', '", $escaped_values);
        $sql = "SELECT * FROM tblCart WHERE idsession = '$DataProduct[idsession]' AND idproduct = '$DataProduct[idproduct]'";
        $query = mysql_query($sql);
        if (mysql_num_rows($query)>0) {
        	$row = mysql_fetch_array($query);
        	$sql = "UPDATE tblCart SET jumlah = jumlah+1 WHERE idcart = '$row[idcart]'";
        } else {
        	$sql = "INSERT INTO tblCart($columns) VALUES ('$values')";
        }        
        return mysql_query($sql) ? true : false;

	}

	function tampilitemcart($session) {
		$sql = "SELECT * FROM `tblCart` JOIN tblProduct ON tblProduct.idbarang = tblCart.idproduct WHERE tblCart.idsession = '$session'";
		$query = mysql_query($sql);

		if(mysql_num_rows($query)>0){
	    $arr = array();
	    while($row = mysql_fetch_array($query)){
		$idbarang = $row['idbarang'];
		$gambar = mysql_fetch_array(mysql_query("select * from tblgambarproduct where idbarang = '$idbarang' limit 1"));
	    	array_push($arr, array("idcart" => $row['idcart'], "tanggal" => $row['tanggal'] , "idsession" => $row['idsession'], "idproduct" => $row['idproduct'], "namabarang" => $row['namabarang'], "gambar" => $gambar['gambar'], "deskripsi" => $row['deskripsi'], "jumlah" => $row['jumlah'], "harga" => $row['harga']));
  	    }
	    return $arr;
        }
        else{
            return false;
        }
	}

	function deleteitemcart($cartid) {
		$sql = "DELETE FROM tblCart WHERE idcart = '$cartid'";
		return mysql_query($sql) ? true : false;

	}

	function cleancart($cart) {
		$sql = "DELETE FROM tblCart WHERE idcart = '$cart'";
		return mysql_query($sql) ? true : false;
	}

	function updatejumlah($idsession) {
		$sql = "SELECT SUM(jumlah) AS jumlahitem, SUM(jumlah * harga) AS hargatotal FROM tblCart WHERE idsession = '$idsession'";
		$query = mysql_query($sql);
		if(mysql_num_rows($query)>0){
	    $arr = array();
	    while($row = mysql_fetch_array($query)){
	    	array_push($arr, array("jumlahitem" => $row['jumlahitem'], "hargatotal" => $row['hargatotal']));
  	    }
	    return $arr;
        }
        else{
            return false;
        }
	}
}
?>