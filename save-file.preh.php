<?php
	header('Content-Type: text/html; charset=iso-8859-1');
	$link = $linkMod;
	
	$_type	= $_POST["type"];
	
	$module = $_POST["module"];
	$page   = $_POST["page"];
	
		  if($_type == "body"){
		//$file_name = "$link/".$module."/".$page;
		$file_name = "$link/".$module."/".$page.".body.php";
	}else if($_type == "preh"){
		//$file_name = "$link/".$module."/preheaders/".$page;
		$file_name = "$link/".$module."/".$page.".preh.php";
	}else if($_type == "head"){
		//$file_name = "$link/".$module."/headers/".$page;
		$file_name = "$link/".$module."/".$page.".head.php";
	}else if($_type == "lang"){
		$lang = $_POST["lang"];
		$file_name = "$link/".$module."/lang/".$lang.".php";
	}else if($_type == "lang-cms"){
		$lang = $_POST["lang"];
		$file_name = "$link/".$module."/lang/".$lang.".cms.php";
	}else if($_type == "modpreh"){
		$file_name = "$link/".$module."/data/module.preh.php";
	}else if($_type == "modhead"){
		$file_name = "$link/".$module."/data/module.head.php";
	}else if($_type == "settings"){
		$file_name = "$link/".$module."/data/settings.php";
	}
	
	$code = $_POST["txtarea"];
	if( $_SET["stripslashes"] ){ $code = stripslashes($code); }
	
	$search = explode(",","�,�,�,�,�,�,Á,É,Í,Ó,Ú,Ñ,�,�,�,�,�,�,Ã�,Ã�,Ã�,Ã�,Ã�,Ã�");
	$replace = explode(",","�,�,�,�,�,�,Á,É,Í,Ó,Ú,Ñ,�,�,�,�,�,�,Á,É,Í,Ó,Ú,Ñ");
	$txt= str_replace($search, $replace, $code);  
	
	$fp = @fopen($file_name, "w");
	fputs($fp, $txt);
	@fclose($fp);
	//echo "Grabado Correctamente!";
	//echo $code;
	if( DXS_isAjax() ){
		echo $_LANG['success-saved'];
		exit();
	}
	if($_type == "body" || $_type == "preh" || $_type == "head"){
		$redirect = $_URLCMS->gtLink( null , 'mngr-p' , "role=".ROL."&m=".$module."&pg=".$page);
	}else if($_type == "lang"){
		$redirect = $_URLCMS->gtLink( null , 'edit-lang' , "role=".ROL."&m=".$module."&lang=".$lang);
	}else if($_type == "lang-cms"){
		$redirect = $_URLCMS->gtLink( null , 'edit-lang-cms' , "role=".ROL."&m=".$module."&lang=".$lang);
	}else if($_type == "modpreh"){
		$redirect = $_URLCMS->gtLink( null , 'mod-preh' , "role=".ROL."&m=".$module );
	}else if($_type == "modhead"){
		$redirect = $_URLCMS->gtLink( null , 'mod-head' , "role=".ROL."&m=".$module );
	}else if($_type == "settings"){
		$redirect = $_URLCMS->gtLink( null , 'settings' , "role=".ROL."&m=".$module );
	}
	header("Location: $redirect");
	exit();
	
?>