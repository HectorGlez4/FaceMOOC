<?php global $content;
foreach ($content['userInfo'] as $user){
echo '<h1>Bienvenue sur le site '. $user['firstname'] .' !</h1>';

}
?>

<a href='<?php WEBROOT ?>User/logout'>Deconnexion</a>