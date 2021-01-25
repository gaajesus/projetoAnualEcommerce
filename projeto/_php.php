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
		if($_GET['acao'] == 'up'){
			if(is_array($_POST['prod'])){
				foreach($_POST['prod'] as $codproduto => $qtd){
				$codproduto  = intval($codproduto);
				//desprezar a parte decimal
				$qtd = intval($qtd);
				if(!empty($qtd) && $qtd > 0){
					$_SESSION['carrinho'][$codproduto] = $qtd;
				}else{
					unset($_SESSION['carrinho'][$codproduto]);
				}
				}
			}
		} 
  	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!--CSS-->
		<link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="Style/cart.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">      

    <title>Carrinho</title>
</head>
<body>
		<center>
		<div id="mae">
		<?php 
			include "emtudo/navbar.php";
		?>
    <!-------------------------------------------PHP CARRINHO------------------------------------------->

         <div class="container">
          <div class="row">
            <div class="table"></div>
            <div class="col-sm-2">Produto</div>
            <div class="col-sm-3">Quantidade</div>
            <div class="col-sm-2">Preço</div>
            <div class="col-sm-3">SubTotal</div>
            <div class="col-sm-2">Remover</div>
         </div>
         </div>
		
		<form action="?acao=up" method="post">

			
			<tbody>
				<?php
				$cod = $_GET['codproduto'];
				$categoria= $_POST["cat"];
				if(count($_SESSION['carrinho']) == 0){
					echo "<script>alert('Nenhum produto encontrado!!');</script>";
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
							$preco = $linha['preco_prod'];
							$sub = strval($preco);//transforma em string
							$sub *= $qtd; 
							$total += $sub;
							$sub = number_format($sub, 2, ',', '.');//formata para padrão brasileiro.	
						}else
						{
//							echo $cod;
						}?>
                       <div class="container">
                        <div class="row">
                          <div class="table"></div>       
														<div class="col-sm-2"><?php echo $descricao?> </div>                                  
														<div class="col-sm-3"><input type="text" size="3" name="<?php echo prod['.$codproduto.']?>" value="<?php echo $qtd?>" /></div>                                 
														<div class="col-sm-2"><?php echo $preco?></div>                                 
														<div class="col-sm-3"><?php echo 'R$'.$sub?></div>                                 
														<div class="col-sm-2"><a href="?acao=del&codproduto=<?php echo $codproduto?>">Remove</a></div>
                       </div>
                       </div>
				        
                    <?php
					}//FECHA FOREACH
					$total = number_format($total, 2, '.', ',');
					$_SESSION['total'] = $total;?>
					<div class="container">
					<div class="row">
                      <div class="table"></div>
                      <div class="col-sm-2">Total</div>
                      <div class="col-sm-3"></div>
                      <div class="col-sm-2"></div>
                      <div class="col-sm-3"></div>
                      <div class="col-sm-2"><?php echo 'R$'.$total?> </div>
                   </div>
                   </div>
                   <div class="container">
                   <div class="row">
                      <div class="table"></div>
                      <div class="col-sm-2"><input type="submit" value="Atualizar Carrinho"/></div>
                      <div class="col-sm-3"></div>
                      <div class="col-sm-2"><input type="submit" value="Continuar Comprando"href="produtos.php"></div>
                      <div class="col-sm-3"></div>
                      <div class="col-sm-2"><a href="finaliza.php">Finalizar</a></div>
                   </div>
                   </div>
					<?php

				}//FECHA ELSE
			?>
			</tbody>
		</form>

	<?php 
			include "emtudo/rodape.php";
	?>
	</div>
	</center>

	<!---------------------------------------------------RODAPÉ---------------------------------------------------------->
</body>
</html>