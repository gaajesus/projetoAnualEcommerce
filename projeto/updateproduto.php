
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
    $cod = $_GET["cod"];
    $nome = $_POST['nome_prod'];
    $categoria = $_POST['categoria'];
    $preco = (float)$_POST['preco'];
    $desconto = $_POST['desconto'];
    $estoque = $_POST['estoque'];
    $excluido = 'FALSE';
     
            $sql=" UPDATE produto
             set
             nome_prod = '$nome',
             categoria_prod = $categoria,
             preco_prod = $preco,
             desconto = $desconto,
             estoque = $estoque
             WHERE cod_prod = $cod;";
             //echo "<br>".$sql;
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_affected_rows($resultado);
        if ($linhas > 0){ 
            
            require_once("tabela_produtos.php");
            echo "<script type='text/javascript'>alert('Alteração feita com sucesso !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=tabela_produtos.php'>";
             
           
        }else
        {
            echo "<script type='text/javascript'>alert('Erro !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=aeproduto.php?cod=$cod'>";
            pg_close($conecta);
        }
    } 
else
     {
    $cod = $_GET["cod"];
         $sql=" UPDATE produto 
             set
             excluido = 'TRUE'
             WHERE cod_prod = $cod;";
             //echo "<br>".$sql;
        $resultado=pg_query($conecta,$sql);
        $linhas=pg_affected_rows($resultado);
        if ($linhas > 0){ 
            
            
            
            require_once("tabela_produtos.php");
            echo "<script type='text/javascript'>alert('Exclusão feita com sucesso !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=tabela_produtos.php'>";
             
           
        }else
        {
            echo "<script type='text/javascript'>alert('Erro OI!!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=aeproduto.php?cod=$cod'>";
            pg_close($conecta);
        }
     }
     
  
 ?>
 </body>
