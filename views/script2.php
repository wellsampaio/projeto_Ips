<?php
$email          = utf8_decode($_POST['email']);
$email2 		= $email;
$remetente      = 'From: ' $email2;
$destinatario   = 'casadedonabrasilina2@gmail.com';
$assunto        = utf8_decode($_POST['assunto']);
$nome           = utf8_decode($_POST['nome']);
$mensagem       = utf8_decode($_POST['mensagem']);
$alerta         = 'Seus dados foram enviados com sucesso!!!';
$corpo          = "

Nome:       ".$nome."
E-mail:     ".$email."
Mensagem: "
.$mensagem."";
mail($destinatario, $assunto, $corpo, $remetente);
echo $alerta;
