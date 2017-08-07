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
        $sql = "INSERT INTO tblCart($columns) VALUES ('$values')";
        return mysql_query($sql) ? true : false;

	}

	function deleteitemcart($product,$session) {
		$sql = "DELETE FROM tblCart WHERE idproduct = '$product' AND idsession = '$session'";
		return mysql_query($sql) ? true : false;

	}

	function cleancart($cart) {
		$sql = "DELETE FROM tblCart WHERE idcart = '$cart'";
		return mysql_query($sql) ? true : false;
	}

	function updatejumlahitem($cart) {
		$sql = "SELECT SUM(jumlah) AS jumlahitem FROM tblCart WHERE idcart = $cart";
		return mysql_query($sql);
	}
}
?>