<?php

$dbhost="localhost";
$dbusername="root";
$dbpassword="";
$dbname="dreamtravel";

$con=new mysqli($dbhost,$dbusername,$dbpassword,$dbname);

if($con->connect_error){
    die("connection failed:".$con->connect_error);
}

?>