<?php
function nameFile($file){
	$files = explode(".",$file);
	unset($files[ count($files) - 1]);
	unset($files[ count($files) - 1]);
	return implode(".",$files);
}
function gtURLupd($url){
	if( !is_file($url) )return false;
	$matriz_ini = parse_ini_file($url);
	return $matriz_ini['URL'];
}
function URLexists($url){
	$link = fopen($url, "r");
	if($link){return true;}
	return false;
}
function isUpgrade($url){
	if(!$upds = json_decode(file_get_contents($url),true)){return false;}
	if(count($upds)>0){return true;}
	return false;
}

$link = $linkMod;
$module = $_GET['m'];

$update_url_file = $linkMod.'/'.$module.'/data/update.url';
$update_url = gtURLupd($update_url_file);


include $linkMod."/".$_GET["m"]."/data/info.php";


$mod_ver = $MOD_INFO['mod-ver'];
$cms_ver = $_CMSINF["ver"];
$update_link = $update_url.'?vmod='.$mod_ver.'&vcms='.$cms_ver;

//echo $update_link;

?>