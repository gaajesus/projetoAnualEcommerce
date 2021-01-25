<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="sortcut icon" href="favicon.ico" type="image/x-icon">
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
  <link rel="stylesheet" href="Style/edicao.css">
  <script src="cadproduto.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <title>Cadastro Venus</title>
</head>
<body>
  <center>
    <div id="maecadprod">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div id="imagem">
          <a href="index.php"><img src="imagens/venus.png" width="115"></a>
        </div>
        <div class="container">
          <a href="index.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Home </h5> </button>
            </div>
          </a>
          <a href="produtos.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Produtos </h5> </button>
            </div>
          </a>
          <a href="desenvolvimento.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Sobre nós </h5> </button> 
            </div>
          </a>
          <a href="cadastro.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Cadastro </h5> </button> 
            </div>
          </a>
          <!---------------------------DROPDOWN------------------------------->
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="entrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php session_start();
                if($_SESSION["logou"]=="s")
                { echo $_SESSION["nome"];  }
                else
                {echo "User";}
              ?>
            </button>
              <?php
              if($_SESSION["logou"]!="s")
              { ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="loginpag.php">Login</a>
                </div>
                <?php
              }
              else if($_SESSION["admin"]=="s")
              { ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="tabela_venda.php">Administração</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                <?php
              }
              else
              { ?>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                <?php
              }
            ?>
          </div>
          <ul class="navbar-nav ml-auto mr-3 ">
            <a href="carrinhopg.php">
              <button type="button" class="btn btn-outline-dark"><i class="fas fa-shopping-cart"></i></button>
            </a>
          </ul>
        </div>
      </nav>
      <div class="fundolog"><br><br>
        <center>
          <?php
            include "conexao.php";
            $cod = $_GET["cod"];
            $sql="SELECT * from produto WHERE excluido='FALSE' and cod_prod = $cod; ";
            $res = pg_query($conecta, $sql);
            $afe = pg_num_rows($res);
            if($afe>0)
            {
              $linha = pg_fetch_array($res);
          ?>
          <form id="formcadprod" name="cadastro_venus" method="post" action="updateproduto.php?cod=<?php echo $cod; ?>&faz=up" >
            <h1>DADOS</h1> <br>
            <p class="nome">
              <label >Nome* </label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <input type="text" id="nome_prod" placeholder="Nome do produto" required="required" name="nome_prod" value="<?php echo $linha['nome_prod'];?>" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode == 32"/>
            </p><br>
            <p class="categoria">
              <label for="cat">Categoria*</label> &nbsp; &nbsp; &nbsp; &nbsp;
              <select name="categoria" id="categoria" required>
                <?php
                  $sqloi = "SELECT * FROM categoria";
                  $resultadooi= pg_query($conecta, $sqloi);
                  $qtde=pg_num_rows($resultadooi);
                  if ($qtde > 0)
                  {
                    ?>
                    <option value="<?php echo $linha['categoria_prod']; ?>"><?php echo $linhaai['nome_categoria'];?></option>
                    <?php
                    while($linhaoi = pg_fetch_array($resultadooi))
                    {
                      ?>
                      <option value="<?php echo $linhaoi['cod_categoria']; ?>"><?php echo $linhaoi['nome_categoria'];?></option>
                      <?php
                    }
                  }
                ?>
              </select>
            </p><br>
            <p>
              <label for="preco">Preço*</label> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp; &nbsp;<input required type="text" id="preco" placeholder="Preço" name="preco" value="<?php echo $linha['preco_prod']; ?>" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode == 44 || event.charCode == 46" />   
            </p><br>
            <p>
              <label for="desconto">Desconto*</label>  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp; &nbsp;<input required type="text" id="desconto" placeholder="Desconto" name="desconto" value="<?php echo $linha['desconto'];?>"onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode == 44 || event.charCode == 46"/>  
            </p><br>
            <p>&nbsp;
              <label for="estoque">Estoque*</label>  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp; &nbsp;<input required type="text" id="estoque" placeholder="Estoque" name="estoque" value="<?php echo (float)$linha['estoque'];?>"onkeypress="return event.charCode>=48 && event.charCode<=57"/>  
            </p><br>
            <p class="submit">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset"value="Limpar"/>
              &nbsp;&nbsp; &nbsp;&nbsp;
              <input type="submit" onclick="Enviar();" id="enviar" value="Enviar"/>
            </p>
            <?php
              }
            ?>
            <a href="updateproduto.php?cod=<?php echo $cod; ?>&faz=ex" class="saiba">Excluir</a><br><br>
          </form>
        </center>
      </div>
      <div id="rodape">
        <div id="retorno"><br>
          <div class="container2">
            <img src="imagens/venus.png" width="50" style="left: auto">
            <a href="index.php">
            <div class="btncomum">
              &nbsp; &nbsp;
              <button type="button" class="btn btn-outline-light" > Home </button>
            </div>
            </a>
            <a href="produtos.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Produtos </button>
              </div>
            </a>
            <a href="desenvolvimento.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Sobre nós </button>
              </div>
            </a>
            <a href="cadastro.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-light" > Cadatro </button>
              </div>
            </a>
          </div> <br>
          <h6> Desenvolvedores:
            &nbsp; &nbsp;1 - Amanda
            &nbsp; &nbsp;9 - Gabriel
            &nbsp; &nbsp;28 - Rafael
            &nbsp; &nbsp;30 - Rebeca
            &nbsp; &nbsp;32 - Sophia
          </h6>
          <a href="#top"> <button type="button" class="btn btn-outline-light" > Voltar ao topo </button> </a>
        </div>
      </div>
    </div>
  </center>
  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script>
    <?php
      if($_GET['erro']!=0)
      {?>
        alert("ERRO NA GRAVAÇÃO DO PRODUTO");
        <?php
      }
    ?>
  </script>
</body>
</html>


