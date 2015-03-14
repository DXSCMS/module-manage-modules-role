<?php
//echo 'sett-user-restrictions.php';
function getValues($link,$type,$ext=true){	
	$dir = opendir($link);
	if($type == "folders"){ 
		$ret = "";$i=0;
		while ($folder = readdir($dir)){
		  if(is_dir($link.'/'.$folder) && $folder != '.' && $folder != '..'){
			if($i>0){$ret .= '|';}
			$ret .= $folder;
			$i++;
		  }
		}
	}else if($type == "files"){
		$ret = "";$i=0;
		while ($folder = readdir($dir)){
		  if(is_file($link.'/'.$folder) && $folder != '.' && $folder != '..'){
			if(!$ext){
				$name = explode('.',$folder);
				$name = $name[0];			
			}else{
				$name = $folder;
			}
			if($i>0){$ret .= '|';}
			$ret .= $name;
			$i++;
		  }
		}
	}
	return $ret;
}

$SET_RST["skin"]["type"] 			= "select";
$SET_RST["skin"]["values"] 			= getValues(SKINS,"folders");
$SET_RST["skin"]["on-change-update"]= array('login-template','skin-template');

$SET_RST["lang"]["type"] 			= "select";
$SET_RST["lang"]["values"] 			= getValues(LANGS,"files",false);

$SET_RST["req-login"]["type"] 		= "checkbox";

$SET_RST["login-eval"]["type"] 		= "select";
$SET_RST["login-eval"]["values"] 	= getValues(LOGIN,"files");

$SET_RST["login-template"]["type"] 		= "select";
$SET_RST["login-template"]["values"] 	= getValues(SKINS."/".$_CMS["settings"]["skin"]."/login-templates","files");

$SET_RST["skin-template"]["type"] 		= "select";
$SET_RST["skin-template"]["values"] 	= getValues(SKINS."/".$_CMS["settings"]["skin"]."/skin-templates","files");

$SET_RST["def-mod"]["type"] 		= "checkbox";

$SET_RST["def-module"]["type"] 		= "select";
$SET_RST["def-module"]["values"] 	= getValues($_SET["mod-dir"],"folders");

$SET_RST["timemax-log"]["type"] 	= "number";

$SET_RST["module-handler"]["type"] 	= "text";

$SET_RST["page-handler"]["type"] 	= "text";
?>