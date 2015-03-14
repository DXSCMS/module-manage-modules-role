<?php

include $_SET["stt-dir"];;
include MODULESROL.'/'.MODULE.'/data/sett-user-restrictions.php';

if($_POST["action"] == "error"){
	$redirect = $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET['m'] );
	header("Location: $redirect");
}

if($_POST["action"] == "post"){
	$post = true;
	
	foreach($_CMS["settings"] as $sett => $val){ 
		if(isset($SET_RST[$sett]["type"])){ //existe manejador;
			$type = $SET_RST[$sett]["type"];
			if($type == "select"){
				$settings[$sett] = '"'.$_POST[$sett].'"';
			}else if($type == "select-php"){
				$settings[$sett] = '"'.$_POST[$sett].'.php"';
			}else if($type == "checkbox"){
				if($_POST[$sett]){
					$settings[$sett] = 'true';
				}else{
					$settings[$sett] = 'false';
				}
			}else if($type == "number"){
				if(is_numeric($_POST[$sett])){
					$settings[$sett] = $_POST[$sett];
				}else{
					$errorpost = true;
					break;
				}
			}else if($type == "text"){
					$settings[$sett] = '"'.$_POST[$sett].'"';
			}
		}else{
			$errorpost = true;
			break;
		}	
	}
	
	if(!$errorpost){
	//create text php
		$txtphp = "";
		$txtphp .= "<?php\n\n";
		foreach($settings as $sett => $val){
			$txtphp .= '$_CMS["settings"]["'.$sett.'"]';
			$txtphp .= "\t= ".$val.";\n";
		}
		$txtphp .= "\n\n?>";
		//save
		
		$file_name = $_SET["stt-dir"];;
		$fp = @fopen($file_name, "w");
		fputs($fp, $txtphp);
		@fclose($fp);
		$redirect = $_URLCMS->gtLink( null , 'list-mods' , "role=".ROL );
		header("Location: $redirect");
	}else{
		$txtphp = $_LANG["error-save"];
	}
}

?>