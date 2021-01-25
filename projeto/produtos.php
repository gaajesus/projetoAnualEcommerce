<?php
session_start();
if (!isset($_SESSION["logou"]))
{
/*echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
exit;*/
}
?>

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
    <link rel="stylesheet" href="Style/edicao.css" />  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">      
      
    <title>Produtos Venus</title>
  </head>
    
  <body>
    <center>
    <!------------------------------------NAVBAR----------------------------------->
    <div id="maeprod">
      <nav class="navbar navbar-expand-lg navbar-light" > 

        <div id="imagem">
          <a href="index.php">  <img src="imagens/venus.png" width="115"></a>
        </div>

        <div class="container">
          <a href="index.php">
            <div class="btncomum">
              <button type="button" class="btn btn-outline-dark" > <h5> Home </h5> </button>
            </div> 
          </a>   
          <a href="produtos.php">
            <div class="btncomum">
              <button type="button" class="btn btn-dark" > <h5> Produtos </h5> </button>
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
      <!---------------------------------FIM DA NAVBAR------------------------------------>          
      <div id="fundoprod"><br>
      
       <form id="produtosform" method="get" action="produtos.php">
         
          <p class="categoria_esp">
           &nbsp;
            Categoria
             <select name="cat" id="categoria" placeholder="categoria">
             <option value = "0" >Todos</option>
             <?php 
                include "conexao.php";
                $sql_cat = "SELECT * FROM categoria";
             
                $resultado_cat= pg_query($conecta, $sql_cat);
                $qtde=pg_num_rows($resultado_cat);
              if ($qtde > 0)
              {
                while($linha_cat = pg_fetch_array($resultado_cat)){
             ?>
             
            
               <option value="<?php echo $linha_cat['cod_categoria']; ?>"><?php echo $linha_cat['nome_categoria'];?></option>
          
             
             <?php
                } 
              } ?>
              
            </select>
            
            <input class="prod" type="submit" id="enviar" value="Aplicar" onclick="funcao()"/>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;
            Pesquisa 
                <input type="search" id="pesquisa" name="pesquisa">
              <button type="submit" class="btn btn-outline-dark">
                 <i class="fas fa-search"></i> 
                </button>
     
        </p>
        
         </form>
         
        <?php
          
          $cat = $_GET["cat"];
          $pesquisa = strtolower($_GET["pesquisa"]);
          $x = "%$pesquisa%";
          
          session_start();
          
          $pagina = (isset($_GET["pagina"])) ? ($_GET["pagina"]) : 1;
          $limite = 6;
          $inicio = ($pagina * $limite) - $limite;
           
          
          if($cat>0)
          {
              $categoria = $cat;
              
              $sql_contagem = "select * from produto
              where excluido != 'TRUE' and categoria_prod = $categoria
              order by cod_prod";

              $resultado= pg_query($conecta, $sql_contagem);
              $total=pg_num_rows($resultado);
              
              if($total <= 0)
              {
                  echo "Não há produtos encontrados";
                  
              }
              
              $sql = "select * from produto
              where excluido != 'TRUE' and categoria_prod = $categoria
              order by cod_prod limit $limite offset $inicio";
              $resultado_sql = pg_query($conecta, $sql);
              $qtde=pg_num_rows($resultado_sql);

          }
          else if(!isset($cat)||$cat==0)
          {
              if(isset($pesquisa))
              {
                  $sql_contagem = "select * from produto
                  where excluido != 'TRUE' and lower(nome_prod) like '$x'
                  order by cod_prod";
                  
                  $resultado= pg_query($conecta, $sql_contagem);
                  $total=pg_num_rows($resultado);

                  if($total <= 0)
                  {
                      echo "Não há produtos encontrados";

                  }

                  $sql = "select * from produto
                  where excluido != 'TRUE' and lower(nome_prod) like '$x'
                  order by cod_prod
                  limit $limite offset $inicio";
                  $resultado_sql= pg_query($conecta, $sql);
                  $qtde=pg_num_rows($resultado_sql);
              }
              else
              {
                  $sql_contagem = "select * from produto
                  where excluido != 'TRUE'
                  order by cod_prod";
              
              
              
              $resultado= pg_query($conecta, $sql_contagem);
              $total=pg_num_rows($resultado);
              
              if($total <= 0)
              {
                  echo "Não há produtos encontrados";
                  
              }
               
              $sql = "select * from produto
              where excluido != 'TRUE'
              order by cod_prod
              limit $limite offset $inicio";
              $resultado_sql= pg_query($conecta, $sql);
              $qtde=pg_num_rows($resultado_sql);
              }
              
            }
          
          $tot_paginas = ceil($total/$limite);
         
          
        ?>
        <div class="card-deck mb-3 text-center">
          <?php
            $var = 0;
            if ($qtde > 0)
            {
                while($linha = pg_fetch_array($resultado_sql)){
                    $var++;
                    if($linha['estoque']<=0)
                    { ?>
                        <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                  <img src="<?php echo $linha['imagem']?>" height="220" width="220">
                </div>
                <div class="card-body">
                  <h3 class="my-0 font-weight-normal"><?php echo $linha['nome_prod']; ?></h3> 
                  <br>
                  <br>
                  <br>
                  
               
               <!--   <ul class="list-unstyled mt-3 mb-4">  
                    <h1 class="card-title pricing-card-title"><?php echo $linha['preco_prod'];?></h1>
                  </ul> -->
                  <a href=# class="fim">
                    <button type="button" disable class="btn btn-lg btn-block btn-outline-danger">Sem estoque</button>
                  </a>
            
              
                </div>
              </div>  
                  <?php      
                    }
                    else{
                        
                   
          ?>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <img src="<?php echo $linha['imagem'];?>" height="220" width="220">
            </div>
            <div class="card-body">
              <h3 class="my-0 font-weight-normal"><?php echo $linha['nome_prod']; ?></h3> 
              <ul class="list-unstyled mt-3 mb-4">  
                <h1 class="card-title pricing-card-title"><?php echo "R$ ".$linha['preco_prod'];?></h1>
              </ul>
              <a href="carrinhopg.php?acao=add&codproduto=<?php echo $linha['cod_prod']?>" class="fim">
                <button type="button" class="btn btn-lg btn-block btn-outline-success">Comprar</button>
              </a>
              
            </div>
          </div>  
          <?php 
           
               
                }
                     if($var==3)
                { ?>
                  </div>
                  <div class="card-deck mb-3 text-center">
                  <?php
                }
              
                
            
            }
        }
            
          
          ?>
        </div>
        <?php  
          if(!isset($cat))
          {
            for($i = 1; $i < $tot_paginas + 1; $i++) {
            echo "<a href='produtos.php?pagina=$i' class=fim> ".$i."</a> ";
            }
          }
          else
          {
              for($i = 1; $i < $tot_paginas + 1; $i++) {
             echo "<a href='produtos.php?pesquisa=$pesquisa&cat=$cat&pagina=$i'class=fim> ".$i."</a> ";
              }
          }
              
          
          
          
          ?>
      </div><br>
      <div id="rodape">	
        <div id="retorno"><br>          
          <div class="container2">
            <img src="imagens/venus.png" width="50" style="left: auto">
            <a href="index.php"> 
              <div class="btncomum">&nbsp; &nbsp;
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
                <button type="button" class="btn btn-outline-light" > Cadastro </button>
              </div>  
            </a>
          </div>       
          <br> <h6 > Desenvolvedores:
          &nbsp; &nbsp;1 - Amanda 
          &nbsp; &nbsp;9 - Gabriel 
          &nbsp; &nbsp;28 - Rafael
          &nbsp; &nbsp;30 - Rebeca 
          &nbsp; &nbsp;32 - Sophia  </h6>
          <a href="#top"> 
            <button type="button" class="btn btn-outline-light" > Voltar ao topo </button> 
          </a>
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
      
          
         function funcao()
          
      
      </script>
  </body>
</html>


