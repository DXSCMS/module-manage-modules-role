<?php
$link = $linkMod;
unset($MOD_SET);

include "$link/".$_GET["m"]."/data/settings.cms.php";
include MODULESROL."/".$_SET["module"]."/data/sett-mod-restrictions.php";
$post = false; 

if($_POST["action"] == "post"){
	$post = true;
	foreach($MOD_SET as $sett => $val){ 
		if(isset($SET_RST[$sett]["type"])){ //existe manejador;
			$type = $SET_RST[$sett]["type"];
			if($type == "select"){
				$settings[$sett] = '"'.$_POST[$sett].'"';
			}else if($type == "checkbox"){
				if($_POST[$sett]){
					$settings[$sett] = 'true';
				}else{
					$settings[$sett] = 'false';
				}
			}
		}else{
			//echo "no existe manejador ".$sett;
			$errorpost = true;
			break;
		}		
	}
	
	if(!$errorpost){
	//create text php
	$txtphp = "";
	$txtphp .= "<?php\n\n";
	foreach($settings as $sett => $val){
		$txtphp .= '$MOD_SET["'.$sett.'"]';
		$txtphp .= "\t= ".$val.";\n";
	}
	$txtphp .= "\n\n?>";
	
	$file_name = "$link/".$_GET["m"]."/data/settings.cms.php";
	
	$fp = @fopen($file_name, "w");
	fputs($fp, $txtphp);
	@fclose($fp);
	$redirect = $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET["m"]);
	header("Location: $redirect");
	}
}
unset($MOD_SET);

?> 