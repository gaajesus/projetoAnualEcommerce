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
    <center>
        <div id="mae_cart">
            <?php
                session_start();
                include "conexao.php";
            ?>
            <nav class="navbar navbar-expand-lg navbar-light">
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
                        <?php
                            if($_SESSION["logou"]!="s")
                            {
                                ?>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="loginpag.php">Login</a>
                                </div>
                                <?php
                            }
                            else if($_SESSION["admin"]=="s")
                            {
                                ?>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="pagadmin.php">Administração</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
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
            <!-- FIM DA NAVBAR -->
            <div id="fundofinal">
                <br><br><br>
                <center>
                    <img src="imagens/ok.png" weight="300" height="300">
                </center>
                <br>
                <?php
                
                    include "conexao.php";
                    if(!isset($_SESSION['carrinho']) && !isset($_SESSION['total']))
                    { header("Location:index.php"); }
                ?>
                <h3>PEDIDO FINALIZADO COM SUCESSO</h3><br>
                <h4>Total da compra: <?php echo $_SESSION['total']; ?></h4>
                <?php
                    $cod_Cliente = $_SESSION['codigo'];
                    $total = $_SESSION['total'];
                    $excluido = 'FALSE';
                    $qtd_prod = count($_SESSION['carrinho']);
                    $data = date('Y-m-d');//"2019-10-09";  
                    $sql1 = "INSERT INTO carrinho VALUES (DEFAULT,$cod_Cliente,'$data',$total,$excluido);";
                    $result = pg_query($conecta,$sql1);
                    $linhas = pg_fetch_array($result);
                
                /*
                    if($result > 0)
                    {
                        echo "<script>alert('Compra realizada com sucesso!!')</script> ";
                    }*/
                
                    $sqlmax="select MAX(cod_compra) as max from carrinho where excluido != 'TRUE';";
                    $resultadoo=pg_query($conecta,$sqlmax);
                    $maximo = pg_fetch_array($resultadoo);
                
                    foreach($_SESSION['carrinho'] as $codproduto => $qtd){
                        $sql = "select * from produto
                                where cod_prod=$codproduto
                                and excluido != 'TRUE';";
                        $res = pg_query($conecta, $sql);
                        $regs = pg_affected_rows($res);
                        if($regs>0)
                        {
                            $linha = pg_fetch_array($res);
                            $estoque = (int)$linha['estoque'];
                            if($estoque < $qtd)
                            {
                                echo '<script>alert("Quantidade em estoque de '.$linha['nome_prod'].' insuficiente!!")</script> ';
                                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=carrinhopg.php'>";
                                
                            }
                            else
                            {
                                
                            echo "<script>alert('Compra realizada com sucesso!!')</script> ";
                                
                            $novoestoque = $estoque - $qtd;
                            //echo "<br>".$estoque."<br>".$novoestoque;
                            $sqlup = "UPDATE produto
                                    set
                                    estoque = $novoestoque
                                    where cod_prod=$codproduto;";
                            $result = pg_query($conecta, $sqlup);
                            $resp = pg_affected_rows($result);
                            
                            $preco = $linha['preco_prod'];
                            $des = $linha['desconto'];
                            $cod_compra = $maximo['max'];
                            
                            $sql_item = "INSERT INTO item
                                VALUES
                                ($cod_compra,$codproduto,$qtd,$preco,$des);";
                            $resposta = pg_query($conecta, $sql_item);
                            $r = pg_affected_rows($resposta);
                            
                            
                            if($resp > 0 && $r > 0)
                            {
                                $sql = "SELECT email_cli FROM cliente WHERE cod_cli = $cod_Cliente";
                                $resultadoo = pg_query($conecta,$sql);
                                $linhas = pg_fetch_array($resultadoo);
                                $tot = pg_affected_rows($resultadoo);
                                $email = $linhas['email_cli'];
                               
                                require 'PHPMailer-master/PHPMailerAutoload.php';
                                // Cria��o do Objeto da Classe PHPMailer
                                $mail = new PHPMailer;
                                // Usar SMTP para o envio
                                $mail->isSMTP();

                                // Detalhes do servidor (No nosso exemplo � o Google)
                                $mail->Host = 'smtp.live.com';

                                // Permitir autentica��o SMTP
                                $mail->SMTPAuth = true;

                                // Nome do usu�rio
                                $mail->Username = 'equipevenus@hotmail.com';
                                // Senha do E-mail
                                $mail->Password = 'equipe02';

                                // Tipo de protocolo de seguran�a
                                $mail->SMTPSecure = 'tls';

                                // Porta de conex�o com o servidor
                                $mail->Port = 587;


                                // Garantir a autentica��o com o Google
                                $mail->SMTPOptions = array(
                                    'ssl' => array
                                    (
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    )
                                );
                                // Remetente
                                $mail->setFrom('equipevenus@hotmail.com', 'Venus ltda');
                                $mail->addReplyTo('equipevenus@hotmail.com', 'Venus ltda');
                                $mail->addAddress($email,null);
                                // Conte�do
                                // Define conte�do como HTML
                                $mail->isHTML(true);
                                // Assunto
                                $mail->Subject = 'Agradecemos sua compra';
                                $mail->Body="<html><head></head><body>
                                             <h3>Compra realizada com sucesso!</h3><br>
                                             Valor total: R$ $total<br>
                                             </body></html>";
                                $mail->AltBody = '';
                                // Enviar E-mail
                                $mail->send();
                                unset($_SESSION['carrinho']);
                                //echo 'FOI!!'. $linhas['email_cli']. 'Aaaaa';
                             }
                            else
                            {
                                echo 'Erro na compra';
                            }
                        }
                        }
                    }
                ?>
            </div>
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
                <button type="button" class="btn btn-outline-light" > Cadatro </button>
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
</body>
</html>
    