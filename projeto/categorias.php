<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Cadastro produtos</title>
    </head>
    <body>
        <?php  
            include "conexao.php"; 
            $nome = $_POST['nome_cat'];
            $excluido = 'FALSE';
            $sql="insert into categoria 
            values(DEFAULT,
                '$nome',
                '$excluido');";
            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            if ($linhas > 0)
            {
                echo "<script type='text/javascript'>alert('Gravado!!!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro_categoria.php'>";
            }   
            else
            {
                echo "<script type='text/javascript'>alert('DEU RUIM !!!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cad_cat.html'>";
            }
                
                pg_close($conecta);
        ?>
    </body>
</html>
