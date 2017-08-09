<?php

include '../konfigurasi/config.php';
include '../class/Classproduct.php';

$product = new product;

$option = $_GET['option'];

switch($option){
    // display all product
    case 1:
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
        $id = $_POST['id'];
        $data = $product->tampilreviewproduct($id);
        echo json_encode($data);
        break;
    
    default:
        # code...
        break;
}
