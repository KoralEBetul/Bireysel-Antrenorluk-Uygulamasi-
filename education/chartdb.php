<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="enerji";

$conn=new mysqli("$servername","$username","$password","$dbname");

if($conn){

}else{
    echo "Connection failed";
}


?>