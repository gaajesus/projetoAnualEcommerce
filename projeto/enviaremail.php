<?php
  session_start();
  ini_set('display_errors', 1);
  error_reporting(E_ALL); 
  include "conexao.php"; 
  $email= $_POST['email_rec'];
  $sql = "select * from cliente where email_cli = '$email' and excluido = FALSE";
  $resultado=pg_query($conecta,$sql);
  $linhas=pg_affected_rows($resultado);
  if($linhas <= 0)
  {
    echo "<script type='text/javascript'>alert('Email nao cadastrado !!!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=esquecisenha.php'>";
  }
	else
	{
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
			'ssl' => array(
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
		$mail->Subject = 'Recuperar Senha';
		$mail->Body    = "<html><meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″><head></head><body>       
			<h3>Verifica&ccedil&atildeo de email</h3><br>
			Clique <a href='200.145.153.175/rebecacarvalho/cadastro/trocarsenha.php?email=$email'> aqui </a> para alterar sua senha<br>
			</body></html>";
		$mail->AltBody = '';
		// Enviar E-mail
		$mail->send();
		echo "<script type='text/javascript'>alert('Email enviado!')</script>";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=esquecisenha.php'>";
	}
?>