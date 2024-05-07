<?php


if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    include 'dbconnect.php';

    $sql="select * from register where E_mail='$email' and Password='$password'";
    $result=$con->query($sql);

    if($result->num_rows==1){

        $sql="insert into login values('S_no','$email','$password')";

        if($con->query($sql)==true){
            echo "<script>";
            echo "alert('Login Successfully!. Please go to home page.')";
            echo "</script>";
            header('location:logintable.php');
        }
        else{
            echo "<script>";
            echo "alert('Record not found.')";
            echo "</script>";
        }
    }
    else{
        echo "<script>";
        echo "alert('Incorrect email or password. Please try again.')";
        echo "</script>";
    }
}

?>




