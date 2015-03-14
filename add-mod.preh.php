<?php

function getName($file){
	$ret = "";
	$exp = explode(".",$file);
	for($i=0;$i<count($exp)-1;$i++){
		if($i>0){$ret.=".";}
		$ret .= $exp[$i];
	}
	return $ret;
}

$dirmodspack = DATA.'/modules-pack/';//".$_SET["folder"];

if($_POST["type"] != "" && $_POST["namemod"] != ""){

if($_POST["type"] == "premod"){
	$post = true;
	$dirzip = $dirmodspack."/".$_POST["module"];
	$dirmod = $_SET["mod-dir"].'/'.$_POST["namemod"];
	if(!is_dir($dirmod)){
		$zip = new ZipArchive;
		$res = $zip->open($dirzip);
		if ($res === TRUE) {
			$zip->extractTo($dirmod);
			$zip->close();
			if($_CMSSET["use-json"]){addModJson($_POST["namemod"]);}

			$redirect = $_URLCMS->gtLink(true,false,false);
			header("Location: $redirect");
			
		} else {
			$error = true;
			$errormsg = "Error al Abrir Zip";
		}
	}else{
		$error = true;
		$errormsg = "Modulo Existente";
	}
}else if($_POST["type"] == "newmod"){
	$post = true;
	$dirzip = $_FILES['modup']['tmp_name'];
	$dirmod = $_SET["mod-dir"].'/'.$_POST["namemod"];
	if(!is_dir($dirmod)){
		$zip = new ZipArchive;
		$res = $zip->open($dirzip);
		if ($res === TRUE) {
			$zip->extractTo($dirmod);
			$zip->close();
			
			if($_CMSSET["use-json"]){addModJson($_POST["namemod"]);}
			
			if($_POST["savemod"] == "on"){
				$dirmove = DATA.'/modules-pack/'.$_FILES['modup']['name'];
				if(!is_file($dirmove)){
					move_uploaded_file($_FILES['modup']['tmp_name'],$dirmove);
					$redirect = $_URLCMS->gtLink(true,false,false);
					header("Location: $redirect");
				}else{
					$redirect = $_URLCMS->gtLink( null , false , "error=module-already-stored" );
					header("Location: $redirect");
				}
			}else{
				$redirect = $_URLCMS->gtLink( null , false , "off" );
				header("Location: $redirect");
			}
		} else {
			$error = true;
			$errormsg = "Error al Abrir Zip";
		}
	}else{
		$error = true;
		$errormsg = "Modulo Existente";
	}
	/*
	$target_path = "uploads/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
	
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		echo "The file ".  basename( $_FILES['uploadedfile']['name'])." has been uploaded";
	} else{
		echo "There was an error uploading the file, please try again!";
	}
	*/
	//echo "new-mod!";
	//print_r($_FILES);
}

}
?>