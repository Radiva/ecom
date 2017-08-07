<?php

class banner
{
   function displaybanner(){
   		$sql = "select * from tblbanner";
   		$query = mysql_query($sql);

   		if(mysql_num_rows($query)>0){
   			$arr = array();
   			while($data = mysql_fetch_array($query)){
   				array_push($arr, array('idbanner'=>$data['idbanner'], 'judul'=>$data['judul'], 'gambar'=>$data['gambar'], 'content'=>$data['content']));
   			}
   			return $arr;
   		}
   		else{
   			return false;
   		}
   }

   function insertbanner($Data){
   		$columns = implode(", ",array_keys($Data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        $values  = implode("', '", $escaped_values);
        $sql = "INSERT INTO tblbanner($columns) VALUES ('$values')";
        return mysql_query($sql) ? true : false;
   }

   function deletebanner($idbanner){
   		$query = mysql_query("Delete from tblbanner where idbanner = '$idbanner'");
   		if($query){
   			return true;
   		}
   		else{
   			return false;
   		}
   }
}