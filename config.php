<?php $mysqli= new mysqli('localhost', 'root', '12345','blog'); 
if($mysqli->connect_errno){
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}   
 ?> 