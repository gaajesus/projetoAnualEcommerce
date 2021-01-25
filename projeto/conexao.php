<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Cadastro</title>
    </head>
    <body>
        <?php 
            $conecta = pg_connect("host=localhost port=5432 dbname=venus
            user=venus password=venusagrrs");
            if (!$conecta)
            {
                echo "Não foi possível estabelecer conexão com o banco de dados!<br><br>";
                exit;
            }
            else
            //echo "Conexao estabelecida com o banco de dados!<br><br>";
        ?> 
    </body>
</html>
