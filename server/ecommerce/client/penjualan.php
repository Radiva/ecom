<?php

include "../konfigurasi/config.php";
include "../class/Classpenjualan.php";

$penjualan = new penjualan;

$option = $_GET['option'];

switch($option){

	// insert data penjualan
	case 1:
		$namamerchant = preg_replace('/\s+/', '', "Buka Lapak");
		$jumlahdata = mysql_num_rows(mysql_query("select*from tblpenjualan"));
		date_default_timezone_set("Asia/Bangkok");
		$notapemesanan = strtoupper($namamerchant[0].''.$namamerchant[''.round(strlen($namamerchant)/2)].''.$namamerchant[strlen($namamerchant)-1]).''.date('Ymd', time()).''.sprintf('%04u', $jumlahdata+1);
		$username = $_POST['username'];
		$statuspenjualan = "Pending";
		// $idkategoripembayaran = $_POST['idkategoripembayaran'];
		$idkategoripembayaran = 1;
		// $diskon = $_POST['diskon'];
		$diskon = null;
		$data = array(
			'notapemesanan'=>$notapemesanan,
			'usernamepembeli'=>$username,
			'statuspenjualan'=>$statuspenjualan,
			'idkategoripembayaran'=>$idkategoripembayaran,
			'diskon'=>$diskon
		);
		if(mysql_num_rows(mysql_query("select*from tblcart where idsession='$username'"))>0){
			$cek = $penjualan->cekpenjualanpending($username);
			if($cek == false){
				$insertpenjualan = $penjualan->insertpenjualan($data);
				if($insertpenjualan){
					$charttodetail = $penjualan->charttodetail($username, $notapemesanan);
					if($charttodetail){
						$datapenjualan = $penjualan->getpenjualan($username);
						echo json_encode($datapenjualan);
					}
				}else{
					echo json_encode(false);
				}
			}
			else{
				$charttodetail = $penjualan->charttodetail($username, $cek);
				echo json_encode($charttodetail);
				
			}
		}
		else{
			$datapenjualan = $penjualan->getpenjualan($username);
			echo json_encode($datapenjualan);
		}

	break;

	// get detail penjualan
	case 2:
		$username = $_POST['username'];
		$datapenjualan = $penjualan->getpenjualan($username);
		echo json_encode($datapenjualan);
	break;

	// update status pembayaran
	case 3:
		$statuspembayaran = $_POST['statuspembayaran'];
		$updatestatuspembayaran = $penjualan->updatestatuspembayaran($statuspembayaran);
		echo json_encode($updatestatuspembayaran);

	break;

	//update metode pembayaran
	case 4:
		$namakategoripembayaran = $_POST['namakategoripembayaran'];
		$updatemetodepembayaran = $penjualan->updatemetodepembayaran($namakategoripembayaran);
		echo json_encode($updatemetodepembayaran);
	break;

}