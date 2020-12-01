<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</head>
<body>
<script type=""></script>

<?php

$nm=$_GET["name"];

echo "<script>
setTimeout(function () { 
		swal({
			  title: 'Thank You '+'$nm' + ' For Contacting Us ',
			  type: 'success',
			   confirmButtonText: 'OKAY :)',
			},
			function(isConfirm){
  if (isConfirm) {
    window.location.href = 'homepg.html';
  }
}); }, 1000);
	</script>";

?>




</body>
</html>








