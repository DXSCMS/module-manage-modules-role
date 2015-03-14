<?php
$success = false;
function compareVer($mod,$cms){// echo '_'.$mod.':'.$cms.'_';
	if( substr($mod,strlen($mod) - 1) == '+' ){// echo '_comp+_';
	
		$mod_vers = explode('+',$mod);
		$mod_v = $mod_vers[0];// echo '_strcmp('.$cms.','.$mod_v.')_';
		if( strcmp($mod_v,$cms) < 0 ){return true;}//else{echo '_not_'.strcmp($cms,$mod_v).'_';}
		
	}else if( substr($mod,1,1) == '-' ){ // echo '_comp-_';
		
		$mod_vers = explode('-',$mod);
		$mod_v = $mod_vers[0];
		if( strcmp($cms,$mod_v) < 0 ){return true;}
		
	}else{
		$mod_vers = explode('-',$mod);
		if( count($mod_vers) > 1 ){
			$mod_vi = $mod_vers[0];
			$mod_vf = $mod_vers[1];
			if( strcmp($mod_vi,$cms)<0 && strcmp($cms,$mod_vf)<0 ){return true;}
		}else{
			$mod_v = $mod_vers[0];
			if( strcmp($mod_v,$cms) == 0 ){return true;}
		}
	}
	return false;
}
if($_POST){
	
	$dirzip = $_FILES['modup']['tmp_name'];
	$modsFolder = $_SET["mod-dir"];// echo '_unziping_on_'.$modsFolder.'_';echo '<br />';
	
	$zip = new ZipArchive;
	$res = $zip->open($dirzip);
	if( $res === TRUE){
		//print_r($zip);
		
		$myzip = zip_open($dirzip);$nameMod = '';//print_r($myzip);
		while($entrada = zip_read($myzip)) { //echo "_" . zip_entry_name($entrada) . "_<br />";
			$nameMod = zip_entry_name($entrada);
		}
		$namesMod = explode('/',$nameMod);
		$nameMod = $namesMod[0];// echo '_modulo:_'.$nameMod.'_<br />';
		$oldName = $nameMod;
		$tempFolder = DATA.'/temp';
		$tempUnzipFolder = $tempFolder.'/unzip-mod/';
		
		if( isset($_POST["renmod"]) && $_POST["namemod"] != "" ){
			$nameMod = $_POST["namemod"];
		}else{
			$error = true;
			$errormsg = $_LANG["invalid-new-name"];
		}

		if( is_dir($modsFolder.'/'.$nameMod) ){
			$error = true;
			$errormsg = $_LANG["folder"].' <label class="btn btn-sm btn-danger"><i class="fa fa-suitcase"></i> '.$nameMod.'</label> '.$_LANG["exists"];
		}else{
			//echo '_importing_'.$nameMod.'_<br />';
			if( $zip->extractTo($tempUnzipFolder) ){
				
				include $tempUnzipFolder.$oldName.'/data/info.php';
				$mod_cms_ver = $MOD_INFO["cms-ver"];
				$cms_ver = $_CMSINF["ver"];
				rename( $tempUnzipFolder.$oldName , $modsFolder.'/'.$nameMod );
				
				if( compareVer($mod_cms_ver,$cms_ver) ){
					$redirect = $_URLCMS->gtLinkModule();
					header("Location: ".$redirect);exit(0);
				}else{
					$success = true;
					$errormsg = $_LANG["ver-not-supported-disclaimer"];
				}
			}else{
				$error = true;
				$errormsg = $_LANG["error-unzipping"];
			}
			
		}
		
		$zip->close();
	}else{
		$error = true;
		$errormsg = $_LANG["error-opening-zip"];
	}
}
?>