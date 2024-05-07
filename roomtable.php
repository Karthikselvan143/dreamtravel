<style>
.dbresult,.dbresult td,.dbresult th{
    border:1px solid black;
    border-collapse:collapse;
    padding: 10px;
    font-size: 20px;
    text-align: center;
}
.dbresult{
    width:100%;
    margin:auto;
}
.dbresult input[type="login"]{
  background-color:blue;
  color: white;
  cursor: pointer;
  font-weight: bold;
  border-radius: 5px;
  text-align: center;
  border: none;
  padding: 8px;
  width: 90px;
  position: relative;
}
.dbresult input[type="login"]:hover{
  background-color: darkblue;
}
.dbresult input[type="submit"]{
  background-color:red;
  color: white;
  cursor: pointer;
  font-weight: bold;
  border-radius: 5px;
  text-align: center;
  border: none;
  padding: 8px;
  width: 90px;
  position: relative;
}
.dbresult input[type="submit"]:hover{
  background-color: darkred;
}
</style>


<?php

include 'dbconnect.php';

$sql="select * from room";

$result=$con->query($sql);

if($result){

  echo '<h2 align=center><u>Data Base Report</u></h2>';
  echo '<h2 align=center><u>Room Form</u></h2>';

  echo '<table class="dbresult">';
  echo '<tr>';
  echo '<th>S_no</th>';
  echo '<th>Name</th>';
  echo '<th>E_mail</th>';
  echo '<th>Phone</th>';
  echo '<th>Address</th>';
  echo '<th>Check-in Date</th>';
  echo '<th>Check-out Date</th>';
  echo '<th>Room Type</th>';
  echo '<th>Operations</th>';
  echo '</tr>';

  while($row=mysqli_fetch_assoc($result)){
    $sno=$row['S_no'];
    $name=$row['Name'];
    $email=$row['E_mail'];
    $phone=$row['Phone'];
    $address=$row['Address'];
    $checkin=$row['Checkin'];
    $checkout=$row['Checkout'];
    $type=$row['Type'];

    echo '<tr>';
    echo '<td>'.$sno.'</td>';
    echo '<td>'.$name.'</td>';
    echo '<td>'.$email.'</td>';
    echo '<td>'.$phone.'</td>';
    echo '<td>'.$address.'</td>';
    echo '<td>'.$checkin.'</td>';
    echo '<td>'.$checkout.'</td>';
    echo '<td>'.$type.'</td>';
   
    echo '<td>
          <a href="roomupdate.php?updatesno='.$sno.'"><input type="login" value="Update"></a>
          <a href="roomdelete.php?deletesno='.$sno.'"><input type="submit" value="Delete"></a>
          </td>';
  }

  echo '<tr><th colspan="14"><a href="room form.html">Back to Form</a></th></tr>';
  echo '</table>';

}
else{
  echo "<script>";
  echo "alert('Record not Found.')";
  echo "</script>";
}

?>