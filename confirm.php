
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		</style>

</head>
<body>

<?php
include('connect.php');

      $extract = mysqli_query($connect,"SELECT * FROM customer WHERE customer_id='" . $_GET["customer_id"] . "'");
        
        while ($row = mysqli_fetch_assoc($extract))
        {
          $name= $row['name'];
        
          $email_id= $row['email_id'];
          $balance= $row['balance'];
          
        }

?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">

	<div class="container">

		<a href="" class="navbar-brand">GripBank!</a>

		<button class="navbar-toggler" data-toggle="collapse" data-target="
		#abc">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="abc" >
			<ul class="navbar-nav text-center ml-auto">
				<li class="nav-item">
					<a href="#" class="nav-link">HOME</a>	
				</li>
				<li class="nav-item" >
					<a href="#" class="nav-link ">View Users</a>		
				</li>

				<li class="nav-item">
					<a href="#" class="nav-link">Transaction Details</a>	
				</li>

				<li class="nav-item">
					<a href="#" class="nav-link">Contact Us</a>	
				</li>
			</ul>		
		</div>		
	</div>	
</nav>
<br><br>

<div class="container">
             
  <table class="table table-dark table-hover table-striped">
    <thead>
      <tr>
        <th>Sender</th>
        <th>Reciever</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?=$name?></td>
        <td><?=$name?></td>
        <td><?=$balance?></td>
      </tr>
     
    </tbody>
  </table>


  

<h3 class="text-center font-italic">Are you sure you want to make this transaction?</h3>
  <div class="container-fluid justify-content-center row">
    <a href="#" class="btn btn-outline-dark p-4 m-5 btn-success">YES</a> 
    <a href="view_users.php" class="btn btn-outline-dark p-4 m-5 btn-danger">NO</a>
    
  </div>
</div>











</body>
</html>