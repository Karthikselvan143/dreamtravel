<?php

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $message=$_POST['message'];

  include 'dbconnect.php';

  $sql="insert into feedback values('S_no','$name','$email','$message')";

  if($con->query($sql)){
    echo "<script>";
    echo "alert('Submitted Successfully.')";
    echo "</script>";
    header('location:contacttable.php');
  }
  else{
    echo "<script>";
    echo "alert('Record not found.')";
    echo "</script>";
  }
}

?>