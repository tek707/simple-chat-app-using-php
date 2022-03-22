<?php
session_start();


//connecting to database
$servername= 'localhost';
$username='root';
$password='';
$dbname = 'htuconnect';

$mysqli = new mysqli($servername, $username,$password,$dbname)or die (mysqli_error($mysqli));






$msg= "";
$userid =15;
//save  into databse


$_SESSION['Userid'] = $userid;




if (isset($_POST['send'] )){
  $msg= $_POST['msg'];
$userid ;

  $mysqli->query("INSERT INTO group_message ( from_user_id, message ) VALUES ('$userid','$msg')") or
 die ($mysqli->error);

 header("location:index.php");
// delete database


    }else {

    }







  




?>