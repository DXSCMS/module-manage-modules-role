<?php

$_res = Array();
$_find_arr = explode(',',$_REQUEST['find']); // $_res['find'] = $_find_arr;

if( count($_find_arr) > 0 ){	
	$_CMS["settings"]["skin"] = $_REQUEST['skin'];
	include_once MODULESROL.'/'.MODULE.'/data/sett-user-restrictions.php';

	foreach ($_find_arr as $_find) {
		$_res[$_find] = array();
		$_values = explode('|',$SET_RST[$_find]["values"]); // sort($_values);
		$_res[$_find] = $_values;
	}
}

header('Content-type: application/json');
$json = json_encode($_res);
@include_once 'indentJSON.php';
if( function_exists ( 'indentJSON' ) ){
	echo indentJSON($json);
}else{
	echo $json;
}
exit(0);
?>