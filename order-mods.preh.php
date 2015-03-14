<?php
if($_POST){
	$linkuser = $linkMod;

	$file = "$linkuser/order.json";

	$mods = $_POST["mods"];
	$jmods = Array();
	foreach($mods as $key => $mod){$jmods[$mod]='';}
	//print_r($jmods);exit();
	$json = json_encode($jmods);
	//echo $json;exit();
	$dir = fopen($file,"w+");
	fputs($dir,$json);
	@fclose($dir);
	$redirect = $_URLCMS->gtLink( null , 'list-mods' , "role=".ROL);
	header("Location: $redirect");
}
?>