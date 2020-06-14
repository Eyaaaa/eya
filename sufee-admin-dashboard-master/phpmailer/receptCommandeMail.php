
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* New aliases. */
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

/* Composer autoload.php file includes all installed libraries. */
require 'C:\wamp64\www\laCaverne\phpmailer\vendor\autoload.php';


$prix_net=0;
$email=$_COOKIE['email'];
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
        $mail->addAddress($email, $nom);
        $mail->Subject = 'VOTRE COMMANDE';
		$mail->isHTML(TRUE);
        $mail->Body = "
		<html>
		<h1 style='background-color:gold;color:gray;text-align:center'>COMMANDE ENVOYE</h1>
		<p style='text-align:center;color:white;background-color:slategray;'>
		Votre commande a ete envoye avec succes, nous vous contacterons dans les plus brefs delais pour vous tenir informer de l'etat d'avancement de votre commande
        </p>
		</br>
		<p style='text-align:center;'><em >Pour un prix total de $tp DT et une quantite total de $nbproduits : </em></p>
		<p style='text-align:center;'>
        <table style='width:100%;align:center;border-collapse: collapse;border: 2px solid rgb(200, 200, 200);letter-spacing: 1px;font-family: sans-serif;font-size: .8rem;'>
        
		";
		$lpanier=$produit1C->afficherpanier();
			                            foreach($lpanier as $row)
						   {
							   if($email == $row['idclient'])
							   {
							   $q=$row['quantite'];
							   $nomprod=$row['nomproduit'];
							   $prix=$row['prix'];
							   $total=$q*$prix;
							   $nbproduits+=$q;
							   $totalprod+=$total;
							   $mail->Body .= "
    <tr>
        <th style='background-color: #d7d9f2;border: 1px solid rgb(190, 190, 190);padding: 10px;'>$nomprod</th>
        ";
				
				if($prix_net != 0)
				{
					$mail->Body .= "
					<th style='background-color: #696969;;border: 1px solid rgb(190, 190, 190);padding: 10px;'>unité a <del>$prix_net DT </del> $prix DT</th>
					";
					$prix_net = 0;	
				}
				else
				{
					$mail->Body .= "
					<th style='background-color: #696969;;border: 1px solid rgb(190, 190, 190);padding: 10px;'>unité a $prix DT</th>
					";
				}
		
		$mail->Body.="
		<th style='background-color: #d7d9f2;border: 1px solid rgb(190, 190, 190);padding: 10px;'>quantite $q</th>
        <th style='background-color: #696969;;border: 1px solid rgb(190, 190, 190);padding: 10px;'>total $total DT</th>
    </tr>
							 ";
							   }
						   }

        $mail->Body .= "
		</table>
		</p>
		</br>
        <p style='text-align:center;color:white;background-color:slategray;'>
		La Caverne a gouter vous remerci pour votre confiance. Faites d'autres achats pour pouvoir beneficier des reductions et d'autres avantages liés a votre compte. 
		</p>
		</html>";
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

?>