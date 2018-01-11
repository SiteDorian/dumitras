<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title>
		Rusu
	</title>
</head>
<body>

	<div class="wrapper">
		<div class="content">
			
			<h1> Gestionarea unei biblioteci - Rusu Dumitras</h1>
			<img src="biblioteca.png" alt="">	
				
			<h2> Pentru a continua trebuie sa va autentificati! </h2>


			<form action="login.php" method="post" accept-charset="utf-8">
             	<p>Loghin</p> <input type="text" name="loghin" required="required" autofocus>
           	 	<p>Password</p> <input type="password" name="password" required="required"> <br> <br>
            	<button type="submit">Login</button>

            	<?php 
            		if (  isset($_GET['message']))

            		{
            			if ( $_GET['message'] == 'unsuccess') {
            			  echo "<p> Eroare de conectare! <br> Login sau parola gresite! </p>";
            			}

            			if ( $_GET['message'] == 'bd') {
            			  echo "<p> Probleme cu baza de date! </p>";
            			}
            		}
            			
            	?>
          </form>
<br>   <br>
          <img src="carti.png" alt="">
        </div>

		</div>
	</div>

</body>
</html>