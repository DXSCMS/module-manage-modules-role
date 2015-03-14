<?php //print_r($_CMSSET);
function gtUserSettings(){
	global $_SET,$_CMSSET;
	include $_SET["stt-dir"];
	//include $_CMSSET['role-sett'];
	return $_CMS["settings"];
}

$uStts = gtUserSettings(); //print_r($uStts);
$skinFolder = SKINS.'/'.$uStts['skin'];
$pagesFolder = $skinFolder.'/page-templates';

if($_POST["page"]!=""){
	$link = $linkMod;
	$module = $_POST["module"];
	$page = $_POST["page"];
	$file = "$link/$module/$page".".body.php";
	
	$def = '';
	
	if(!is_file($file)){
		if( isset($_POST["template"]) ){
			
			$tFolder = $skinFolder.'/page-templates';
			$tName = $_POST["template"];
			
			//$tFile = $tFolder.'/'.$tName;// echo $tFile;
			$tFileBody = $tFolder.'/'.$tName.'.body.php';// echo $tFileBody;
			$tFileHead = $tFolder.'/'.$tName.'.head.php';// echo $tFileHead;
			$tFilePreH = $tFolder.'/'.$tName.'.preh.php';// echo $tFilePreH;
			
			$pFileBody = $link.'/'.$module.'/'.$page.'.body.php';
			$pFileHead = $link.'/'.$module.'/'.$page.'.head.php';
			$pFilePreH = $link.'/'.$module.'/'.$page.'.preh.php';
			
			if( copy($tFileBody,$pFileBody) && copy($tFileHead,$pFileHead) && copy($tFilePreH,$pFilePreH) ){
				$redirect = $_URLCMS->gtLink( null , 'mngr-p' , "role=".ROL."&m=".$module."&pg=".$page );
				header("Location: $redirect");
			}else{
				$error = 1;
				$errormsg = $_LANG["error-copying-template"];
			}
		}else{
			$dir = fopen($file,"w+");
			fputs($dir,$def);
			if( @fclose($dir) ){
				$redirect = $_URLCMS->gtLink( null , 'mngr-p' , "role=".ROL."&m=".$module."&pg=".$page );
				header("Location: $redirect");
			}else{
				$error = 1;
				$errormsg = $_LANG["error-creating-page"];
			}
		}
		
		
	}else{
		$error = 1;
		$errormsg = $_LANG["page-already-exists"];
	}
}



?>