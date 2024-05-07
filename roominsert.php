<?php

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $checkin=$_POST['checkin'];
  $checkout=$_POST['checkout'];
  $type=$_POST['room'];

  include 'dbconnect.php';

  $sql="select * from login where E_mail='$email'";
  $result=$con->query($sql);

  if($result->num_rows>0){

    $sql="insert into room values('S_no','$name','$email','$phone','$address','$checkin','$checkout','$type')";

    if($con->query($sql)){
      echo "<script>";
      echo "alert('Booking Successfully!')";
      echo "</script>";
      header('location:roomtable.php');
    }
    else{
      echo "<script>";
      echo "alert('Record not found.')";
      echo "</script>";
    }
  }
  else{
    echo "<script>";
    echo "alert('If you have not login yet. Please login')";
    echo "</script>";
  }
}

?>