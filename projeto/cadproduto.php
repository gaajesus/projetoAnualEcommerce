
<!DOCTYPE html>
<html lang="pt-br">
  <head>
<link rel="sortcut icon" href="favicon.ico" type="image/x-icon" />
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
               <?php if($_SESSION["logou"]!="s") {?>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="loginpag.php">Login</a>
			     </div>
                    <?php } else if($_SESSION["admin"]=="s") 
                        { ?>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="tabela_venda.php">Administração</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
			         </div>
                        
                 <?php } else
                        { ?>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="logout.php">Logout</a>
			         </div>
                        
                 <?php } ?>
            </div> 
             <ul class="navbar-nav ml-auto mr-3 ">   
          <a href="carrinhopg.php"> <button type="button" class="btn btn-outline-dark">
                 <i class="fas fa-shopping-cart"></i> 
                </button>      
            </a>
          </ul>              
          </div>  
        </nav>
        <div class="fundolog">
          <center>
            <form id="formcadprod" name="cadastro_venus" method="post" action="insereprod.php" enctype="multipart/form-data">
              <h1>Cadastro - Produtos</h1> <br>
              <p class="nome">
                <label >Nome* </label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <input type="text" id="nome_prod" placeholder="Nome do produto" required="required" name="nome_prod" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode == 32"/>
              </p><br>
              <p class="categoria">
                <label for="cat">Categoria*</label> &nbsp; &nbsp; &nbsp; &nbsp;
                <select name="categoria" id="categoria" required>
                  <?php 
                    include "conexao.php";
                    $sql = "SELECT * FROM categoria";
                    $resultado= pg_query($conecta, $sql);
                    $qtde=pg_num_rows($resultado);
                    if ($qtde > 0)
                    {
                      while($linha = pg_fetch_array($resultado))
                      {
                        ?>
                        <option value="<?php echo $linha['cod_categoria']; ?>"><?php echo $linha['nome_categoria'];?></option>
                        <?php
                      } 
                    } 
                  ?>
                </select>
              </p><br>
              <p>
                <label for="preco">Preço*</label> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;<input required type="text" id="preco" placeholder="Preço" name="preco" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode == 44 || event.charCode == 46" />   
              </p><br>
              <p>
                <label for="desconto">Desconto*</label>  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;<input required type="text" id="desconto" placeholder="Desconto" name="desconto" onkeypress="return event.charCode>=48 && event.charCode<=57 || event.charCode == 44 || event.charCode == 46"/>  
              </p><br>
              <p>&nbsp;
                <label for="estoque">Estoque*</label>  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;<input required type="text" id="estoque" placeholder="Estoque" name="estoque" onkeypress="return event.charCode>=48 && event.charCode<=57"/>  
              </p>
              <p> 
                <label for="foto">Foto Produto*</label> 
                <div class="pesquisa-imagem">
					<div class="titulo">Carregar Foto</div>
     <input type="file" name="imagem" class="carrega" title="escolhe">
					</div>
				<span class="imagem-carrega"></span>
              </p><br>
              <p class="submit">
        
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset"value="Limpar" />
       &nbsp;&nbsp; &nbsp;&nbsp;
       <input type="submit" onclick="Enviar();" id="enviar" value="Enviar" />
        </p>
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
    <script>
		function HandleBrowseClick()
		{
			var fileinput = document.getElementById("bro");
			fileinput.click();
			var textinput = document.getElementById("filename");
			textinput.value = fileinput.value;
		}
	</script>   
  </body>
</html>


