<!-- Sub Menu -->
<div id="sub-head">
<?php if( !isset($_GET['id']) ){ ?>
	<a href="<?php echo $_URLCMS->gtLinkAll(true,'mngr-m',true);?>"><?php echo $_LANG["back"];?></a>
<?php }else{ ?>
	<a href="<?php echo $_URLCMS->gtLink(true,true,'rol='.$_GET['rol'].'&m='.$_GET['m']);?>"><?php echo $_LANG["back"];?></a>
<?php } ?>	
</div>
<div id="content">
<!-- Inicio de Contenido Editable -->
<?php
/*
echo 'reading: <i>'.$update_link.'</i>';
echo '<br />';
echo 'response:<br />';
echo '<hr>';
echo '<pre>';
echo file_get_contents($update_link);
echo '</pre>';
echo '<hr>';
*/
?>
<?php $upds = json_decode(file_get_contents($update_link),true); ?>
<?php if( !isset($_GET['id']) ){ ?>
<?php
echo $_LANG['found-upds'].'<br />';
echo '<hr>';
if( count($upds) > 0 ){
echo '<ul>';
foreach($upds as $id => $upd){
	echo '<li>vMOD:'.$upd['vmod'].' ¦ vCMS:'.$upd['vcms'].' [<a href="'.$_URLCMS->gtLinkAll(true,true,'id='.$id).'">'.$_LANG['update'].'</a>]</li>';
}
echo '</ul>';
}else{
	echo '<i>'.$_LANG['no-upds'].'</i>';
}
echo '<hr>';
?>
<?php 
}else{ 
	if( isset($upds[$_GET['id']]) ){
		$upd_arr = $upds[$_GET['id']];
		$moduleFolder = $linkMod.'/'.$module;
?>

<?php echo $_LANG['updating'];?><br />
<hr>
<pre>
<?php include $linkMod.'/'.$module.'/data/update.php';?>
</pre>
<hr>
<?php	}else{ ?>
<?php echo $_LANG['update-id-error'];?><br />
<?php 	} ?>
<?php } ?>
<!-- Fin de Contenido Editable -->
</div>