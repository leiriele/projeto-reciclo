<?php 

	//Incluíndo conexão com o banco de dados
	require('conexao.php');

	session_start();

	//Atribuindo valores vindos da interface
	$midia = 'C:\fotos-reciclo/nomeImg.jpg'; //Diretorio ficticio provisorio
	$qnt_plastico = $_POST['qnt_plastico'];
	$qnt_vidro = $_POST['qnt_vidro'];
	$qnt_aluminio = $_POST['qnt_aluminio'];
	$qnt_papel = $_POST['qnt_papel'];
	$id = rand(1, 100000);
	$id_cliente = $_SESSION['email'];

	//Idponto coleta
	$ponto_coleta = intval($_POST['ponto_coleta']);

    try {

  		$query = sprintf("INSERT INTO pedidocoleta VALUES ( '$id','$midia', '$qnt_plastico', '$qnt_vidro', '$qnt_aluminio', '$qnt_papel', '$id_cliente', '$ponto_coleta');");
		$resultado = mysqli_query($conexao,$query) or die(mysqli_error($conexao));

		mysqli_close($conexao); //Fecha conexão com banco de dados

  	} catch (Exception $e) {
  		throw new Exception("Erro na inserção", 1);
		header('Location: home.php'); //Caso não inseriu no banco, volta pro home.php
  	}


 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<meta charset="utf-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">

	 	<title>E-mail ESOF</title>
	 	<link rel="icon" href="imagens/mail.png">

    	<!-- Bootstrap início -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	    <!-- Bootstrap fim -->

	    <!-- Font Awesome -->
	    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	 </head>
	 <body>

	 	<div class="container">
	 		
	 		<div class="py-3 text-center">
				<h2>ReCiclo</h2>
				<p class="lead">Pedido cadastrado com sucesso!</p>
				<?php 

					header('Location: home.php');

				 ?>
			</div>

			<div class="row">

				<div class="col-md-12">
					

				</div>
				
			</div>

	 	</div>
	 
	 </body>
 </html>