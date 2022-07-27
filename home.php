<?php 
  require_once("validador_acesso.php");  
 ?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <!-- CSS customizado -->
    <link rel="stylesheet" type="text/css" href="CSS/estilo-home.css">

  </head>

  <body>

    <!-- Incluindo o fundo da página de login -->
    <img id="fundo" src="imagens/fundo.png">

    <!-- Menu lateral -->
    <div class="wrapper">

        <nav id="sidebar">
            <!-- Sidebar Header -->
            <div class="sidebar-header">
                <img src="imagens/perfil.png" width="50px" height="50px">
                <div class="d-inline-block text-truncate align-self-center" style="max-width: 150px;"><?= $_SESSION['email']; ?></div>
            </div>

            <!-- Sidebar Links -->
            <ul class="list-unstyled components">
                <li class="active"><a href="#"><i class='fas fa-home'></i>  Home</a></li>

                <?php 
                  if ($_SESSION['tipo_usuario'] != 1) {
                ?>
                  <li class=""><a href="#" data-bs-toggle="modal" data-bs-target="#modalAdcPonto"><i class='mr-1 fas fa-plus'></i>  Ponto de coleta</a></li>
                  <!-- <li>
                      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class='mr-1 fas fa-exclamation'></i> Pedidos de coleta<i class='ml-5 fas fa-chevron-down'></i></a> 
                      <ul class="collapse list-unstyled" id="homeSubmenu">
                          <li><a href="#">Page</a></li>
                          <li><a href="#">Page</a></li>
                          <li><a href="#">Page</a></li>
                      </ul> -->
                <?php 
                  }
                ?>

                <?php 
                  if ($_SESSION['tipo_usuario'] == 3) {
                ?>
                  <li class=""><a href="#" data-bs-toggle="modal" data-bs-target="#modalAdcPonto"><i class='fas fa-map-marker-alt'></i>  Ponto de coleta fixo</a></li>
                <?php 
                  }
                ?>

                <?php 
                  if ($_SESSION['tipo_usuario'] == 1) {
                ?>
                  <li class=""><a href="#" data-bs-toggle="modal" data-bs-target="#modalAdcPedido"><i class='fas fa-plus'></i>  Pedido de coleta</a></li>
                <?php 
                  }
                ?>
            </ul>
            <!-- Button trigger modal -->
            <div class="opcoes">
              <button type="button" class="btn btn-secondary ml-5" data-bs-toggle="modal" data-bs-target="#modalConfig">
                <i class="fas fa-cog fa-2x"></i>
              </button>

              <button class="btn btn-secondary ml-3" onclick="sair();">
                <i class="fas fa-sign-out-alt fa-2x"></i>
              </button>
            </div>
        </nav>

        <div id="content" style="min-width: 100%; margin: 0 20px !important; max-width: 100%;">
            <button type="button" id="sidebarCollapse" class="btn navbar-btn btn-light" style="border: none;">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="container" style="margin-left: 5%;">
              <div class="row header-caixa">
                
              </div>
              <div class="row body-caixa">
                Body
              </div>
              <div class="row footer-caixa">
                
              </div>
            </div>
        </div>



    </div>

    <!-- Modal Configurações-->
    <div class="modal fade" id="modalConfig" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content borda30">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Configurações</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="form-group">
                  <form action="atualizar.php" method="POST">

                    <label class="m-1" for="email">Digite o novo e-mail:</label>
                    <input class="form-control" type="email" name="email" id="email" value= <?= $_SESSION['email'] ?>>
                    <label class="m-1" for="senhaVelha">Digite senha antiga:</label>
                    <input class="form-control" type="password" name="senhaVelha" id="senhaVelha">
                    <label class="m-1" for="senhaNova">Digite a nova senha:</label>
                    <input class="form-control" type="password" name="senhaNova" id="senhaNova">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="apagar();">Apagar conta</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <input type="submit" class="btn btn-primary" value="Salvar">
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>

    <!-- Caso dê certo as alterações -->
    <?php 
    if (isset($_GET['att']) && $_GET['att'] == 'sucesso') {
    ?>

      <!-- Modal de sucesso -->
      <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-success" id="exampleModalLabel2">Sucesso</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Modificações realizadas com sucesso!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Beleza!</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        $("#modalSucesso").modal('show')
      </script> 
      
    <?php 
      }
    ?>

    <!-- Caso dê errado as alterações -->
    <?php 
    if (isset($_GET['att']) && $_GET['att'] == 'erroSenhas') {
    ?>

      <!-- Modal de erro das senhas -->
      <div class="modal fade" id="modalErroSenha" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel3">Erro</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              A senha fornecida está incorreta.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Corrigir</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        $("#modalErroSenha").modal('show')
      </script> 
      
    <?php 
      }
    ?>

    <?php 
    if (isset($_GET['att']) && $_GET['att'] == 'erro') {
    ?>

      <!-- Modal de erro -->
      <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel4">Erro</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Não foi possível atualizar as informações
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        $("#modalErro").modal('show')
      </script> 
      
    <?php 
      }
    ?>

    <?php 
    if (isset($_GET['att']) && $_GET['att'] == 'iguais') {
    ?>

      <!-- Modal de informações iguais -->
      <div class="modal fade" id="modalIguais" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-primary" id="exampleModalLabel5">Erro</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Nenhuma informação foi alterada.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        $("#modalIguais").modal('show')
      </script> 
      
    <?php 
      }
    ?>

    <!-- Modal adicionar ponto-->
    <div class="modal fade" id="modalAdcPonto" tabindex="-1" aria-labelledby="exampleModalLabelPonto" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content borda30">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelPonto">Adicionar Ponto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="form-group">
                  <form action="adicionar_ponto.php" method="POST">

                    <label class="m-1" for="nome">Digite o nome do ponto:</label>
                    <input class="form-control" type="text" name="nome" id="nome">
                    <label class="m-1" for="tipo_ponto">Digite o tipo:</label>
                    <input class="form-control" type="text" name="tipo_ponto" id="tipo_ponto">
                    <label class="m-1" for="horario">Digite o horário de funcionamento:</label>
                    <input class="form-control" type="text" name="horario" id="horario">
                    <label class="m-1" for="contato">Digite o contato:</label>
                    <input class="form-control" type="text" name="contato" id="contato">
                    <label class="m-1" for="endereco">Digite o endereço:</label>
                    <input class="form-control" type="text" name="endereco" id="endereco">
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <input type="submit" class="btn btn-primary" value="Salvar">
            </form>
          </div>

        </div>
      </div>
    </div><!-- FIM Modal adicionar ponto-->

    <!-- Modal adicionar pedido-->
    <div class="modal fade" id="modalAdcPedido" tabindex="-1" aria-labelledby="exampleModalLabelPedido" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content borda30">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelPonto">Adicionar Pedido de Coleta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="form-group">
                  <form action="adicionar_pedido.php" method="POST">

                    <label class="m-1" for="midia">Insira uma foto:</label>
                    <input class="form-control" type="file" name="midia" id="midia">

                    <label class="m-1" for="qnt_plastico">Digite a quantidade de plástico:</label>
                    <input class="form-control" type="text" name="qnt_plastico" id="qnt_plastico">

                    <label class="m-1" for="qnt_vidro">Digite a quantidade de vidro:</label>
                    <input class="form-control" type="text" name="qnt_vidro" id="qnt_vidro">

                    <label class="m-1" for="qnt_aluminio">Digite a quantidade de alumínio:</label>
                    <input class="form-control" type="text" name="qnt_aluminio" id="qnt_aluminio">

                    <label class="m-1" for="qnt_papel">Digite a quantidade de papel:</label>
                    <input class="form-control" type="text" name="qnt_papel" id="qnt_papel">

                    <div class="form-group">
                        <label class="m-1" for="ponto_coleta">Selecione o ponto de coleta:</label>
                        <select class="form-control" id="ponto_coleta" name="ponto_coleta">
                            <?php 

                              //Incluíndo a conexão ao BD
                              require('conexao.php');

                              //Consultando no BD
                              $query = sprintf("SELECT idPontoColeta, nome FROM pontocoleta;");

                              //Verificando se foi encontrado algum ponto
                              if ($resultado = mysqli_query($conexao,$query)) {

                                $resultado = $resultado->fetch_all(MYSQLI_ASSOC);

                                foreach ($resultado as $row):
                                  echo "<option value=".$row['idPontoColeta'].">".$row['nome']."</option>";
                                endforeach;
                              }
                              else{
                                echo "<option>Nenhum ponto foi encontrado</option>";
                              }

                              mysqli_close($conexao); //Fecha conexão com banco de dados

                            ?>
                        </select>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <input type="submit" class="btn btn-primary" value="Salvar">
            </form>
          </div>

        </div>
      </div>
    </div><!-- FIM Modal adicionar ponto-->

    <script type="text/javascript">
      function apagar() {
        window.location.href = "apagar.php";
      }

      function sair() {
        window.location.href = "logoff.php";
      }

      $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
              $(this).toggleClass('active');
          });
      });
    </script>

  </body>
</html>