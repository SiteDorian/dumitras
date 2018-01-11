<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		$hostname="localhost";
		$username="root";
		$password="";
		$database="biblioteca";

	if (isset($_POST['loghin']) && isset($_POST['password'])) {
		if ($_POST['loghin']=="Dumitras" || $_POST['loghin']=="dumitras" || $_POST['loghin']=="DUMITRAS") {
			

			$conexiune=mysqli_connect($hostname, $username, $password);
			
			mysqli_select_db($conexiune, $database);

			$conn = new mysqli($hostname, $username, $password, $database);
			// Check connection


if ($conn->connect_error) {
	header("Location: http://localhost:88/Dumitras/index.php?message=bd");
    die();
} 

			header("Location: http://localhost:88/Dumitras/administrare.php");
			die();
		}
		else{
			$_SESSION['message'] = 'unsuccess';
		
			header("Location: http://localhost:88/Dumitras/index.php?message=unsuccess");
			die();
		}
	}
 ?>

</body>
</html>