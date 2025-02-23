


<?php

session_start();
header('location:services.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'gentle_hands_grace');
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$reg="insert into contact(name, email, subject, message) values('$name' , '$email', '$subject' , '$message')";
mysqli_query($con, $reg);
echo "Booking Successful";	

?>





