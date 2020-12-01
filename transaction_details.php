
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
	<style type="text/css">
		
		body {
  			 font-family: 'Autour One';font-size: 22px;
		}
		table {

  margin-right: 5%;
 width:45%;

}
		td { 
                width:150px; 
                text-align:center; 
                border:1px solid black; 
                padding:5px 
              
            } 
		</style>
</head>
<body>



<nav class="navbar navbar-expand-sm navbar-dark bg-dark">

	<div class="container">
	
			
		<a href="" class="navbar-brand" >
			<img src="https://thumbs.dreamstime.com/b/icon-bank-black-background-vector-illustration-108342481.jpg" alt="logo" style="width:60px;">

		</a>

		<button class="navbar-toggler" data-toggle="collapse" data-target="
		#abc">
			<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="text-white">GRIP BANK</h1>
		<div class="collapse navbar-collapse" id="abc" >
			<ul class="navbar-nav text-center ml-auto">
				<li class="nav-item">
					<a href="homepg.html" class="nav-link">HOME</a>	
				</li>
				<li class="nav-item" >
					<a href="view_users.php" class="nav-link ">View Users</a>		
				</li>

				<li class="nav-item">
					<a href="transaction_details.php" class="nav-link">Transaction Details</a>	
				</li>

				<li class="nav-item">
					<a href="contact_us.html" class="nav-link">Contact Us</a>	
				</li>
			</ul>		
		</div>		
	</div>	
</nav>


<br>
<div class="container">
<?php

include 'connect.php';

$selectquery = " select * from transact order by transaction_id desc";

$result = mysqli_query($connect,$selectquery);

?>

<table class="table table-dark table-hover table-striped ">
<tr class="font-weight-bold text-capitalize text-success p-4 m-5">
<td>Transaction Id</td>
<td>Sender Name</td>
<td>Reciever Name</td>
<td>Amount Transferred</td>
<br>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["transaction_id"]; ?></td>
<td><?php echo $row["sender_name"]; ?></td>
<td><?php echo $row["reciever_name"]; ?></td>
<td><?php echo $row["amount"]; ?></td>

</tr>
<?php
$i++;
}
?>
</table>

</div>

</body>

</html>