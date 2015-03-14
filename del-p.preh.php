<?php

if($_POST["module"]!="" && $_POST["page"] != ""){
	//$link = "modules-".$_SET["folder"];
	$link = $linkMod;
	$dirpage = "$link/".$_POST["module"]."/".$_POST["page"].".body.php";
	$dirpreh = "$link/".$_POST["module"]."/".$_POST["page"].".preh.php";
	$dirhead = "$link/".$_POST["module"]."/".$_POST["page"].".head.php";
	unlink($dirpage);
	unlink($dirpreh);
	unlink($dirhead);

	$redirect = $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_POST["module"]);
	header("Location: $redirect");
}
?>