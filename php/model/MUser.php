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
			$this->Connect();
			$sql = "SELECT * FROM user WHERE email = :email AND password = :password";
			$stmt = $this->PDO->prepare($sql);
            $password = md5($password);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		function SelectUserToken($token)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT * FROM user WHERE token = :token";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		function SelectUserEmailByToken($token)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT email FROM user WHERE token = :token";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		function SelectUserEmail($email)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT * FROM user WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $this->Select($stmt);
		}

		function SelectUserById($id)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT * FROM user WHERE id_user = :id ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			return $this->Select($stmt);
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

		function SelectUserCode($code)
		{
			$Data = null;
			$this->Connect();
			$sql = "SELECT code_recup FROM user WHERE code_recup = :code ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":code", $code, PDO::PARAM_STR);
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
			$sql = "INSERT INTO user (email, password, firstname, lastname, avatar) VALUES (:email, :password, :firstname, :lastname, :avatar);";
			$stmt = $this->PDO->prepare($sql);
			$email = htmlspecialchars($email);
			$firstname = htmlspecialchars($firstname);
			$lastname = htmlspecialchars($lastname);
			$password = md5($password); 
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
			$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
			$stmt->bindParam(":avatar", $avatar, PDO::PARAM_STR);
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
			$email = htmlspecialchars($email);
			$firstname = htmlspecialchars($firstname);
			$lastname = htmlspecialchars($lastname);
			$password = md5($password); 
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
			$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function updateAccount($email, $firstname, $lastname, $sessionemail)
		{
			$this->Connect();
			$sql = "UPDATE user SET email = :email, firstname = :firstname, lastname = :lastname WHERE email = :sessionemail ";
			$stmt = $this->PDO->prepare($sql);
			$email = htmlspecialchars($email);
			$firstname = htmlspecialchars($firstname);
			$lastname = htmlspecialchars($lastname);
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
			$password = md5($password);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
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

		function UpdateCodeRecup($email, $code){
			$this->Connect();
			$sql = "UPDATE  user SET  code_recup =  :code WHERE  email = :email";
			$stmt = $this->PDO->prepare($sql);
			$code = crc32($code); 
			$stmt->bindParam(":code", $code, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function UpdatePasswordByEmail($email, $password){
			$this->Connect();
			$sql = "UPDATE user SET password = :password WHERE email = :email";
			$stmt = $this->PDO->prepare($sql);
			$password = md5($password);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function UpdateToken($email, $token){
			$this->Connect();
			$sql = "UPDATE user SET token = :token WHERE email = :email";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

		function DropCodeToken($email){
			$this->Connect();
			$sql = "UPDATE user SET token = '', code_recup = '' WHERE email = :email";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			if($this->Update($stmt))
			{
				return true;
			}
			return false;
		}

	}
