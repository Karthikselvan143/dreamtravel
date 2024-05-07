<?php

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $place=$_POST['place'];
  $guest=$_POST['guest'];
  $citizen=$_POST['citizen'];
  $emgnum=$_POST['emg'];
  $type=$_POST['travel'];

  include 'dbconnect.php';

  $sql="select * from login where E_mail='$email'";
  $result=$con->query($sql);

  if($result->num_rows>0){

    $sql="insert into travel values('S_no','$name','$email','$phone','$address','$date','$time','$place','$guest','$citizen','$emgnum','$type')";

    if($con->query($sql)==true){
      echo "<script>";
      echo "alert('Booking Successfully!')";
      echo "</script>";
      header('location:traveltable.php');
     
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