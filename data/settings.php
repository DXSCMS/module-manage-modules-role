<?php 

define("ROL","user");
$MOD_SET["folder"]  = ROL;
$MOD_SET["stt-dir"] = SETTINGS.'/role.user.php';
$MOD_SET["mod-dir"] = MODULES.'/user';

$MOD_SET["stripslashes"] = get_magic_quotes_gpc();
?>