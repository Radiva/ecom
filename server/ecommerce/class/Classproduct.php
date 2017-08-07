<?php
class product{

function displayallproduct(){
	$sql = "select a.*, b.namakategori, c.namabrand from tblproduct a INNER JOIN tblkategoriproduct b ON a.idkategori = b.idkategori INNER JOIN tblbrand c ON a.idbrand = c.idbrand";
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
	$sql = "select * from tblkategoriproduct";
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
	$sql = "SELECT * FROM tblkategoriproduct a INNER JOIN tblproduct b ON a.idkategori = b.idkategori INNER JOIN tblbrand c ON b.idbrand = c.idbrand where a.idkategori = '$idkategori'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$arr = array();
		while($data = mysql_fetch_array($query)){
			$idbarang = $data['idbarang'];
			$namabarang = $data['namabarang'];
			$deskripsi = $data['deskripsi'];
			$harga = $data['harga'];
			array_push($arr, array(
				'idbarang'=>$idbarang,
				'namabarang'=>$namabarang, 
				'deskripsi'=>$deskripsi,
				'harga'=>$harga,
			));
		}
		
		return $arr;
	}
	else{
		return false;
	}
}


function displaydetailproduct($idbarang){
	$sql = "SELECT * FROM tblproduct, tblbrand, tblkategoriproduct WHERE tblproduct.idbarang = '$idbarang' AND tblproduct.idbrand = tblbrand.idbrand AND tblproduct.idkategori = tblkategoriproduct.idkategori";
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
		$querygambar = mysql_query("select * from tblgambarproduct where idbarang = '$idbarang'");
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
	$sql = "SELECT a.idbarang, b.namabarang, b.deskripsi, b.harga, b.idkategori, c.namakategori, b.idbrand, d.namabrand,  SUM(a.jumlah) as jumlahpenjualan FROM tbldetailpenjualan a INNER JOIN tblproduct b ON b.idbarang = a.idbarang INNER JOIN tblkategoriproduct c ON c.idkategori = b.idkategori INNER JOIN tblbrand d ON d.idbrand = b.idbrand GROUP BY a.idbarang ORDER BY jumlahpenjualan DESC";
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

			array_push($arr, array('idbarang'=>$idbarang, 'namabarang'=>$namabarang, 'deskripsi'=>$deskripsi, 'harga'=>$harga, 'idkategori'=>$idkategori, 'namakategori'=>$namakategori, 'idbrand'=>$idbrand, 'namabrand'=>$namabrand));
		}
		return $arr;
	}
	else{
		return false;	
	}
}

function displaybestoffer(){
	$sql = "select d.idbestoffer, a.*, b.namakategori, c.namabrand from tblbestoffer d INNER JOIN tblproduct a INNER JOIN tblkategoriproduct b ON a.idkategori = b.idkategori INNER JOIN tblbrand c ON a.idbrand = c.idbrand WHERE d.idbarang = a.idbarang";
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

			array_push($arr, array('idbarang'=>$idbarang, 'namabarang'=>$namabarang, 'deskripsi'=>$deskripsi, 'harga'=>$harga, 'idkategori'=>$idkategori, 'namakategori'=>$namakategori, 'idbrand'=>$idbrand, 'namabrand'=>$namabrand));
		}
		return $arr;
	}
	else{
		return false;	
	}
}

}