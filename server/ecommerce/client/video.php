<?php

include '../konfigurasi/config.php';
include '../class/Classvideo.php';

$option = $_GET['option'];

$video = new video;

switch ($option) {

	//display banner
	case 1:
		$displayvideo = $banner->displayvideo();
		echo json_encode($displayvideo);
	break;

	// insert banner
	case 2:
		$data = array(
			'title' => $_POST['title'],
			'video'=> $_POST['video'],
		);

		$insertvideo = $banner->insertvideo($data);
		echo json_encode($insertvideo);
	break;

	// delete banner
	case 3:
		$idvideo = $_POST['idvideo'];
		$deletevideo = $banner->deletevideo($idvideo);
		echo json_encode($deletevideo);
	break;
}