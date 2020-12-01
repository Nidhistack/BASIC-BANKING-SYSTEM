

<!DOCTYPE html>
<html>
<head>
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
		     .loader{
		     	position: fixed;
		     	z-index: 99;
		     	top: 0;
		     	left: 0;
		     	width: 100%;
		     	height: 100%;
		     	background: white;
		     	display: flex;
		     	justify-content: center;
		     	align-items: center;

		     }
		      .loader > img {
		     	width: 300px;
		     }
		     .loader.hidden{
		     	animation: fadeOut 5s;
		     	animation-fill-mode: forwards;
		     }
		    
		     @keyframes fadeOut {
		     	100%{
		     		opacity: 100%;
		     		visibility: hidden;
		     	}
		     }
	</style>

	<title></title>
</head>
<body>

<?php
		include('connect.php');
		  $extract_sender = mysqli_query($connect,"SELECT * FROM customer WHERE customer_id='" . $_GET['user'] . "'");
		   $extract_reciever = mysqli_query($connect,"SELECT * FROM customer WHERE name ='" . $_GET['receiver'] . "'");
		        while ($row = mysqli_fetch_assoc($extract_sender))
		        {
		          $name= $row['name'];
		          $email_id= $row['email_id'];
		          $balance= $row['balance'];
		          
		        }
		        while ($row = mysqli_fetch_assoc($extract_reciever))
		        {
		          $rname= $row['name'];
		          $remail_id= $row['email_id'];
		          $rbalance= $row['balance'];
		          
		        }

		$flag=false;
		$msg1=$msg2=$msg3=$msg4=" ";
		if( isset($_GET['submit'])) {  // Check form submit or not

		if(! empty($_GET['receiver'])) {
			

		 $receiver_name =$_GET['receiver'];
		 $amount =$_GET['amountyy'];
		 

				if( $amount < 100 or $balance < $amount ){
						   $msg1=" Transaction Value must be 100 or greater";
				}
				else if(($balance - $amount) < 100) {
					$msg2="Minimum balance requirement  not satisfied for sender : "."$name";
				}
			
				else{
				$connect->query(" update customer set balance = balance + $amount WHERE name='" . $_GET['receiver'] . "' ");
				$connect->query(" update customer set balance = balance - $amount WHERE customer_id='" . $_GET['user'] . "' ");
				$flag=true;
				}

		if ($flag ==true) {
			$query="INSERT INTO `transact` values(default,'$name','$receiver_name', $amount)"; 
			$result=mysqli_query($connect,$query); 
			$msg3 = "Transaction Successfull :)";
		}
		else
		{
			$msg4 =  " Transaction Unsucesssful :( ";
		}
		 

		}
		}



		mysqli_close($connect);
?>
<div class="loader hidden ">
			<div>Please Wait,While Your Transaction is being Proccessed....<br></div><br>
			<div>
				<img src="ajax-loader.gif">
			</div>
			
		 
</div>

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
		        <td><?=$_GET['receiver']?></td>
		        <td><?=$_GET['amountyy']?></td>
		      </tr>
		     
		    </tbody>
		  </table>


		  
		<br>
		  <div class="container  bg-dark text-white font-weight-bold ml-lg-0" style="border-radius: 15px 50px 30px;">
		  	
		<h2 class="text-center font-italic"><?php echo "$msg3"."$msg4"; ?></h2>
		<br>
		<h3 class="container justify-content-center">
				<?php 

					echo "$msg1"."<br>"."$msg2";

				?>	
		</h3>
		  <div class="container-fluid justify-content-center row">

		    <a href="view_users.php" class="btn btn-outline-dark font-weight-bold p-2 m-5 btn-success" style="font-size: 25px; border-radius: 25px;">OKAYY:))</a> 

		  </div>

		</div>
</div>






</body>
</html>
