<?php 
if(!isset($_GET['email']))
{
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
}else
{
    $email = $_GET['email'];
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

      
    <title>Home Venus</title>
    
    
  </head>
    
  <body>
      <center>
   <!-- Barra do começo-->
  <div id="mae_esqueci">
      
      
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
                    <?php } else { ?>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="logout.php">Logout</a>
			         </div>
                        
                 <?php } ?>
                     
                   
                     
                 
 
   </div>
    <ul class="navbar-nav ml-auto mr-3 ">
                           
                        <ul class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop"><i class="fas fa-shopping-cart"></i></a>
                            <div class="dropdown-menu">
                                <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="cart-nav">
										<div class="form-group">
											 <label class="sr-only" for="emailSite">itens</label>
											 <input type="email" class="form-control" id="emailSite" placeholder="Email" required>
										</div>										
								 </form>
                           
                            </div>
                            
                        </ul>        
                    </ul>    
                          
                    
                 </div>
        
       
    </nav>
    
    
    <div id="fundoesq">
            <br><br><br><br>
        <center>
        <form name="esqueci_senha" method="post" action='troca.php?email=<?php echo $email;?>' id="formcadprod">
          <br>
           <h2>Recuperar senha</h2><br>
           <p>
           
             &nbsp;&nbsp;&nbsp; <label for="novasenha">&nbsp;&nbsp;&nbsp; &nbsp;Nova senha*</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" id="novasenha" placeholder="Insira sua nova senha" name="novasenha" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode>=48 && event.charCode<=57" minlength="8" required/>
             <br><br>
             &nbsp;&nbsp;&nbsp;&nbsp; <label for="confnovasenha">&nbsp;&nbsp;&nbsp; &nbsp;Confirmar senha*</label> <input type="password" id="confnovasenha" placeholder="Confirme a nova senha" name="confnovasenha" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode>=48 && event.charCode<=57" minlength="8" required/>
         </p>
           <p class="envio">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="submit" value="Enviar" id="enviar"/>
            </p>
        </form>
        </center>
        
        
        
    </div>
	
	<br>
	<div id="rodape">	
	   <div id="retorno">
           
	<br>         
     
    <div class="container2">
         <img src="imagens/venus.png" width="50" style="left: auto">  <a href="index.php"> <div class="btncomum"> 
                           &nbsp; &nbsp;
            <button type="button" class="btn btn-outline-light" > Home </button>
                    </div>  </a>
        <a href="produtos.php"> <div class="btncomum">
                     <button type="button" class="btn btn-outline-light" > Produtos </button>
                    </div>  </a>
         <a href="desenvolvimento.php"> <div class="btncomum">
                    <button type="button" class="btn btn-outline-light" > Sobre nós </button>
                    </div>  </a>
        <a href="cadastro.php"> <div class="btncomum">
                     <button type="button" class="btn btn-outline-light" > Cadatro </button>
                    </div>  </a>
                    </div> 
           
            
    <br> <h6 > Desenvolvedores:
           &nbsp; &nbsp;1 - Amanda 
           &nbsp; &nbsp;9 - Gabriel 
           &nbsp; &nbsp;28 - Rafael
           &nbsp; &nbsp;30 - Rebeca 
           &nbsp; &nbsp;32 - Sophia  </h6>
           <a href="#top"> <button type="button" class="btn btn-outline-light" > Voltar ao topo </button> </a>
           
     </div>
	
      <!-- <a href="#top" class="fim" style="color: white"> <br> Voltar ao topo!</a> -->
       
        </div> 
 
	
   </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
          
           </center>
      
              
             
      
  </body>
</html>


