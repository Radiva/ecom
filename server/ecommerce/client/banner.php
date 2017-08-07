<?php

include '../konfigurasi/config.php';
include '../class/Classbanner.php';

$option = $_GET['option'];

$banner = new banner;

switch ($option) {

	//display banner
	case 1:
		$displaybanner = $banner->displaybanner();
		echo json_encode($displaybanner);
	break;

	// insert banner
	case 2:
		$data = array(
			'judul' => $_POST['judul'],
			'gambar'=> $_POST['gambar'],
			'content'=> $_POST['content']
		);

		$insertbanner = $banner->insertbanner($data);
		echo json_encode($insertbanner);
	break;

	// delete banner
	case 3:
		$idbanner = $_POST['idbanner'];
		$deletebanner = $banner->deletebanner($idbanner);
		echo json_encode($deletebanner);
	break;
}