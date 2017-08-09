<?php
include '../konfigurasi/config.php';
include '../class/classcart.php';

$fnc = $_GET['fnc'];

$cart = new cart;

switch ($fnc) {
	case 1:
		$data = $cart->tampilitemcart("radiv");
		echo json_encode($data);
		break;
	
	case 2:
		$data = array(
			'idsession' => $_POST['username'],
			'tanggal' => date("Y-m-d"),
			'idproduct' => $_POST['idbarang'],
			'harga' => $_POST['harga']);
		$data = $cart->insertcart($data);
		echo json_encode($data);
		break;
	
	default:
		# code...
		break;
}

?>