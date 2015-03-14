<?php
function gtURLupd($url){
	if( !is_file($url) )return false;
	$matriz_ini = parse_ini_file($url);
	return $matriz_ini['URL'];
}
$link = $linkMod;
$module = $_GET['m'];
$update_url_file = $linkMod.'/'.$module.'/data/update.url';
$update_url = gtURLupd($update_url_file);
include $linkMod."/".$_GET["m"]."/data/info.php";
$mod_ver = $MOD_INFO['mod-ver'];
$cms_ver = $_CMSINF["ver"];
$update_link = $update_url.'?vmod='.$mod_ver.'&vcms='.$cms_ver;
?>