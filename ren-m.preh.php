<?php
if($_POST["newname"] != ""){
	//$linkuser = "modules-".$_SET["folder"];
	$link = $linkMod;
	if(!is_dir($link."/".$_POST["newname"])){
		
		$old = $link."/".$_POST["oldname"];
		$new = $link."/".$_POST["newname"]; 
		//echo '_renaming_from_'.$old.'_to_'.$new.'_';	
		if( @rename($old,$new)){ 
			$redirect = $_URLCMS->gtLink( true , 'list-mods' , "role=".ROL."&m=".$_POST["newname"]);		 
			header("Location: $redirect");		 
		}else{
			$error = 1;
			$errormsg = $_LANG["error-renaming"];
			//header("Location: ?mod=".$_GET['mod']."&p=ren-p&m=".$_GET['m']."&pg=".$_GET["pg"]);		 
		}
	}else{
		$error = 1;
		$errormsg = $_LANG["folder-already-exists"];
	}
} 
?>