<?php
	require("Model.php");
	class MUser extends Model
	{
		function SelectUsersALL()
		{
			return $this->Select("Select * From user");
		}



	}

	$mus = new MUser();
	var_dump($mus->SelectUsersAll());

?>