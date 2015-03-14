<?php
$error = false;
if($_POST["module"]!=""){
	$link = DATA."/modules-pack";
	$dir = "$link/".$_POST["module"];
	//echo $dir;
	if(unlink($dir)){
		$redirect = $_URLCMS->gtLink( null , 'view-mods' , null );
		header("Location: $redirect");
	}else{
		$error = true;
		$errormsg = $_LANG["error-action"];
	}
}
?>