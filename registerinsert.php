<?php

if(isset($_POST['register'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    include 'dbconnect.php';

    $sql="select * from  register where E_mail='$email'";
    $result=$con->query($sql);

    if($result->num_rows>0){
        echo "<script>";
        echo "alert('E-mail already registered. Please Login.')";
        echo "</script>";
    }
    else{
        if($password==$cpassword){

            $sql="insert into register values('S_no','$name','$email','$password','$cpassword')";

            if($con->query($sql)==true){
                echo "<script>";
                echo "alert('Successfully Registered.')";
                echo "</script>";
                header('location:registertable.php');
            }
            else{
                echo "<script>";
                echo  "alert(. $sql_insert .  . $con->error)";
                echo "</script>";
            }
        }
        else{
            echo "<script>";
            echo "alert('Password Dont Match. Please enter the correct passsword.')";
            echo "</script>";
        }

    }
}

?>



