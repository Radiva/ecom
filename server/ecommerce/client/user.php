<?php

include '../konfigurasi/config.php';
include '../class/Classuser.php';

$user = new user;

$option = $_GET['option'];

switch($option){
	// insert user
	case 1:
		$data = array(
			'username'=>$_POST['username'],
			'password'=>$_POST['password'],
			'namadepan'=>$_POST['namadepan'],
			'namabelakang'=>$_POST['namabelakang'],
			'notelp'=>$_POST['notelp'],
			'alamat'=>$_POST['alamat'],
			'idgroupuser'=>$_POST['idgroupuser'],
			'tgllahir'=>$_POST['tgllahir'],
			'email'=>$_POST['email'],
		);
		$insertuser = $user->insertuser($data);
		echo json_encode($insertuser);	
	break;

	// update user data
	case 2:
		$data = array(
			'username'=>$_POST['username'],
			'password'=>$_POST['password'],
			'namadepan'=>$_POST['namadepan'],
			'namabelakang'=>$_POST['namabelakang'],
			'notelp'=>$_POST['notelp'],
			'alamat'=>$_POST['alamat'],
			'tgllahir'=>$_POST['tgllahir'],
			'email'=>$_POST['email'],
		);
		$updateuserdata = $user->updateuserdata($data);
		echo json_encode($updateuserdata);	
	break;

	// login user
	case 3:
		$data = array(
			'username'=>$_POST['username'],
			'password'=>$_POST['password']
		);
		$login = $user->login($data);
		echo json_encode($login);
		
	break;

	//get user data
	case 4:
		$username = $_POST['username'];
		$getuserdata = $user->getuserdata($username);
		
		echo json_encode($getuserdata);		
	break;

}
