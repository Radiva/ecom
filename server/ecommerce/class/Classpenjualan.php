<?php

class penjualan{

function insertpenjualan($Data){
	$columns = implode(", ",array_keys($Data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        $values  = implode("', '", $escaped_values);
        $sql = "INSERT INTO tblpenjualan($columns) VALUES ('$values')";
        return mysql_query($sql) ? $Data : false;
}

function cekpenjualanpending($username){
	$sql = "select*from tblpenjualan where statuspenjualan = 'Pending' and usernamepembeli = '$username'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$data = mysql_fetch_array($query);
		return $data['notapemesanan'];
	}
	else{
		return false;
	}
}

function charttodetail($username, $notapemesanan){
	$sql = "select a.notapemesanan, b.idsession as username, b.idproduct as idbarang, b.jumlah, b.harga from tblpenjualan a INNER JOIN tblcart b ON a.usernamepembeli = b.idsession WHERE a.usernamepembeli = '$username' AND a.notapemesanan='$notapemesanan'";
	$query = mysql_query($sql);
		$jmlbarang = 0;
		$jmlbarangpindah = 0;
		while($datapenjualan = mysql_fetch_array($query)){
			$jmlbarang++;
			$username = $datapenjualan['username'];
			$notapemesanan = $datapenjualan['notapemesanan'];
			$idbarang = $datapenjualan['idbarang'];
			$jumlah = $datapenjualan['jumlah'];
			$harga = $datapenjualan['harga'];
			$insertdetailpenjualan = $this->insertdetailpenjualan(array('usernamepembeli'=>$username, 'notapemesanan'=>$notapemesanan, 'idbarang'=>$idbarang, 'jumlah'=>$jumlah, 'hargajual'=>$harga));
			if($insertdetailpenjualan){
				mysql_query("DELETE FROM tblcart WHERE idsession= '$username' AND idproduct = '$idbarang'");
				$jmlbarangpindah++;
			}
		}
		if($jmlbarang == $jmlbarangpindah){ return true; }
		else{ return false; }
}

function insertdetailpenjualan($Data){
		$columns = implode(", ",array_keys($Data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        $values  = implode("', '", $escaped_values);
        $sql = "INSERT INTO tbldetailpenjualan($columns) VALUES ('$values')";
        return mysql_query($sql) ? true : false;
}

function getpenjualan($username){

	$sql = "select a.*, SUM(b.jumlah * b.hargajual) as totalharga, c.namakategoripembayaran from tblpenjualan a INNER JOIN tbldetailpenjualan b ON a.notapemesanan = b.notapemesanan INNER JOIN tblkategoripembayaran c ON a.idkategoripembayaran = c.idkategoripembayaran where a.usernamepembeli = '$username' GROUP BY b.notapemesanan";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$penjualan = array();
		while($data = mysql_fetch_array($query)){
			$arr_detail = array();
			$notapemesanan = $data['notapemesanan'];
			$querydetail = mysql_query("select a.*, b.namabarang, b.idkategori, b.idbrand, c.namakategori, d.namabrand from tbldetailpenjualan a INNER JOIN tblproduct b ON a.idbarang = b.idbarang INNER JOIN tblkategoriproduct c ON b.idkategori = c.idkategori INNER JOIN tblbrand d ON b.idbrand = d.idbrand where a.notapemesanan='$notapemesanan'");
			while($datadetail = mysql_fetch_array($querydetail)){
				array_push($arr_detail, array('iddetailpenjualan'=>$datadetail['iddetailpenjualan'], 'idbarang'=>$datadetail['idbarang'], 'namabarang'=>$datadetail['namabarang'], 'usernamepembeli'=>$datadetail['usernamepembeli'], 'jumlah'=>$datadetail['jumlah'], 'hargajual'=>$datadetail['hargajual'], 'idkategori'=>$datadetail['idkategori'], 'namakategori'=>$datadetail['namakategori'], 'idbrand'=>$datadetail['idbrand'], 'namabrand'=>$datadetail['namabrand']));
			}
			$datapenjualan = array(
				'notapemesanan' => $data['notapemesanan'],
				'waktupembelian'=> $data['waktupembelian'],
				'usernamepembeli'=>$data['usernamepembeli'],
				'statuspenjualan'=>$data['statuspenjualan'],
				'idkategoripembayaran'=>$data['idkategoripembayaran'],
				'namakategoripembayaran'=>$data['namakategoripembayaran'],
				'diskon'=>$data['diskon'],
				'detailpenjualan'=>$arr_detail,
				'totalharga'=>$data['totalharga'],
			);
			array_push($penjualan, $datapenjualan);
		}
		return $penjualan;
	}
	else{
		return false;
	}
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