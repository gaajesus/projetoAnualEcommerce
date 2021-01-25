<!DOCTYPE html>
<html lang="pt-br">
  <head>
        <meta charset="utf-8" />
        <title>Cadastro</title>
    </head>
 <body>
     
    <?php 
    if(!isset($_GET['email']))
    {
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
    }
    else
    {
           
            $email_cli = $_GET['email'];
            $novasenha = $_POST['novasenha'];
            $confnovasenha = $_POST['confnovasenha'];
             if($confnovasenha != $novasenha)
             {
                 echo "<script type='text/javascript'>alert('Senha incorreta')</script>";
             }
            else
            {
                include "conexao.php"; 
                
                $novasenha = md5(preg_replace('/[^[:alnum:]_]/', '',$_POST['novasenha']));
                $sql = "UPDATE cliente 
                SET senha_cli = '$novasenha' 
                WHERE email_cli = '$email_cli';";
                $resultado=pg_query($conecta,$sql);
                $linhas=pg_affected_rows($resultado);
                if ($linhas > 0){ 
                    echo "<script type='text/javascript'>alert('Senha atualizada com sucesso!')</script>";
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
                }

            }
    }

    ?>

     
     
     
 </body>  
</html>
    
   