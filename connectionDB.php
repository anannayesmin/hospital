<?php
$serverName="localhost";
$userName="root";
$password="";
$dbName="hospital";

$conn=New mysqli($serverName,$userName,$password,$dbName);
if(!$conn){
    die("connection error");
}//else{
   // echo "connected success";
//}
?>