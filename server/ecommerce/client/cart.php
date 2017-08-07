<?php
include '../konfigurasi/config.php';
include '../class/classcart.php';

$fnc = $_GET['fnc'];

$cart = new cart;

switch ($fnc) {
	case 1:
		$data = $cart->displayBrand();
		echo json_encode($data);
		break;
		
	default:
		# code...
		break;
}

?>