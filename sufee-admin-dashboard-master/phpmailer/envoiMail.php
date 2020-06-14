
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* New aliases. */
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

/* Composer autoload.php file includes all installed libraries. */
require 'phpmailer/vendor/autoload.php';

include "entities/abonne.php";
include "core/abonneC.php";


	
$abonne1C=new abonneC();
$listeAbonnes=$abonne1C->afficherAbonnes();

                           foreach($listeAbonnes as $row){
							   
							if($row['email'] == $_POST['recuEmail'])
							{
								
								$email=$row['email'];
								$tel=$row['telephone'];
								$nom=$row['nom'];
							}
						   }
						   
if(isset($email))
{
	$code=str_shuffle($tel);
					

/* If you installed league/oauth2-google in a different directory, include its autoloader.php file as well. */
// require 'C:\xampp\league-oauth2\vendor\autoload.php';

/* Set the script time zone to UTC. */
date_default_timezone_set('Etc/UTC');

/* Information from the XOAUTH2 configuration. */
$google_email = 'lacaveagouter@gmail.com';
$oauth2_clientId = '209390743564-2plv07l7uhmlto6k5017dojc8348lcbs.apps.googleusercontent.com';
$oauth2_clientSecret = '29sdwadV8cxPuw0MHgtO2Ez_';
$oauth2_refreshToken = '1/WJ83lmTRhAyaBXNELoGr0-VykEVP2fIL-MQodpzatYFsO9KDDM1AjDtIFoOGR7Pb';

$mail = new PHPMailer(TRUE);

try {
	
   
   $mail->setFrom($google_email, 'La cave a gouter');
   $mail->addAddress($_POST['recuEmail'], $nom);
   $mail->Subject = 'Recuperation du mot de passe';
   $mail->Body = "Votre code de confirmation est $code";
   $mail->isSMTP();
   $mail->Port = 587;
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   
   /* Google's SMTP */
   $mail->Host = 'smtp.gmail.com';
   
   /* Set AuthType to XOAUTH2. */
   $mail->AuthType = 'XOAUTH2';
   
   /* Create a new OAuth2 provider instance. */
   $provider = new Google(
      [
         'clientId' => $oauth2_clientId,
         'clientSecret' => $oauth2_clientSecret,
      ]
   );
   
   /* Pass the OAuth provider instance to PHPMailer. */
   $mail->setOAuth(
      new OAuth(
         [
            'provider' => $provider,
            'clientId' => $oauth2_clientId,
            'clientSecret' => $oauth2_clientSecret,
            'refreshToken' => $oauth2_refreshToken,
            'userName' => $google_email,
         ]
      )
   );
   
   /* Finally send the mail. */

  if($mail->send())
  {
	  echo"<p style='color:green;'>envoyé  <i class='fa fa-check'></i></p></br>";
	  //header("location : 404-page.php?connect=confirmCode");
	setcookie('recovMail', $_POST['recuEmail'], time() + 5*60, null, null, false, true);
	setcookie('code', $code, time() + 5*60, null, null, false, true);
	setcookie('recovMail1', $_POST['recuEmail'], time() + 5*60, null, null, false, true);
	setcookie('code1', $code, time() + 5*60, null, null, false, true);
	 include ('codex/confirmCode.php');
	 // echo "<a href='../404-page.php?connect=confirmCode'>Aller a la page du code</a>";
	  
  }
  
   
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}
}
else
{
	//header("location : http://localhost/laCave/404-page.php?connect=recuperation");
	header('Location: 404-page.php?connect=recuperation1');
}

?>