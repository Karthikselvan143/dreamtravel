<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="icon" href="./images/title.jpg">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .signin .left h1{
            padding-top: 170px;
        }
        .signin .right h1{
            margin-left: 28px;
        }
        .signin .right p{
            width: 330px;
            text-align-last:center ;
            margin-left: 40px;
        }
    </style>
</head>
<body>


    <!-- form -->
    <div class="signin">
        <div class="left">
            <h1>Welcome Friend</h1>
            <p>If any details given are incorrect please correct them here.</p>
        </div>
        <div class="right">
            <h1>Update Form</h1>
            <div class="logo">
               <a href=""><i class='bx bxl-facebook'></i></a>
               <a href=""><i class='bx bxl-twitter' ></i></a>
               <a href=""><i class='bx bxl-instagram' ></i></a>
            </div>
            <p>If any details given are incorrect please correct them here.</p>
           <form action="" method="post">
            <input type="email" class="form-control" name="email" placeholder="  E-mail" required>
            <input type="password" class="form-control" name="password" placeholder=" Password" required>
            <input type="submit" value="Update" name="login"><br><br>
           </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    
</body>
</html>


<?php

include 'dbconnect.php';

$sno=$_GET['updatesno'];

$sql="select * from login where S_no=$sno";

$result=$con->query($sql);

$row=mysqli_fetch_assoc($result);
$sno=$row['S_no'];
$email=$row['E_mail'];
$password=$row['Password'];

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from register where E_mail='$email' and Password='$password'";
    $result=$con->query($sql);

    if($result->num_rows==1){

        $sql="update login set S_no='$sno' , E_mail='$email' , Password='$password' where S_no=$sno";

        if($con->query($sql)){
            echo "<script>";
            echo "alert('Updated Successfully')";
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
        echo "alert('Enter valid email and password.')";
        echo "</script>";
    }

    
}
?>


