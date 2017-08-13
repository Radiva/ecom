<?php

include '../konfigurasi/config.php';
include '../class/Classproduct.php';

$product = new product;

$option = $_GET['option'];

switch($option){
    // Insert review product
    case 0:
	$comment = $_POST['comment'];
	$username = $_POST['username'];
	$idbarang = $_POST['idbarang'];
	$data = array(
		'Idbarang'=>$idbarang,
		'Username'=>$username,
		'Comment'=>$comment
	);
	$insertreview = $product->insertreviewproduct($data);
	echo json_encode($insertreview);
    break;
    // display riview product
    case 1:
	$idbarang = $_POST['idbarang'];
	$displayreviewproduct = $product->tampilreviewproduct($idbarang);
	echo json_encode($displayreviewproduct);
    break;
    // display all product
    case 2:
	$displayallproduct = $product->displayallproduct();
	echo json_encode($displayallproduct);
    break;

    // display kategori product
    case 3:
	$kategoriproduct = $product->kategoriproduct();
	echo json_encode($kategoriproduct);
    break;

    // display product by kategori
    case 4:
	$idkategori = $_POST['idkategori'];
	$displayproductbykategori = $product->displayproductbykategori($idkategori);
	echo json_encode($displayproductbykategori);
    break;

    // detail product
    case 5:
	$idbarang = $_POST['idbarang'];
	$displaydetailproduct = $product->displaydetailproduct($idbarang);
	echo json_encode($displaydetailproduct);
    break;

    // display popular product
    case 6:
 	$displaypopularproduct = $product->displaypopularproduct();
	echo json_encode($displaypopularproduct);
    break;

    case 7:
	$displaybestoffer = $product->displaybestoffer();
	echo json_encode($displaybestoffer);
    break;

    case 8:
        $data = $product->displayBrand();
        echo json_encode($data);
        break;

    case 9:
        $id = $_POST['idbrand'];
        $data = $product->displayProductByBrand($id);
        echo json_encode($data);
        break;

    case 10:
        $id = $_GET['id'];
        $data = $product->tampilreviewproduct($id);
        echo json_encode($data);
        break;
    
    default:
        # code...
        break;
}
