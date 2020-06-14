
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* New aliases. */
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

/* Composer autoload.php file includes all installed libraries. */
require 'C:\wamp64\www\laCaverne\phpmailer\vendor\autoload.php';



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


        $mail->setFrom($google_email, 'La caverne a gouter');
        $mail->addAddress($email, $nomAbonne);
        $mail->Subject = 'COMPTE DE FIDELITE';
		$mail->isHTML(TRUE);
        $mail->Body = "<html><h1 style='background-color:gold;color:gray;text-align:center'>COMPTE FIDELITE ACTIVE</h1><p style='text-align:center;color:white;background-color:slategray;'>Votre compte de fidelité est desormais Actif vous pouvez profiter des reductions grace a votre code promo: </p><p style='color:green;text-align:center;'>--$Code--</p></br><p style='color:red'>* ps: Vous pouvez le modifier dans votre compte si vous le souhaitez</p></html>";
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

        $mail->send();



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
}

?>