<?php
/*
classproduct.php
Creator : Radiva H.O
Date    : 23 Juli 2017
*/

class product
{
	function displayBrand() {
		$sql = "SELECT * FROM tblBrand";
		$query = mysql_query($sql);

		if(mysql_num_rows($query)>0){
	    $arr = array();
	    while($row = mysql_fetch_array($query)){
	    	array_push($arr, array("idbrand" => $row['idbrand'], "namabrand" => $row['namabrand'] , "logobrand" => $row['logobrand']));
  	    }
	    return $arr;
        }
        else{
            return false;
        }
	}

	function displayProductByBrand($id) {
		$sql = "SELECT * FROM tblbrand a INNER JOIN tblproduct b ON b.idbrand = a.idbrand INNER JOIN tblkategoriproduct c ON c.idkategori = b.idkategori WHERE a.idbrand = '$id'";
		$query = mysql_query($sql);

		if(mysql_num_rows($query)>0){
	    $arr = array();
	    while($row = mysql_fetch_array($query)){
		$idbarang = $row['idbarang'];
		$gambar = mysql_fetch_array(mysql_query("select * from tblgambarproduct where idbarang = '$idbarang' limit 1"));
	    	array_push($arr, array("idbarang" => $row['idbarang'], "idbrand" => $row['idbrand'], 'namabrand'=>$row['namabrand'],'idkategori'=>$row['idkategori'], "namabarang" => $row['namabarang'] , "deskripsi" => $row['deskripsi'] , "gambar" => $gambar['gambar'], "video" => $row['video'], "brand" => $row['namabrand'], "kategori" => $row['namakategori'], "harga" => $row['harga']));
  	    }
	    return $arr;
        }
        else{
            return false;
        }
	}

	function tampilreviewproduct($id) {
		$sql = "SELECT * FROM tblproductreview WHERE Idbarang = '$id' ORDER BY idproductreview DESC";
		$query = mysql_query($sql);

		if(mysql_num_rows($query)>0){
	    $arr = array();
	    while($row = mysql_fetch_array($query)){
	    	array_push($arr, array("idproductreview" => $row['Idproductreview'], "username" => $row['Username'] , "idbarang" => $row['Idbarang'] , "comment" => $row['Comment'], 'tanggalcomment'=>$row['tanggalcomment']));
  	    }
	    return $arr;
        }
        else{
            return false;
        }
	}

	function insertreviewproduct($Data) {
		$columns = implode(", ",array_keys($Data));
        	$escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        	$values  = implode("', '", $escaped_values);
	        $sql = "INSERT INTO tblproductreview($columns) VALUES ('$values')";
        	return mysql_query($sql) ? true : false;
	}

	function displayallproduct(){
	$sql = "select a.*, b.namakategori, c.namabrand from tblProduct a INNER JOIN tblKategoriProduct b ON a.idkategori = b.idkategori INNER JOIN tblBrand c ON a.idbrand = c.idbrand";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$arr = array();
		while($data = mysql_fetch_array($query)){
			$idbarang = $data['idbarang'];
			$namabarang = $data['namabarang'];
			$deskripsi = $data['deskripsi'];
			$harga = $data['harga'];
			$idkategori = $data['idkategori'];
			$namakategori = $data['namakategori'];
			$idbrand = $data['idbrand'];
			$namabrand = $data['namabrand'];
			array_push($arr, array(
				'idbarang'=>$idbarang,
				'namabarang'=>$namabarang, 
				'deskripsi'=>$deskripsi,
				'harga'=>$harga,
				'idkategori'=>$idkategori,
				'namakategori'=>$namakategori,
				'idbrand'=>$idbrand,
				'namabrand'=>$namabrand
			));
		}
		
		return $arr;
	}
	else{
		return false;
	}
	
}

function kategoriproduct(){
	$sql = "select * from tblKategoriProduct";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$arr = array();
		while($data = mysql_fetch_array($query)){
			$idkategori = $data['idkategori'];
			$namakategori = $data['namakategori'];
			array_push($arr, array('idkategori'=>$idkategori, 'namakategori'=>$namakategori));
		}
		return $arr;
	}
	else{
		return false;
	}
}

function displayproductbykategori($idkategori){
	$sql = "SELECT * FROM tblKategoriProduct a INNER JOIN tblProduct b ON a.idkategori = b.idkategori INNER JOIN tblBrand c ON b.idbrand = c.idbrand where a.idkategori = '$idkategori'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$arr = array();
		while($data = mysql_fetch_array($query)){
			$idbarang = $data['idbarang'];
			$namabarang = $data['namabarang'];
			$deskripsi = $data['deskripsi'];
			$harga = $data['harga'];
			$gambar = mysql_fetch_array(mysql_query("select * from tblgambarproduct where idbarang = '$idbarang' limit 1"));
			array_push($arr, array(
				'idbarang'=>$idbarang,
				'namabarang'=>$namabarang, 
				'deskripsi'=>$deskripsi,
				'harga'=>$harga,
				'gambar'=>$gambar['gambar']
			));
		}
		
		return $arr;
	}
	else{
		return false;
	}
}


