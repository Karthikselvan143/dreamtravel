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
  width: 100px;
  position: relative;
  left: -15px;
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
  width: 100px;
  position: relative;
  left: 15px;
}
.dbresult input[type="submit"]:hover{
  background-color: darkred;
}
</style>


<?php

include 'dbconnect.php';

$sql="select * from login";

$result=$con->query($sql);

if($result){

  echo '<h2 align=center><u>Data Base Report</u></h2>';
  echo '<h2 align=center><u>Login Form</u></h2>';

  echo '<table class="dbresult">';
  echo '<tr>';
  echo '<th>S_no</th>';
  echo '<th>E_mail</th>';
  echo '<th>Password</th>';
  echo '<th>Operations</th>';
  echo '</tr>';

  while($row=mysqli_fetch_assoc($result)){
    $sno=$row['S_no'];
    $email=$row['E_mail'];
    $password=$row['Password'];

    echo '<tr>';
    echo '<td>'.$sno.'</td>';
    echo '<td>'.$email.'</td>';
    echo '<td>'.$password.'</td>';
    echo '<td>
          <a href="loginupdate.php?updatesno='.$sno.'"><input type="login" value="Update"></a>
          <a href="logindelete.php?deletesno='.$sno.'"><input type="submit" value="Delete"></a>
          </td>';
    }

  echo '<tr><th colspan="14"><a href="login.html">Back to Form</a></th></tr>';
  echo '</table>';

}
else{
    echo "<script>";
    echo "alert('Record not Found.')";
    echo "</script>";
}

?>