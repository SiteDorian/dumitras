<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<a href='administrare.php'> Back </a>
	<div class="wrapper">
		<div class="row">
			<h1>Se afiseaza toti cititorii:</h1>
		</div>

		<div class="row">
			<?php 
		$hostname="localhost";
		$username="root";
		$password="";
		$database="biblioteca";
		$conexiune=mysqli_connect($hostname, $username, $password) or die("Nu ma pot conecta la baza de data");
		mysqli_select_db($conexiune, $database) or die("Nu gasesc baza de date");



$conn = new mysqli($hostname, $username, $password, $database);
// Check connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  else echo "S-a conectat cu succes la baza de date Biblioteca!<br><br>";


$sql = "select idcit, nume, prenume, sex, datans, adresa, telefon from Cititori";
	$result = $conn->query($sql);


if ($result->num_rows > 0) echo "<table border='1' cellpadding=5 align='center'>";

if ($result->num_rows > 0) {
    // output data of each row
    echo "<tr style='color:red; font-weight: bold;'><td> Id. cititor  :  </td><td>Nume: </td> <td>Prenume: </td> <td>Sexul: </td> <td>Data nasterei: </td> <td>Adresa: </td> <td> Nr. de telefon </td> </tr>";
    while($row = $result->fetch_array()) {
        echo "<tr><td> " . $row[0]. " </td><td>" . $row[1]. "</td><td>" . $row[2]. "</td> <td>" . $row[3]. "</td> <td>" . $row[4]. "</td> <td>" . $row[5]. "</td> <td>" . $row[6]. "</td> </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
      ?>
		</div>
	</div>

</body>
</html>