
<!DOCTYPE html>
<html lang="pt-br">
  <head>
<link rel="sortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--------CSS-------->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">
    <link rel="stylesheet" href="Style/edicao.css">  
    <link rel="stylesheet" href="Style/cadastro.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Cadastro Venus</title>
    
      
  </head>
  <body>
    <center>
      <div id="mae">            
        <nav class="navbar navbar-expand-lg navbar-light">    
          <div id="imagem">
            <a href="index.php"><img src="imagens/venus.png" width="115"></a>
          </div> 
          <div class="container">      
            <a href="index.php">
              <div class="btncomum">
                <button type="button" class="btn btn-outline-dark" ><h5> Home </h5></button>
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
                <button type="button" class="btn btn-dark" > <h5> Cadastro </h5> </button> 
              </div> 
            </a>       
            <!--------------------------DROPDOWN-------------------------------->
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" id="entrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php session_start();
                  if($_SESSION["logou"]=="s")
                  { echo $_SESSION["nome"];
      
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>"; 
    



                  }
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
        <center>
          <div class="fundolog">      
            <form name="cadastro_venus" method="post" action="inserir.php">
              <h1>Cadastro</h1>
                <br>
              <p class="nome">
                <label >Nome*</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <input type="text" id="nome" placeholder="Insira seu nome" required="required" name="nome" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95|| event.charCode == 8" maxlength="10"/>
              </p><br>
              <p class="sobrenome">
                <label for="sobrenome">Sobrenome*</label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input type="text" id="sobrenome" placeholder="Insira seu sobrenome" required="required" name="sobrenome" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode == 32|| event.charCode == 8"/>
              </p><br>
              <p class="fone">
                <label for="data">Data de Nascimento*</label> &nbsp; <input type="date" id="data" name="data" min="1920-01-01" max="2019-12-31"/> 
              </p><br>
              <p>
                <label for="cpf">CPF</label> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" id="cpf" placeholder="Insira seu CPF" name="cpf" maxlenght="11"  minlenght="11" onkeypress="return event.charCode>=48 && event.charCode<=57"/>            
              </p><br>
              <p>
                <label for="endereco">Endereço</label> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;<input type="text" id="endereco" placeholder="Insira seu endereço" name="endereco" />
              </p><br>
              <p> 
                <label for="email">Email*</label> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;<input type="email" id="email" placeholder="Insira seu e-mail" name="email" />
              </p><br>
              <p>
                <label for="senha">Senha*</label>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  <input type="password" id="senha" placeholder="Insira sua senha" name="senha" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode>=48 && event.charCode<=57|| event.charCode == 8" minlength="8"
                required/>
              </p><br>
              <p>  
                <label for="confirma">Confirmar Senha*</label> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  <input type="password" id="confirmasenha" placeholder="Confirmar Senha" name="confirmasenha" onkeypress="return event.charCode>=65 && event.charCode<=90 || event.charCode>=97 && event.charCode<=122 || event.charCode >= 192 && event.charCode <= 253 || event.charCode == 95 || event.charCode>=48 && event.charCode<=57 || event.charCode == 8" minlength="8" required />
              </p><br>
              <p class="submit">
                &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  
                <input type="reset"value="Limpar" />
                &nbsp;&nbsp; &nbsp;&nbsp;
                <input type="button" onclick="Enviar();" id="enviar" value="Enviar" />
              </p>
            </form>
          </div>
        </center>
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
                  <button type="button" class="btn btn-outline-light" > Cadastro </button>
                </div>  
              </a>
            </div><br> 
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
      function Enviar() 
      {  
        if(document.getElementById('senha').value != document.getElementById('confirmasenha').value)
        {
          alert("Senha incorreta");
        }
        else
        {
          document.getElementById('enviar').type = 'submit';
        }
      }
    </script>      
    <script >
            $(document).ready(function () {
                $('#cpf').mask('000.000.000-00', {
                    reverse: true
                });
            });
            $('#nome').keypress(function (e) {
                var keyCode = (e.keyCode ? e.keyCode : e
                .which); // Variar a chamada do keyCode de acordo com o ambiente.
                e.key = e.key.replace(/D/g, "");
                if (keyCode >= 65 && keyCode <= 90) { //letras maiúsculas
                    return;

                } else if (keyCode >= 97 && keyCode <= 122) { //letras minúsculas
                    return;

                } else if (keyCode == 227 || keyCode == 225 || keyCode == 233 || keyCode == 237 || keyCode ==
                    243 || keyCode == 250 || keyCode == 32) { //acentuação
                    return;
                } else {
                    e.preventDefault();
                }
            });
            $('#sobrenome').keypress(function (e) {
                var keyCode = (e.keyCode ? e.keyCode : e
                .which); // Variar a chamada do keyCode de acordo com o ambiente.
                e.key = e.key.replace(/D/g, "");
                if (keyCode >= 65 && keyCode <= 90) { //letras maiúsculas
                    return;

                } else if (keyCode >= 97 && keyCode <= 122) { //letras minúsculas
                    return;

                } else if (keyCode == 227 || keyCode == 225 || keyCode == 233 || keyCode == 237 || keyCode ==243 || keyCode == 250 || keyCode == 32) { //acentuação
                    return;
                } else {
                    e.preventDefault();
                }
            });
            $('#email').keypress(function (e) {
                var keyCode = (e.keyCode ? e.keyCode : e
                .which); // Variar a chamada do keyCode de acordo com o ambiente.
                e.key = e.key.replace(/D/g, "");
                if (keyCode >= 65 && keyCode <= 90) {
                    return;
                }
                else if (keyCode >= 65 && keyCode <= 90) {
                    return;

                } else if (keyCode >= 97 && keyCode <= 122) {
                    return;

                } else if (keyCode >= 48 && keyCode <= 57) {
                    return;

                } else if (keyCode == 64 || keyCode == 46) {
                    return;
                } else {
                    e.preventDefault();
                }
            });
            $('#senha').keypress(function (e) {
                var keyCode = (e.keyCode ? e.keyCode : e
                .which); // Variar a chamada do keyCode de acordo com o ambiente.
                e.key = e.key.replace(/D/g, "");
                if (keyCode >= 65 && keyCode <= 90) { //letras maiúsculas
                    return;

                } else if (keyCode >= 97 && keyCode <= 122) { //letras minúsculas
                    return;
                } else if (keyCode >= 48 && keyCode <= 57) { //números
                    return;
                } else if (keyCode >= 35 && keyCode <=38 || keyCode == 33 || keyCode == 64 || keyCode == 40 || keyCode == 41) { 
                    return;
                }else{
                    e.preventDefault();
                }
            });
            $('#confirmasenha').keypress(function (e) {
                var keyCode = (e.keyCode ? e.keyCode : e
                .which); // Variar a chamada do keyCode de acordo com o ambiente.
                e.key = e.key.replace(/D/g, "");
                if (keyCode >= 65 && keyCode <= 90) { //letras maiúsculas
                    return;

                } else if (keyCode >= 97 && keyCode <= 122) { //letras minúsculas
                    return;
                } else if (keyCode >= 48 && keyCode <= 57) { //números
                    return;
                } else if (keyCode >= 35 && keyCode <=38 || keyCode == 33 || keyCode == 64 || keyCode == 40 || keyCode == 41) { //alguns caracteres especiais
                    return;
                }else{ //não deixa o resto passar
                    e.preventDefault();
                }
            });
        </script>    
  </body>
</html>


