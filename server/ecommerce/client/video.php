<?php

include '../konfigurasi/config.php';
include '../class/Classvideo.php';

$option = $_GET['option'];

$video = new video;

switch ($option) {

	//display video
	case 1:
		$displayvideo = $video->displayvideo();
		echo json_encode($displayvideo);
	break;

	// insert video
	case 2:
		$data = array(
			'title' => $_POST['title'],
			'video'=> $_POST['video'],
		);

		$insertvideo = $video->insertvideo($data);
		echo json_encode($insertvideo);
	break;

	// delete video
	case 3:
		$idvideo = $_POST['idvideo'];
		$deletevideo = $video->deletevideo($idvideo);
		echo json_encode($deletevideo);
	break;
}