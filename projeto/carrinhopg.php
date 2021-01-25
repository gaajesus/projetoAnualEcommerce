<?php
  session_start();     
  if(!isset($_SESSION['carrinho'])) { $_SESSION['carrinho'] = array(); }

  //adiciona produto    
	if(isset($_GET['acao']))
	{      
		//ADICIONAR CARRINHO
		if($_GET['acao'] == 'add')
		{
		$codproduto = intval($_GET['codproduto']);
		
			if(!isset($_SESSION['carrinho'][$codproduto])){
				$_SESSION['carrinho'][$codproduto] = 1;
			}else{
				$_SESSION['carrinho'][$codproduto] += 1;
                header("Refresh: 0; url = carrinhopg.php");
			}
		}
		//SUBTRAI DO CARRINHO
		if($_GET['acao'] == 'sub')
		{
		$codproduto = intval($_GET['codproduto']);
		
			if(!isset($_SESSION['carrinho'][$codproduto])){
				$_SESSION['carrinho'][$codproduto] = 1;
			}else{
				$_SESSION['carrinho'][$codproduto] -= 1;
				if($_SESSION['carrinho'][$codproduto] <= 1)
				{	$_SESSION['carrinho'][$codproduto] = 1;			}
			}
		}
		//REMOVER CARRINHO
		if($_GET['acao'] == 'del'){
			$codproduto = intval($_GET['codproduto']);
			if(isset($_SESSION['carrinho'][$codproduto])){
			unset($_SESSION['carrinho'][$codproduto]);
			}
		}
		//ALTERAR QUANTIDADE
		
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!--CSS-->
    <link rel="sortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="Style/cart.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">      

    <title>Carrinho</title>
</head>
<body>
<?php
    session_start();
    if($_SESSION["logou"]==false){
      echo '<script>alert("faça login ou cadastre-se para continuar!");
        window.location.href="../cadastro/loginpag.php";
      </script>';
    }
?>
	<center>
		<div id="mae_cart">
			<nav class="navbar navbar-expand-lg navbar-light">
       
       <div id="imagem">
     <a href="index.php">  <img src="imagens/venus.png" width="115"></a>
      </div>
        
        <div class="container">
            
                <a href="index.php">  <div class="btncomum">
                        <button type="button" class="btn btn-outline-dark" > <h5> Home </h5> </button>
                     </div> </a>
            
             <a href="produtos.php"><div class="btncomum">
                        <button type="button" class="btn btn-outline-dark" > <h5> Produtos </h5> </button></div> </a>
            
             <a href="desenvolvimento.php"> <div class="btncomum">
                        <button type="button" class="btn btn-outline-dark" > <h5> Sobre nós </h5> </button> </div> </a>
            
             <a href="cadastro.php"> <div class="btncomum">
                        <button type="button" class="btn btn-outline-dark" > <h5> Cadastro </h5> </button> </div> </a>        
           
     
                                        <!---------------------------------------------------------->
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
          <a href="carrinhopg.php"> <button type="button" class="btn btn-dark">
                 <i class="fas fa-shopping-cart"></i> 
                </button>      
            </a>
          </ul>      
                    
                 </div>
    </nav>
            <div id="fundocart">
    <!-------------------------------------------PHP CARRINHO------------------------------------------->
      
                <div class="container">
        <div class="row">
					<div class="table"></div>
					<div class="col-sm-2"><h5>Produto</h5></div>
					<div class="col-sm-3"><h5>Quantidade</h5></div>
					<div class="col-sm-2"><h5>Preço</h5></div>
					<div class="col-sm-3"><h5>SubTotal</h5></div>
					<div class="col-sm-2"><h5>Remover</h5></div>
        </div>
      </div>
		
			<form action="finaliza.php" method="post">
				<tbody>
					<?php
				$cod = $_GET['codproduto'];
				$categoria= $_POST["cat"];
				if(count($_SESSION['carrinho']) == 0){
					//echo "<script>alert('Nenhum produto encontrado!!');</script>";
                    ?>
                        <h3>Nenhum produto encontrado</h3>
                    <?php
				}
				else{
					require("conexao.php");
					$total = 0;
					foreach($_SESSION['carrinho'] as $codproduto => $qtd){
						$sql = "select * from produto 
							where cod_prod=$codproduto
							and excluido != 'TRUE'";
						$res = pg_query($conecta, $sql);
						$regs = pg_num_rows($res);
						
						if($regs>0){
                            
                            
							$linha = pg_fetch_array($res);
							$descricao = $linha['nome_prod'];
                            if($_GET["des"]=='yes' && isset($_GET["des"]))
                            {
                                $preco = (float)$linha['preco_prod'] - (float)$linha['desconto'];
                                $preco = number_format($preco, 2, ',', '.');
                            }else
                            {
                                $preco = number_format($linha['preco_prod'], 2, ',', '.');
                            }
                            if(!isset($_GET['des']))
                            {
                                $preco = number_format($linha['preco_prod'], 2, ',', '.');
                            }
							$sub = strval($preco);//transforma em string
							$sub *= $qtd; 
							$total += $sub;
							$sub = number_format($sub, 2, ',', '.');//formata para padrão brasileiro.	
						}else
						{

						}?>
                       <div class="container">
                        <div class="row">  
                            <div class="col-2"><?php echo $descricao; ?> </div>                                  
                            <div class="col-3">
                                <div class="btn-group" role="group" aria-label="Exemplo básico">
                                    <a href="?acao=add&codproduto=<?php echo $codproduto?>">
                                        <button type="button" class="btn btn-outline-success"> + </button>
                                    </a>

                                        <button type="button" class="btn btn-outline-dark"><?php echo $qtd?></button>

                                    <a href="?acao=sub&codproduto=<?php echo $codproduto?>">
                                        <button type="button" class="btn btn-outline-danger"> - </button>
                                    </a>
                                </div>
                            </div>                                  
                        <div class="col-2"><?php echo "R$ ".$preco?><br>
                            <a href="carrinhopg.php?des=yes" class="fim">Aplicar desconto</a></div>
                            <div class="col-3"><?php echo 'R$'.$sub?></div>                                 
                            <div class="col-2">
                                <a href="?acao=del&codproduto=<?php echo $codproduto?>">
                                    <button type="button" class="btn btn-danger">x</button>
                                </a>
                            </div>
                       </div>
                       </div>
				        
                    <?php
					}//FECHA FOREACH
					$total = number_format($total, 2, '.', ',');
					$_SESSION['total'] = $total;?>
					
					<div class="container">
							<div class="row">
                                
                                <div class="col-sm-5"><br><a href="produtos.php"><button type="button" class="btn btn-outline-dark">Continuar Comprando</button></a></div>
                                
                                <div class="col-sm-7"><br><h5>Total: <?php echo 'R$'.$total?> &nbsp;&nbsp;&nbsp; <a href="finaliza.php"><button type="button" class="btn btn-success">Finalizar</button></a></h5></div>
                                
							</div>
                         
                        
						
          </div>
					<?php

				}//FECHA ELSE
			?>
			</tbody>
		</form>
                </div>
	<?php 
			include "rodape.php";
	?>
        
	</div>
	</center>

	<!---------------------------------------------------RODAPÉ---------------------------------------------------------->
</body>
</html>