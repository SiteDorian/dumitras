<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php 
 ?>

 <a href='administrare.php'> Back </a>

	<div class="wrapper">
		<div class="row">
			<h1>Se afiseaza cartile ce nu au fost inca restituite:</h1>
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


$sql = "select idcarte, dencarte, Autor.nume as Nume_autor, Autor.prenume as Prenume_autor, dentem as Tematica from Carti 
		inner join Atribute on Atribute.idatrib=Carti.idatrib 
			inner join Autor on Autor.idautor=Atribute.idautor
				inner join Tematici on Tematici.idtem=Atribute.idtem
					where stare=0";
	$result = $conn->query($sql);


if ($result->num_rows > 0) echo "<table border='1' cellpadding=5 align='center'>";

if ($result->num_rows > 0) {
    // output data of each row
    echo "<tr style='color:red; font-weight: bold;'><td> Id. carte  :  </td> <td> Denumire carte </td> <td>Nume autor: </td> <td>Prenume autor: </td> <td>Tematica carte: </td>  </tr>";
    while($row = $result->fetch_array()) {
        echo "<tr><td style='font-weight:bold; text-decoration: underline; text-decoration-style: dotted;'> " . $row[0]. " </td><td>" . $row[1]. "</td><td>" . $row[2]. "</td> <td>" . $row[3]. "</td> <td>" . $row[4]. "</td>  </tr>";
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