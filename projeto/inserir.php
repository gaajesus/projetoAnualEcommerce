
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Cadastro</title>
</head>
<body>
    <?php
        /*
        ini_set('display_errors',1);
        error_reporting(E_ALL);*/

        include "conexao.php";
        session_start();

        if($_SESSION['admin']=="s" || !isset($_SESSION['admin']))
        {
            $_SESSION['admin']=="n";
        }

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $data_nasc = $_POST['data'];
        $email = $_POST['email'];
        $excluido = 'FALSE';
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
        if($linhas > 0)
        {
            echo "<script type='text/javascript'>alert('Email já existe !!!')</script>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
        }
        else
        {
            $senha = $_POST['senha'];
            $confirmasenha = $_POST['confirmasenha'];
            if($confirmasenha != $senha)
            {
                echo "<script type='text/javascript'>alert('Senha incorreta')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
            }
            else
            {

                $senha = md5(preg_replace('/[^[:alnum:]_]/', '',$_POST['senha']));
                $sql="insert into cliente
                values(DEFAULT,
                    '$email',
                    '$nome',
                    '$data_nasc',
                    '$endereco',
                    $cpf,
                    '$senha',
                    '$excluido',
                    '$sobrenome');";
                //echo "<br>".$sql;
            $resultado=pg_query($conecta,$sql);
            $linhas=pg_affected_rows($resultado);
            if ($linhas > 0){

            require 'PHPMailer-master/PHPMailerAutoload.php';

            // Criação do Objeto da Classe PHPMailer
            $mail = new PHPMailer;

            try
            {
                // Usar SMTP para o envio
                $mail->isSMTP();

                // Detalhes do servidor (No nosso exemplo é o Google)
                $mail->Host = 'smtp.live.com';

                // Permitir autenticação SMTP
                $mail->SMTPAuth = true;

                // Nome do usuário
                $mail->Username = 'equipevenus@hotmail.com';
                // Senha do E-mail
                $mail->Password = 'equipe02';

                // Tipo de protocolo de segurança
                $mail->SMTPSecure = 'tls';

                // Porta de conexão com o servidor
                $mail->Port = 587;

                // Garantir a autenticação com o Google
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Remetente
                $mail->setFrom('equipevenus@hotmail.com', 'Venus ltda');
                $mail->addReplyTo('equipevenus@hotmail.com', 'Venus ltda');
                $mail->addAddress($email,$nome);

                // Conteúdo

                // Define conteúdo como HTML
                $mail->isHTML(true);
                // Assunto
                $mail->Subject = 'Cadastro realizado - equipe Venus - CTI 2019';
                $mail->Body    = 'Seu cadastro foi realizado com sucesso no site da Venus!';
                $mail->AltBody = '';

                // Enviar E-mail
                $mail->send();
                $_SESSION["logou"] = "s";
                $_SESSION["nome"] = $nome;
                require_once("index.php");
                echo "<script type='text/javascript'>alert('Cadastro feito com sucesso !!!')</script>";

            }
            catch (Exception $e)
            {}
            }else
            {
                echo "<script type='text/javascript'>alert('Erro !!!')</script>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadastro.php'>";
                pg_close($conecta);
            }
        }
    }
    ?>
 </body>
