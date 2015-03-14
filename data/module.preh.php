<?php

$set_mod_pdefault = "list-mods"; //P�gina que se cargar� por defecto, al inicio. En caso que no quieras que sea index.php
if( DXS_isFalse($_SET['set-page']) ){
	//$redirect = CMSTOOL_makeLink(MOD,$set_mod_pdefault);
	$redirect = $_URLCMS->gtLink(true,$set_mod_pdefault,false);
	header("Location: ".$redirect);
}
/*
 aqui deben ir el contenido php que quieres que se muestre antes del header (<head>)
 para todo el m�dulo, crea ficheros con el nombre de cada p�gina para mostrar
 preheaders para cada p�gina independiente ;)
*/

function fixArrJson($arr){//fix stdClass (el json_decode lo lee asi)
	foreach($arr as $key => $it){$ret[$key] = $it;}
	return $ret;
}

function addModJson($mod){global $_SET;
	$linkuser = $_SET["mod-dir"];
	$filejmods = "$linkuser/order.json";
	$mods = json_decode(file_get_contents($filejmods));
	$mods = fixArrJson($mods);
	$mods[$mod] = '';
	$json = json_encode($mods);
	$dirjmods = fopen($filejmods,"w+");
	fputs($dirjmods,$json);
	@fclose($dirjmods);
}

function delModJson($mod){global $_SET;
	$linkuser = $_SET["mod-dir"];
	$filejmods = "$linkuser/order.json";
	$mods = json_decode(file_get_contents($filejmods));
	$mods = fixArrJson($mods);
	//print_r($jsmods);exit();
	unset($mods[$mod]);
	$json = json_encode($mods);
	$dirjmods = fopen($filejmods,"w+");
	fputs($dirjmods,$json);
	@fclose($dirjmods);
}

function fixOrderJson($mods){global $_SET;
	$linkuser = $_SET["mod-dir"];
	$filejmods = "$linkuser/order.json";
	$jmods = json_decode(file_get_contents($filejmods));
	$jmods = fixArrJson($jmods);
	$fmods = array_intersect_key($jmods,$mods);
	foreach($mods as $mod => $name){if(!isset($fmods[$mod])){$fmods[$mod]=$mods[$mod];}}
	//fix module's name
	foreach($fmods as $key=>$fmod){$fmods[$key] = $mods[$key];}
	
	//print_r($mods);print_r($jsmods);print_r($fmods);
	$json = json_encode($fmods);
	//$dirjmods = fopen($filejmods,"w+");
	//fputs($dirjmods,$json);
	//@fclose($dirjmods);
	
	//return $fmods;
	return array_merge($fmods,$mods);
}

//$linkMod = ROOT.'modules/'.ROL;
$linkMod = $_SET["mod-dir"];

?>