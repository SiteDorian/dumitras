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
			<h1>Se afiseaza lista cartilor din biblioteca:</h1>
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


$sql = "select Atribute.idatrib as ID, dencarte as Denumire_carte, Autor.nume as Nume_autor, Autor.prenume as Prenume_autor, 
	Tematici.dentem as Tematica, Limbi.denlimba as Limba, Tari.dentara as Tara_editura, count(Subinterogare.exemplare) as Nr_de_exemplare
	from Atribute 
		inner join Autor on Autor.idautor=Atribute.idautor
		inner join Tematici on Tematici.idtem=Atribute.idtem
		inner join Limbi on Limbi.idlimba=Atribute.idlimba
		inner join Tari on Tari.idtara=Atribute.idtara
		inner join Carti on Carti.idatrib=Atribute.idatrib
		inner join
		(
			select idatrib, count(idatrib) as exemplare from Carti
				group by idatrib
		) as Subinterogare
		on Subinterogare.idatrib=Atribute.idatrib
		group by Atribute.idatrib, Atribute.dencarte, Autor.nume, Autor.prenume, Tematici.dentem, Limbi.denlimba, Tari.dentara";
	$result = $conn->query($sql);


if ($result->num_rows > 0) echo "<table border='1' cellpadding=5 align='center'>";

if ($result->num_rows > 0) {
    // output data of each row
    echo "<tr style='color:red; font-weight: bold;'><td> ID.  :  </td><td>Denumire carte: </td> <td>Nume autor: </td> <td>Prenume autor: </td> <td>Tematica </td> <td>Limba: </td> <td> Tara editie </td> <td> Nr. de exemplare </td> </tr>";
    while($row = $result->fetch_array()) {
        echo "<tr><td> " . $row[0]. " </td><td>" . $row[1]. "</td><td>" . $row[2]. "</td> <td>" . $row[3]. "</td> <td>" . $row[4]. "</td> <td>" . $row[5]. "</td> <td>" . $row[6]. "</td> <td>" . $row[7]. "</td> </tr>";
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