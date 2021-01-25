
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Altera e Exclui</title>
    </head>
 <body>
 <?php
     /*
     ini_set('display_errors',1);
     error_reporting(E_ALL);*/
     
    include "conexao.php"; 
    session_start();
     
     if($_GET["faz"] == "up")
     {
         
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nasc = $_POST['data'];
    $email = $_POST['email'];
    $excluido = 'FALSE';
    $cod = $_GET["cod"];
   
    if(!$_POST['cpf'])
    {
        $cpf = 0;
    }
     else
     {
         $cpf = $_POST['cpf'];
     }
      if(!$_POST['endereco'])
     {
        $endereco = "CTI";
     }
     else
     {
        $endereco = $_POST['endereco'];
     }
     
     $sql = "select * from cliente where email_cli = '$email' and excluido = FALSE";
     $resultado=pg_query($conecta,$sql);
     $linhas=pg_affected_rows($resultado);
            $sql=" UPDATE cliente 
             set
             nome_cli = '$nome',
             sobrenome_cli = '$sobrenome',
             data_nasc = '$data_nasc',
             cpf = $cpf,
             endereco = '$endereco',
             email_cli = '$email'
             WHERE cod_cli = $cod;";
             //echo "<br>".$sql;
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_affected_rows($resultado);
        if ($linhas > 0){ 
            
            require_once("tabela_clientes.php");
            echo "<script type='text/javascript'>alert('Alteração feita com sucesso !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=tabela_clientes.php'>";
             
           
        }else
        {
            echo "<script type='text/javascript'>alert('Erro !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=aecliente.php?cod=$cod'>";
            pg_close($conecta);
        }
    } 
else
     {
    $cod = $_GET["cod"];
         $sql=" UPDATE cliente 
             set
             excluido = 'TRUE'
             WHERE cod_cli = $cod;";
             //echo "<br>".$sql;
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_affected_rows($resultado);
        if ($linhas > 0){ 
            
            
            
            require_once("tabela_clientes.php");
            echo "<script type='text/javascript'>alert('Exclusão feita com sucesso !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=tabela_clientes.php'>";
             
           
        }else
        {
            echo "<script type='text/javascript'>alert('Erro OI!!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=aecliente.php?cod=$cod'>";
            pg_close($conecta);
        }
     }
     
  
 ?>
 </body>
