<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="./images/title.jpg">
    <link rel="stylesheet" type="text/css" href="./css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .register .left h1{
            margin-left: 190px;
        }
        .register .right h1{
            margin-top: 50px;
        }
    </style>
</head>
<body>


    <!-- form -->
    <div class="register">
        <div class="left">
            <h1>Update Form</h1>
            <div class="logo">
               <a href=""><i class='bx bxl-facebook'></i></a>
               <a href=""><i class='bx bxl-twitter' ></i></a>
               <a href=""><i class='bx bxl-instagram' ></i></a>
            </div>
            <p>If any details given are incorrect please correct them here.</p>
           <form action="" method="post">
            <input type="text" class="form-control" name="name" placeholder=" Name" required>
            <input type="email" class="form-control" name="email" placeholder="  E-mail" required>
            <input type="password" class="form-control" name="password" placeholder=" Password" required>
            <input type="password" class="form-control" name="cpassword" placeholder=" Conform Password" required>
            <input type="submit" value="Update" name="register">
           </form>
        </div>
        <div class="right">
            <h1>Welcome Friend</h1>
            <p>If any details given are incorrect please correct them here.</p>
        </div>
    </div>

       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    
</body>
</html>



<?php

include 'dbconnect.php';

$sno=$_GET['updatesno'];

$sql="select * from register where S_no=$sno";

$result=$con->query($sql);

$row=mysqli_fetch_assoc($result);
$sno=$row['S_no'];
$name=$row['Name'];
$email=$row['E_mail'];
$password=$row['Password'];
$cpassword=$row['C_Password'];

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
        echo "alert('This e-mail is already registered. Please check email')";
        echo "</script>";
    }
    else{
        if($password==$cpassword){

            $sql="update register set S_no='$sno' , Name='$name' , E_mail='$email' , Password='$password' , C_Password='$cpassword' where S_no=$sno";
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



