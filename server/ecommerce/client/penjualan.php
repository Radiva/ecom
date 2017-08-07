<?php

include "../konfigurasi/config.php";
include "../class/Classpenjualan.php";

$penjualan = new penjualan;

$option = $_GET['option'];

if($option == 1){
	$namamerchant = preg_replace('/\s+/', '', "Buka Lapak");
	date_default_timezone_set("Asia/Bangkok");
	$notapemesanan = strtoupper($namamerchant[0].''.$namamerchant[''.round(strlen($namamerchant)/2)].''.$namamerchant[strlen($namamerchant)-1]).''.date('Ymd', time()).''.sprintf('%04u', 1);
	$username = $_POST['username'];
	$statuspenjualan = "Success";
	$idkategoripembayaran = $_POST['idkategoripembayaran'];
	$diskon = $_POST['diskon'];
	$data = array(
		'notapemesanan'=>$notapemesanan,
		'usernamepembeli'=>$username,
		'statuspenjualan'=>$statuspenjualan,
		'idkategoripembayaran'=>$idkategoripembayaran,
		'diskon'=>$diskon
	);
	$insertpenjualan = $penjualan->insertpenjualan($data);
	echo json_encode($insertpenjualan);
}if($option == 2){
	$sql = "select a.notapemesanan, b.idsession as username, b.idproduct as idbarang, b.jumlah, b.harga from tblpenjualan a INNER JOIN tblcart b";
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
		$insertdetailpenjualan = $penjualan->insertdetailpenjualan(array('usernamepembeli'=>$username, 'notapemesanan'=>$notapemesanan, 'idbarang'=>$idbarang, 'jumlah'=>$jumlah, 'hargajual'=>$harga));
		if($insertdetailpenjualan){
			mysql_query("DELETE FROM tblcart WHERE idsession= '$username' AND idproduct = '$idbarang'");
			$jmlbarangpindah++;
		}
	}
	if($jmlbarang == $jmlbarangpindah){ echo json_encode(true); }
	else{ echo json_encode(false); }

}if($option == 3){
	$statuspembayaran = $_POST['statuspembayaran'];
	$updatestatuspembayaran = $penjualan->updatestatuspembayaran($statuspembayaran);
	echo json_encode($updatestatuspembayaran);
}if($option == 4){
	$namakategoripembayaran = $_POST['namakategoripembayaran'];
	$updatemetodepembayaran = $penjualan->updatemetodepembayaran($namakategoripembayaran);
	echo json_encode($updatemetodepembayaran);
}