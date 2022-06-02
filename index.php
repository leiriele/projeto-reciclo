<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ReCiclo - Salve a Terra</title>
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


		<!-- Estilo customizado -->
		<link rel="stylesheet" type="text/css" href="CSS/estilo-login.css">

	</head>
	<body style="font-family: 'Trebuchet MS'!important;">
		<!-- Incluindo o fundo da página de login -->
		<img id="fundo" src="imagens/fundo.png">

		<!-- Início do espaço de logar -->
		<div id="container">
			
			<img src="imagens/perfil.png">

			<!-- Início do form para fazer login -->
			<form action="realizar_login.php" method="POST">
				<div>
					<input class="email" type="email" name="email" id="email" placeholder="Digite seu e-mail" style="width: 90% !important; font-family: 'Helvetica'!important;">
				</div>

				<div>
					<input class="senha" type="password" name="senha" id="senha" placeholder="Digite sua senha" style="width: 90% !important; font-family: 'Helvetica'!important;">
				</div>

				<?php 
                  if (isset($_GET['login']) && $_GET['login'] == 'erro') {
                ?>
                    <div>
                        Usuário ou senha inválido(s)
                    </div>
                <?php 
                  }
                ?>

                <?php 
                  if (isset($_GET['login']) && $_GET['login'] == 'erro2') {
                ?>
                    <div>
                        Faça login antes de acessar as páginas protegidas!
                    </div>
                    
                <?php 
                  }
                ?>

				<div>
					<input class="submit" type="submit" value="Logar" style="width: 90% !important; font-family: 'Helvetica'!important;">
				</div>

				<div>
					<a href="" style="font-family: 'Helvetica'!important;" class="link-reg" data-bs-toggle="modal" data-bs-target="#modalCriar">Registrar-se</a>
				</div>
			</form><!-- Fim do form para fazer login -->
		</div><!-- Fim do espaço de logar -->

		<!-- Modal de criação de usuário novo -->
	    <div class="modal fade" id="modalCriar" tabindex="-1" aria-labelledby="exampleModalLabelCriar" aria-hidden="true">
	      <div class="modal-dialog">
	        <div class="modal-content borda30">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabelCriar">Criar nova conta</h5>
	            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	          </div>
	          <div class="modal-body">
	            <div class="container">
	              <div class="row">
	                <div class="form-group">
	                  <form action="cadastrar.php" method="POST">
	                    <div class="form-group">
	                      <label for="nome">Nome:</label>
	                      <input name="nome" type="text" class="form-control" id="nome" placeholder="Digite seu nome aqui" required>
	                    </div>

	                    <div class="form-group">
	                      <label for="email">E-mail:</label>
	                      <input name="email" type="email" class="form-control" id="email" placeholder="Digite o e-mail" required>
	                    </div>

	                    <div class="form-group">
	                      <label for="senha">Senha:</label>
	                      <input type="password" name="senha" id="senha" class="form-control" placeholder="*****" required>
	                    </div>

	                    <div class="form-group">
	                      <label for="dataNasc">Data de nascimento:</label>
	                      <input type="date" name="dataNasc" id="dataNasc" class="form-control">
	                    </div>

	                    <!-- <div class="form-group">
	                      <label for="cpf">Perfil do usuário</label>
	                      <input type="radio" name="perfilUsuario" id="comum" class="form-control" value="1">Comum
	                      <input type="radio" name="perfilUsuario" id="coletor" class="form-control" value="Coletor">Coletor
	                    </div> -->

	                    <label>Perfil do usuário:</label>
	                    <div class="btn-group" role="group" aria-label="Perfil de usuário">
						  <input type="radio" class="btn-check" name="perfilUsuario" id="comum" autocomplete="off" value="1" checked>
						  <label class="btn btn-outline-success" for="comum" style="border-top-left-radius: 4px;border-bottom-left-radius: 4px;">Comum</label>

						  <input type="radio" class="btn-check" name="perfilUsuario" id="coletor" autocomplete="off" value="2">
						  <label class="btn btn-outline-success" for="coletor">Coletor</label>
						</div>


	                    <div class="form-group">
	                      <label for="cpf">CPF:</label>
	                      <input type="text" name="cpf" id="cpf" class="form-control" placeholder="000.000.000-00">
	                    </div>

	                    <div class="form-group">
	                      <label for="cnpj">CNPJ:</label>
	                      <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="00.000.000/0000-00">
	                    </div>

	                    <div class="form-group">
	                      <label for="descricao">Descrição:</label>
	                      <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Breve descrição sobre os materiais que você recicla">
	                    </div>

	                    <div class="row">
	                    	<div class="col-12">
						    	<label for="rua" class="form-label">Rua:</label>
						    	<input type="text" class="form-control" id="rua" name="rua">
						  	</div>
	                    </div>

	                    <div class="row">
						  	<div class="col-4">
						    	<label for="numero" class="form-label">Número:</label>
							    <input type="text" class="form-control" id="numero" name="numero">
						  	</div>
						  	<div class="col-8">
						    	<label for="bairro" class="form-label">Bairro:</label>
							    <input type="text" class="form-control" id="bairro" name="bairro">
						  	</div>
	                    </div>

	                    <div class="row">
	                    	<div class="col-md-6">
						    	<label for="cidade" class="form-label">Cidade:</label>
						    	<input type="text" class="form-control" id="cidade" name="cidade">
						  	</div>
						  	<div class="col-md-6">
						    	<label for="estado" class="form-label">Estado:</label>
							    <select id="estado" class="form-select" name="estado">
							      <option value="" selected>Escolha uma opção</option>
							      <option value="MG">MG</option>
							    </select>
						  	</div>
	                    </div>
	                    <div class="row">
	                    	<div class="col-6">
							    <label for="cep" class="form-label">CEP:</label>
							    <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000">
						  	</div>
						  	<div class="col-6">
							    <label for="complemento" class="form-label">Complemento:</label>
							    <input type="text" class="form-control" id="complemento" name="complemento">
						  	</div>
	                    </div>

	                    <button type="submit" class="btn btn-outline-success btn-block"><i class="fas fa-user-plus"></i>  Registrar-se</button>
	                  </form>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	</body>
</html>