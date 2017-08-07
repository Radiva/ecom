<?php

class user
{
    function cekuser($username){
        $username = $username;
        
        $query_cek = mysql_query("select * from tbluser where username = '$username'");
        
        if(mysql_num_rows($query_cek)>0){
            return false;
        }
        else{
            return true;
        }
    }
    
    function insertuser($Data){
        if($this->cekuser($Data['username'])){ 
            
            $columns = implode(", ",array_keys($Data));
            $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
            $values  = implode("', '", $escaped_values);
            $sql = "INSERT INTO tbluser($columns) VALUES ('$values')";
            return mysql_query($sql) ? true : false;

        }
        else{
            return false;
       
        }
    }

    function updateuserdata($Data, $username){
	    $columns = implode(", ",array_keys($Data));
            $escaped_values = array_map('mysql_real_escape_string', array_values($Data));
            $values  = implode("', '", $escaped_values);
            $sql = "update tbluser set ($columns) = ($values) where username = '$username'";
            return mysql_query($sql) ? true : false;
    }
    
    function login($Data){
        $username = $Data['username'];
        $password = $Data['password'];
        $sql = "select a.username, b.namagroupuser from tbluser a INNER JOIN tblgroupuser b ON b.idgroupuser = a.idgroupuser where a.username='$username' and a.password = '$password'";
        $query = mysql_query($sql);
        if(mysql_num_rows($query)==1){
                $user= array(
                  'username'=>$datauser['username'],
		          'namagroupuser'=>$datauser['namagroupuser']
                );

               return $user;
        }
        else{
            return false;
        }
        
    }
    
    function getuserdata($username){
        $sql = "select * from tbluser a INNER JOIN tblgroupuser b ON b.idgroupuser = a.idgroupuser where a.username='$username'";
        $query = mysql_query($sql);
        if(mysql_num_rows($query)>0){
            return mysql_fetch_array($query);
        }
        else{
            return false;
        }     
    }
    
    
}