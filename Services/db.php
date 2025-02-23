


<?php

session_start();
header('location:services.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'gentle_hands_grace');
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$reg="insert into services(Name, Email, Phone, address) values('$name' , '$email', '$phone' , '$address')";
mysqli_query($con, $reg);
echo "Booking Successful";	

?>





