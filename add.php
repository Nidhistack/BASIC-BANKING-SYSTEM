<?php
include('connect.php'); // Database Config
/* Add Student Detail Php  */

if( isset($_POST['submit'])) // Check form submit or not
{
	
$name=$_POST['name'];	
$reciever=$_POST['reciever'];

$amount=$_POST['amount'];		


$query="INSERT INTO transact values(default,'$name','$reciever', '$amount')";	
$result=mysqli_query($connect,$query);	

if ( false===$result ) {
  printf("error: %s\n", mysqli_error($connect));
}
else {
  echo 'Registration done';
}
}
mysqli_close($connect);
?>


<?php

if( isset($_POST['submit'])) // Check form submit or not
{
$customer_id=$_POST['customer_id'];
$name=$_POST['name']; 
$reciever=$_POST['reciever'];

$amount=$_POST['amount'];   


$query="INSERT INTO transact values(default,'$name','$reciever', '$amount')"; 
$result=mysqli_query($connect,$query);  

if ( false===$result ) {
  printf("error: %s\n", mysqli_error($connect));
}
else {
  echo 'Registration done';
}
}
mysqli_close($connect);
?>