<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* form */
.form h2{
    text-align: center;
    font-family: cursive;
    color: orangered;     
}
.form #input{
    width: 300px;
    height: 5px;
    background-color: cornflowerblue;
    border: none;
    margin-left: 490px;
}
.form form{
    margin-top: -50px;
    margin-left:400px;
}
.form .trip{
    background-color:rgb(240, 240, 213);
    box-shadow: .2px .2px gray;
    width: 98%;
    margin-left: 15px;
    border-radius: 5px;
    padding: 20px;
}
.form form label{
    font-size: 18px;
    font-weight: 600;
    margin-top: 20px;
    font-family: cursive;
}
.form form input{
    width: 300px;
    margin-top: 20px;
    margin-left: 50px;
    box-shadow: 1px 1px .2px gray;
    background-color: rgb(224, 214, 203);
}
.form form select{
    margin-top: 20px;
    margin-left: 50px;
    width: 300px;
    box-shadow: 1px 1px .2px gray;
    background-color: rgb(224, 214, 203);
}
.form form input[type="submit"]{
    width: 170px;
    background-color:blue;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    color: white;
    border: none;
    margin-top: 30px;
    margin-left: 100px;
    position: relative;
    top: 10px;
    left: 70px;
}
.form form input[type="submit"]:hover{
    background-color: darkblue;
    box-shadow: 1px 1px .2px gray;  
}
.form p{
    text-align: center;
    margin-top: 10px;

}
@media(max-width:379px){
    .form .trip{
        margin-left: 4px;
        margin-top: -50px;
    }
    .form #input{
        width: 250px;
        margin-left: 40px;
    }
    .form form{
        margin-top: -50px;
        margin-left:0px;
    }
    .form form input{
        margin-left: -180px;
        margin-top: 50px;
    }
    .form form select{
        margin-top: -15px;
        margin-left: -60px;
        width: 180px;
    }
    .form form label{
        position: relative;
        top: -18px;
    }
    .form form input[type="submit"]{
       position: relative;
       left: -55px;
       bottom: 10px;
    }
}

</style>

<!-- form -->
<div class="form">
    <div class="trip">
     <h2>Room Booking Form</h2>
     <input type="text" id="input">
     <form action="" method="post">
       <table>
         <tr>
           <td><label for="name" class="form-label">Full Name :</label></td>
           <td> <input type="text" class="form-control" name="name" required></td>
         </tr><br><br><br>
         <tr>
           <td><label for="email" class="form-label">E-mail :</label></td>
           <td><input type="email" class="form-control" name="email" required></td>
         </tr>
         <tr>
           <td><label for="phone" class="form-label">Phone Number :</label></td>
           <td><input type="tel" class="form-control" name="phone" required></td>
         </tr>
         <tr>
           <td> <label for="address" class="form-label">Address :</label></td>
           <td><input type="text" class="form-control" name="address" required></td>
         </tr>
         <tr>
           <td><label for="checkin" class="form-label">Check-in Date :</label></td>
           <td><input type="date" class="form-control" name="checkin" required></td>
         </tr>
         <tr>
           <td><label for="checkout" class="form-label">Check-out Date :</label></td>
           <td><input type="date" class="form-control" name="checkout" required><br></td>
         </tr>
         <tr>
           <td> <label for="room" class="form-label">Room Type :</label></td>
           <td>
            <select name="room" class="form-control" required>
                <option>Standard Room</option>
                <option>Deluxe Room</option>
                <option>Suite</option>
              </select>
           </td>
         </tr>
         <tr>
           <td><input type="Submit" value="Update" name="submit" id="button"></td>
         </tr>
       </table>
     </form>
    </div>
   </div>


<?php

include 'dbconnect.php';

$sno=$_GET['updatesno'];

$sql="select * from room where S_no=$sno";

$result=$con->query($sql);

$row=mysqli_fetch_assoc($result);
    $sno=$row['S_no'];
    $name=$row['Name'];
    $email=$row['E_mail'];
    $phone=$row['Phone'];
    $address=$row['address'];
    $checkin=$row['Checkin'];
    $checkout=$row['Checkout'];
    $type=$row['Type'];

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
    $type=$_POST['room'];

    $sql="select * from login where E_mail='$email'";
    $result=$con->query($sql);

    if($result->num_rows==1){

        $sql="update room set S_no='$sno' , Name='$name' , E_mail='$email' , Phone='$phone' , Address='$address' , Checkin='$checkin' , Checkout='$checkout' , Type='$type' where S_no=$sno";

        if($con->query($sql)){
            echo "<script>";
            echo "alert('Updated Successfully')";
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
        echo "alert('Enter valid email.')";
        echo "</script>";
    }
}

?>

