<?php
function namePage($page){
	$ret = explode(".",$page);
	return $ret[0];
}

if($_POST["newname"] != ""){
	
	//$linkuser = "modules-".$_SET["folder"];
	$link = $linkMod;
	
	$dir = "$link/".$_POST["module"];
	
	$oldpage = $dir."/".$_POST["oldname"].".body.php";
	$newpage = $dir."/".$_POST["newname"].".body.php";
	
	$oldhead = $dir."/".$_POST["oldname"].".head.php";
	$newhead = $dir."/".$_POST["newname"].".head.php";
	
	$oldpreh = $dir."/".$_POST["oldname"].".preh.php";
	$newpreh = $dir."/".$_POST["newname"].".preh.php";
	
	if(@rename($oldpage,$newpage) && @rename($oldhead,$newhead) && @rename($oldpreh,$newpreh)){
		$redirect = $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_POST["module"]);			
		header("Location: $redirect");			
	}else{
		$error = 1;
		$errormsg = $_LANG["error-renaming-page"];
	}
} 
?>