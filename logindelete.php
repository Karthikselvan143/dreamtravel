<?php

if(isset($_GET['deletesno'])){

    $sno=$_GET['deletesno'];

    include 'dbconnect.php';

    $sql="delete from login where S_no='$sno'";

    if($con->query($sql)){
        echo "<script>";
        echo 'alert("Deleted Successfully")';
        echo "</script>";
        header('location:logintable.php');
    }
    else{
        echo "<script>";
        echo 'alert("connection failed:".$con->connect_error)';
        echo "</script>";
    }

}

?>