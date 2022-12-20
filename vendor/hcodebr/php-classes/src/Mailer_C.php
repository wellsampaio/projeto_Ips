<?php

namespace Hcode;

use Rain\Tpl;

class Mailer_C {

	const USERNAME = "ips@mundialrisk.com.br";
	const PASSWORD = "Mrips#7953";
	const COPY_ONE = "wellington.victalino@gmail.com";
	const COPYNAME_ONE = "Informativo de Sisnistro";

	private $mail;



	public function __construct($subject, $tplName, $data = array())
	{

			$config = array(
		    "tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/views/email/",
		    "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
		    "debug"         => false
		);

			Tpl::configure( $config );

			$tpl = new Tpl();

			foreach ($data as $key => $value) {
				$tpl->assign($key, $value);
			}

			$html = $tpl->draw($tplName, true);

			$this->mail = new \PHPMailer;

			//Tell PHPMailer to use SMTP
			$this->mail->isSMTP();

			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$this->mail->SMTPDebug = 0;

			$this->mail->Debugoutput = 'html';

			//Set the hostname of the mail server
			$this->mail->Host = 'bunker.mundialrisk.com.br';
			// use
			// $this->mail->Host = gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6

			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$this->mail->Port = 465;

			$this->mail->CharSet = 'UTF-8';

			//Set the encryption system to use - ssl (deprecated) or tls
			$this->mail->SMTPSecure = 'ssl';

			//Whether to use SMTP authentication
			$this->mail->SMTPAuth = true;

			//Username to use for SMTP authentication - use full email address for gmail
			$this->mail->Username = Mailer::USERNAME;

			//Password to use for SMTP authentication
			$this->mail->Password = Mailer::PASSWORD;

			//Set who the message is to be sent from
			$this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

			//Set an alternative reply-to address
			//$this->mail->addReplyTo(Mailer::COPY_ONE, Mailer::COPYNAME_ONE);

			//Set who the message is to be sent to
			$this->mail->addAddress('wellington.sampaio@mundialrisk.com.br', 'Wellington');

			$this->mail->addCC('letovictalino@gmail.com', 'Sinistros');


			$this->mail->addBCC('wellington.victalino@gmail.com', 'Moraes');

			//Set the subject line
			$this->mail->Subject = $subject;

			

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$this->mail->msgHTML($html);

			//Replace the plain text body with one created manually
			$this->mail->AltBody = 'Informativo	Preliminar';

			//Attach an image file
			//$this->mail->addAttachment('images/phpmailer_mini.png');

			

	}

	public function send()
	{

		return $this->mail->send();

	}
}



?>