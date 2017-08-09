<?php

class video
{
   function displayvideo(){
   		$sql = "select * from tblVideo";
   		$query = mysql_query($sql);

   		if(mysql_num_rows($query)>0){
   			$arr = array();
   			while($data = mysql_fetch_array($query)){
   				array_push($arr, array('idvideo'=>$data['idvideo'], 'title'=>$data['title'], 'video'=>$data['video']));
   			}
   			return $arr;
   		}
   		else{
   			return false;
   		}
   }

   function insertvideo($Data){
   		$columns = implode(", ",array_keys($Data));
        $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
        $values  = implode("', '", $escaped_values);
        $sql = "INSERT INTO tblvideo($columns) VALUES ('$values')";
        return mysql_query($sql) ? true : false;
   }

   function deletevideo($idvideo){
   		$query = mysql_query("Delete from tblvideo where idvideo = '$idvideo'");
   		if($query){
   			return true;
   		}
   		else{
   			return false;
   		}
   }
}