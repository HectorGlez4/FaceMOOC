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
			
			$Data = null;
			$this->Connect();
			$sql = "SELECT * FROM user WHERE email = :email AND password = :password";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			return $this->Select($stmt)
				
		}

		function SelectUserEmail($email)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT * FROM user WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $this->Select($stmt)
				

		}

		function SelectUserPassword($email)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT password FROM user WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		function SelectUserId($email)
		{

			$Data = null;
			$this->Connect();
			$sql = "SELECT id_user FROM user WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $this->Select($stmt);
				

		}

		function SelectUserAvatar($email)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT avatar FROM user WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		function InsertUser($email, $password, $firstname, $lastname, $avatar)
		{
			$this->Connect();
			$sql = "INSERT INTO user ('email', 'password', 'firstname', 'lastname') VALUES (:email, :password, :firstname, :lastname);";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
			$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
			if($this->Insert($stmt))
			{
				return true;
			}
			return false;
		}


		function DeleteUser($idUser)
		{
			$this->Connect();
			$sql = "DELETE FROM user WHERE id_user = :idUser ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			if($this->Delete($stmt))
			{
				return true;
			}
			return false;
		}

		function UpdateUser($email, $password, $firstname, $lastname, $idUser)
		{
			$this->Connect();
			$sql = "UPDATE user SET email = :email, password = :password, firstname = :firstname, lastname= :lastname WHERE id_user = :idUser ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
			$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
			$stmt->bindParam(":idUser", $idUSer, PDO::PARAM_INT);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function updateAccount($email, $firstname, $lastname, $sessionemail)
		{
			$this->Connect();
			$sql = "UPDATE user SET email = :email, firstname = :firstname, lastname=:lastname WHERE email = :sessionemail ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
			$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
			$stmt->bindParam(":sessionemail", $sessionemail, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function changePass($password, $email)
		{
			$this->Connect();
			$sql = "UPDATE user SET password = :password WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function recoverPassword($userMail)
		{
			require ROOT . 'PHPMailer/PHPMailerAutoload.php';
			require ROOT . 'PHPMailer/class.phpmailer.php';
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
			if (!$mailer->Send())
				echo "Erreur lors de l'envoie du mail";
			else
				echo "Un email vous a été envoyé à cette adresse";


			/*			$mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->SMTPDebug = 2;
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465;
                        $mail->Username = "linyyoazz@gmail.com";
                        $mail->Password = "";
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

		function SelectGestionUser($email)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT email, firstname, lastname, avatar FROM user WHERE email = :email";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		

		function addAvatar($fichier, $email)
		{
			$this->Connect();
			$sql = "UPDATE user SET avatar = :fichier WHERE email = :email";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":fichier", $fichier, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function compress_image($src, $dest , $quality) {
			$info = getimagesize($src);

			if ($info['mime'] == 'image/jpeg')
			{
				$image = imagecreatefromjpeg($src);
			}
			elseif ($info['mime'] == 'image/png')
			{
				$image = imagecreatefrompng($src);
			}
			else
			{
				die('Unknown image file format');
			}
			//compress and save file to jpg
			imagejpeg($image, $dest, $quality);

			//return destination file
			return $dest;
		}

	}
