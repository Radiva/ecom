<?php
include '../konfigurasi/config.php';
include '../class/classcart.php';

$fnc = $_GET['fnc'];

$cart = new cart;

switch ($fnc) {
	case 1:
		$user = $_POST['user'];
		$data = $cart->tampilitemcart($user);
		echo json_encode($data);
		break;
	
	case 2:
		$data = array(
			'idsession' => $_POST['username'],
			'tanggal' => date("Y-m-d"),
			'idproduct' => $_POST['idbarang'],
			'jumlah' => 1,
			'harga' => $_POST['harga']);
		$data = $cart->insertcart($data);
		echo json_encode($data);
		break;
	
	case 3:
		$cartid = $_POST['cartid'];
		$data = $cart->deleteitemcart($cartid);
		echo json_encode($data);
		break;

	case 4:
		$user = $_POST['user'];
		$data = $cart->updatejumlah($user);
		echo json_encode($data);
		break;

	default:
		# code...
		break;
}

?>