function displaydetailproduct($idbarang){
	$sql = "SELECT * FROM tblProduct, tblBrand, tblKategoriProduct WHERE tblProduct.idbarang = '$idbarang' AND tblProduct.idbrand = tblBrand.idbrand AND tblProduct.idkategori = tblKategoriProduct.idkategori";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)==1){
		$arr = array();
		$data = mysql_fetch_array($query);
		$idbarang = $data['idbarang'];
		$namabarang = $data['namabarang'];
		$deskripsi = $data['deskripsi'];
		$video = $data['video'];
		$idbrand = $data['idbrand'];
		$namabrand = $data['namabrand'];	
		$logobrand = $data['logobrand'];
		$idkategori = $data['idkategori'];
		$namakategori = $data['namakategori'];
		$harga = $data['harga'];
		$querygambar = mysql_query("select * from tblGambarProduct where idbarang = '$idbarang'");
		$gambarproduct = array();
		if(mysql_num_rows($querygambar)>0){
			while($datagambar = mysql_fetch_array($querygambar)){
				$gambar = $datagambar['gambar'];
				array_push($gambarproduct, $gambar);
			}
		}else if(mysql_num_rows($querygambar)==0){
			$gambarproduct = null;
		}
		array_push($arr, array(
			'idbarang'=>$idbarang,
			'namabarang'=>$namabarang, 
			'deskripsi'=>$deskripsi,
			'video'=>$video,
			'namabrand'=>$namabrand,
			'logobrand'=>$logobrand,
			'namakategori'=>$namakategori,
			'harga'=>$harga,
			'gambar'=>$gambarproduct
		));

		return $arr;
	}
	else{
		return false;
	}

}

function displaypopularproduct(){
	$sql = "SELECT a.idbarang, b.namabarang, b.deskripsi, b.harga, b.idkategori, c.namakategori, b.idbrand, d.namabrand,  SUM(a.jumlah) as jumlahpenjualan FROM tblDetailPenjualan a INNER JOIN tblProduct b ON b.idbarang = a.idbarang INNER JOIN tblKategoriProduct c ON c.idkategori = b.idkategori INNER JOIN tblBrand d ON d.idbrand = b.idbrand INNER JOIN tblpenjualan e ON e.notapemesanan = a.notapemesanan WHERE e.statuspenjualan != 'Pending' GROUP BY a.idbarang ORDER BY jumlahpenjualan DESC";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$arr = array();
		while($data = mysql_fetch_array($query)){
			$idbarang = $data['idbarang'];
			$namabarang = $data['namabarang'];
			$deskripsi = $data['deskripsi'];
			$harga = $data['harga'];
			$idkategori = $data['idkategori'];
			$namakategori = $data['namakategori'];
			$idbrand = $data['idbrand'];
			$namabrand = $data['namabrand'];
			$gambar = mysql_fetch_array(mysql_query("select * from tblgambarproduct where idbarang = '$idbarang' limit 1"));
			array_push($arr, array('idbarang'=>$idbarang, 'namabarang'=>$namabarang, 'gambar'=>$gambar['gambar'], 'deskripsi'=>$deskripsi, 'harga'=>$harga, 'idkategori'=>$idkategori, 'namakategori'=>$namakategori, 'idbrand'=>$idbrand, 'namabrand'=>$namabrand));
		}
		return $arr;
	}
	else{
		return false;	
	}
}

function displaybestoffer(){
	$sql = "select d.idbestoffer, a.*, b.namakategori, c.namabrand from tblBestOffer d INNER JOIN tblProduct a INNER JOIN tblKategoriProduct b ON a.idkategori = b.idkategori INNER JOIN tblBrand c ON a.idbrand = c.idbrand WHERE d.idbarang = a.idbarang";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$arr = array();
		while($data = mysql_fetch_array($query)){
			$idbestoffer = $data['idbestoffer'];
			$idbarang = $data['idbarang'];
			$namabarang = $data['namabarang'];
			$deskripsi = $data['deskripsi'];
			$harga = $data['harga'];
			$idkategori = $data['idkategori'];
			$namakategori = $data['namakategori'];
			$idbrand = $data['idbrand'];
			$namabrand = $data['namabrand'];
			$gambar = mysql_fetch_array(mysql_query("select * from tblgambarproduct where idbarang = '$idbarang' limit 1"));

			array_push($arr, array('idbarang'=>$idbarang, 'namabarang'=>$namabarang, 'gambar'=>$gambar['gambar'], 'deskripsi'=>$deskripsi, 'harga'=>$harga, 'idkategori'=>$idkategori, 'namakategori'=>$namakategori, 'idbrand'=>$idbrand, 'namabrand'=>$namabrand));
		}
		return $arr;
	}
	else{
		return false;	
	}
}
}
?>