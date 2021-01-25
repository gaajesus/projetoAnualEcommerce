<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="sortcut icon" href="favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <title>Cadastro</title>
</head>
<body>
    <?php
        include "conexao.php";
        session_start();
        $senha = md5($_POST['senha']);
        $email = $_POST['email'];
        $sql = "select * from cliente where email_cli = '$email' and senha_cli = '$senha' ";
        $res = pg_query($conecta, $sql);
        if (pg_num_rows($res) > 0)
        {
            echo "<script type='text/javascript'>alert('Login feito!!!')</script>";
            //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=loginpag.php'>";
            $linha = pg_fetch_array($res);
            $_SESSION["logou"] = "s";
            if($linha['cod_cli']==1)
            {
            $_SESSION["admin"] = "s";
            }else
            {
            $_SESSION["admin"] = "n";
            }
            $_SESSION["nome"] = $linha['nome_cli'];
            $_SESSION["codigo"] = $linha['cod_cli'];
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Erro no login!!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=loginpag.php'>";
        }
    ?>
</body>




