
<!DOCTYPE html>
<html>
<head>
  <title>BANKING APPLICATION</title>
     
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

   
<style type="text/css">
  .avatar {
  vertical-align: middle;
  width: 100px;
  height: 100px;
  border-radius: 50%;
}
</style>
</head>
<body>

<?php
include('connect.php');

      $extract = mysqli_query($connect,"SELECT * FROM customer WHERE customer_id='" . $_GET['customer_id'] . "'");
      
        while ($row = mysqli_fetch_assoc($extract))
        {
          $customer_id=$row['customer_id'];
          $name= $row['name'];
          $email_id= $row['email_id'];
          $balance= $row['balance'];
          
        }

?>

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


  <div class="container" >

      <h1 class="font-weight-bold text-lg-center">TRANSFER MONEY</h1>
      <div class="col-lg-6 col-md-6 col-12 " >
            <img src="https://img.favpng.com/0/15/12/computer-icons-avatar-male-user-profile-png-favpng-ycgruUsQBHhtGyGKfw7fWCtgN.jpg" class="avatar">
      </div>

    <h1 class="col-lg-6 col-md-6 col-12 " id="sname" name="name"><?=$name?> </h1>
    <h3 class="col-lg-6 col-md-6 col-12 " ><strong>Email_id: </strong> <?=$email_id?></h3>
    <h3 class="col-lg-6 col-md-6 col-12 " ><strong>Balance: </strong> <?=$balance?></h3>
    
    <hr class="w-25 ml-0 ">

    <div class="container  bg-dark text-white font-weight-bold ml-lg-0" style="border-radius: 15px 50px 30px;">
       <h3 class="font-weight-bold ">Transferring To:</h3>
    <form class="form-inline" method="get" action="transfer.php">
          
          <div class="form-group p-5 ">
         <div hidden="true" name="user"><?=$customer_id?></div>
        <input type="number" hidden name="user"value="<?=$customer_id?>">
         
          <label  class="mb-3 mr-sm-3 " >Name:</label>
      
                <select name="receiver" type="text" id="rname" class="form-control-lg mb-2 mr-sm-2" id="dropdown" value="" required>
                      <option>Choose Reciever</option>
                        <?php
                       
                        $res = mysqli_query($connect, "SELECT * FROM customer WHERE customer_id!='" . $_GET['customer_id'] . "'");
                        while($row = mysqli_fetch_array($res)) {
                            echo("<option > "."  ".$row['name']."</option>");
                        }

                        ?>
                 </select>
        
        
           <br>
           <label class="mb-2 mr-sm-2">Amount:</label>
          <input type="number" name="amountyy" id="amount" required  class="form-control-lg mb-2 mr-sm-2" placeholder="500" >
         
       <input  type="submit" name="submit"  onclick="myfun()"  style="padding: 20px 17px; font-size: 18px; border-radius: 14px; " class="btn btn-outline-light btn-success" value="Transfer Money">

  </form>

  

</body>
</html>