<?php
$error = false;
function removedir($dirname)
    {
        if (is_dir($dirname)){$dir_handle = opendir($dirname);}
        if (!$dir_handle){return false;}
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file)){
					if( !unlink($dirname."/".$file) ){return false;}
				}else{
                    $a=$dirname.'/'.$file;
                    removedir($a);
                }
            }
        }
        closedir($dir_handle);
        if( rmdir($dirname) ){ return true; }
		return false;
    }
    
if($_POST["module"]!=""){
	//$link = "modules-".$_SET["folder"];
	$link = $linkMod;
	$dir = $link."/".$_POST["module"];
	if(removedir($dir)){
		if($_CMSSET["use-json"]){delModJson($_POST["module"]);}
		$redirect = $_URLCMS->gtLink( null , 'list-mods' , "role=".ROL );
		header("Location: $redirect");
	}else{
		$error = true;
		$errormsg =  $_LANG["error-action"];
	}
}
?>