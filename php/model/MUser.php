<?php
	require_once("Model.php");
	class MUser extends Model
	{
		function SelectUsersALL()
		{
			return $this->Select("Select * From user");
		}

		function SelectUserEmailPassword($email, $password)
		{
			try
			{
				$Data = null;
				$this->Connect();
				$sql = "SELECT * FROM user WHERE email = :email AND password = :password";
				$stmt = $this->PDO->prepare($sql);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":password", $password, PDO::PARAM_STR);
				$stmt->execute();
				while($Row =$stmt->fetch(PDO::FETCH_ASSOC)) 
				{
           			$Data[]=$Row;
				}
				return  $Data;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			finally
			{
				$this->Close_Connection();
			}
		}

		function SelectUserEmail($email)
		{
			try
			{
				$Data = null;
				$this->Connect();
				$sql = "SELECT * FROM user WHERE email = :email ";
				$stmt = $this->PDO->prepare($sql);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->execute();
				while($Row =$stmt->fetch(PDO::FETCH_ASSOC)) 
				{
           			$Data[]=$Row;
				}
				return  $Data;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			finally
			{
				$this->Close_Connection();
			}

		}

		function InsertUser($email, $password, $firstname, $lastname)
		{
			$this->Connect();
			$sql = "INSERT INTO user (`email`, `password`, `firstname`, `lastname`) VALUES ('%s', '%s', '%s', '%s');";
			$sql1 = sprintf($sql, $email, $password, $firstname, $lastname);
			//echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteUser($idUser)
		{
			$this->Connect();
			$sql = "DELETE FROM user WHERE id_user = %d ";
			$sql1 = sprintf($sql, $idUser);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}


		function UpdateUser($email, $password, $fname, $lname, $idUser)
		{
			$this->Connect();
			$sql = "UPDATE user SET email = '%s', password = '%s', firstname = '%s', lastname='%s' WHERE id_user = %d ";
			$sql1 = sprintf($sql, $email, $password, $fname, $lname, $idUser);
			//echo $sql1;
			if($this->Update($sql1))
			{
				return true;
			}
			return false;
		}

		function recoverPassword($userMail)
		{
			require ROOT.'PHPMailer/PHPMailerAutoload.php';
			require ROOT.'PHPMailer/class.phpmailer.php';
			$body = "
				<h1>Réinitialisation du mot de passe</h1>
				<hr />
				<p>Bonjour, vous avez oublié votre mot de passe ? Pas de soucis.</p>
                <p><a href='#'>Cliquez ici pour modifier votre mot de passe.</a></p>
 				<hr />
				<p>Ce message a été généré automatiquement. Merci de ne pas y répondre.</p>
			";
			$mailer = new PHPMailer();
			$mailer->CharSet = "utf-8";
			$mailer->IsHTML(true);
			// De qui vient le message, e-mail puis nom
			$mailer->From = "noreply@FaceMOOC.com";
			$mailer->FromName = "Noreply - FaceMOOC";

			// Définition du sujet/objet
			$mailer->Subject = "FaceMOOC - Changement de mot de passe";
			$mailer->AddAddress($userMail);
			//$mailer->Subject ="Subject: =?UTF-8?B?".base64_encode("Réinitialisation du mot de passe | Zenetude")."?=";
			$mailer->Body = $body;
			if(!$mailer->Send())
				echo "Erreur lors de l'envoie du mail";
			else
				echo "Un email vous a été envoyé à cette adresse";
		}

/*			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPDebug = 2;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465;
			$mail->Username = "linyyoazz@gmail.com";
			$mail->Password = "151107nuestrodia";
			$mail->setFrom("linyyoazz@gmail.com", "Linda");
			$mail->Subject = "Récuperation de mot de passe";
			$mail->msgHTML('Bonjour');
			$address = "marvyn.duvauchelle@gmail.com";
			$mail->addAddress($address, "Marvyn");
			if(!$mail->Send())
				echo "Erreur lors de l'envoie du mail";
			else
				echo "Un email vous a été envoyé à cette adresse";*/

	}
	
	//$mus = new MUser();
	//echo "\n";
	//echo $mus->DeleteUser(3);
