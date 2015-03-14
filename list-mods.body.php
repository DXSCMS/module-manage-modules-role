<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		&nbsp;
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'add-mod' , 'role='.ROL ); ?>"><i class="fa fa-plus"></i> <?php echo $_LANG["install-mod"];?></a>
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'sett-cms' , 'role='.ROL ); ?>"><i class="fa fa-cog"></i> <?php echo $_LANG["settings-user"];?></a>
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'order-mods' , 'role='.ROL ); ?>"><i class="fa fa-bars"></i> <?php echo $_LANG["order-mods"];?></a>	
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'import-mod' , 'role='.ROL ); ?>"><i class="fa fa-arrow-down"></i> <?php echo $_LANG["import-module"];?></a>
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'view-mods' , 'role='.ROL ); ?>"><i class="fa fa-inbox"></i> <?php echo $_LANG["stored-modules"];?></a>
	
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo $_LANG["list-mods"];?></div>
			<div class="panel-body">
								  
				<?php
				if($_GET["error"] != ""){
					if(isset($_LANG["info-error"][$_GET["error"]])){$errorget = $_LANG["info-error"][$_GET["error"]];}else{$errorget = $_GET["error"];}
					
					echo "<p class=\"error\">$errorget</p><br />";
				}
				?>      
				<!-- Inicio de Contenido Editable -->
				
				<?php
				$link = $linkMod;
				$dir=opendir($link); 
				while ($folder = readdir($dir)){
				  if(is_dir("$link/".$folder) && $folder != '.' && $folder != '..'){
					if(is_file("$link/".$folder."/lang/".$_CMSSET["lang"].".php")){
						include("$link/".$folder."/lang/".$_CMSSET["lang"].".php");
					}
					if(is_file("$link/".$folder."/lang/".$_CMSSET["lang"].".cms.php") ){
						include("$link/".$folder."/lang/".$_CMSSET["lang"].".cms.php");
					}
					if(isset($MOD_LANG["mod-title"]) ){	$mods[$folder] = $MOD_LANG["mod-title"]; }
					if(isset($CMS_LANG["module"])    ){	$mods[$folder] = $CMS_LANG["module"]; }
					
					unset($MOD_LANG);
					unset($CMS_LANG);
				  }
				}
				closedir($dir);
				//ORDER MODS
				if($_CMSSET["use-json"]){
					$mods = fixOrderJson($mods);
				}else{
					ksort($mods); // ASC SORT BY KEY
				}
				?>
				<div class="list-group">
				<?php
				//echo "<ul class=\"listmods\">";
				foreach($mods as $mod => $title){
					//$ren_link = "?mod=".MOD."&role=".ROL."&p=ren-m&m=".$mod;
					$ren_link = $_URLCMS->gtLink( true , 'ren-m' , 'role='.ROL.'&m='.$mod);
					//$del_link = "?mod=".MOD."&role=".ROL."&p=del-m&m=".$mod;
					$del_link = $_URLCMS->gtLink( true , 'del-m' , 'role='.ROL.'&m='.$mod);
					$exp_link = $_URLCMS->gtLink( true , 'exp-m' , 'role='.ROL.'&m='.$mod);
					
					$link_ren = "<a href=\"$ren_link\" title=\"".$_LANG["rename-module"]."\" ><img alt=\"".$_LANG["rename-module"]."\" src=\"".MEDIA."/img/icons/rename.gif\" /></a>";
					$link_del = "<a href=\"$del_link\" title=\"".$_LANG["remove-module"]."\" ><img alt=\"".$_LANG["remove-module"]."\" src=\"".MEDIA."/img/icons/action-delete-sharp-thick.png\" /></a>";
					$link_exp = "<a href=\"$exp_link\" title=\"".$_LANG["export-module"]."\" ><img alt=\"".$_LANG["export-module"]."\" src=\"".MEDIA."/img/icons/sign-out.png\" /></a>";
										
					//echo "<li class=\"ui-state-default\">$link_ren&nbsp;$link_del | $link_exp | <a href=\"". $_URLCMS->gtLink( null , 'mngr-m' , 'role='.ROL.'&m='.$mod) ."\" >[".$mod."]</a> :: <a href=\"". $_URLCMS->gtLink( null , 'mngr-m' , 'role='.ROL.'&m='.$mod) ."\" >".$title."</a>";
					//echo "</li>";
				?>
					<div class="list-group-item list-condensed list-hover">
						<a href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , 'role='.ROL.'&m='.$mod);?>"><button class="btn btn-sm btn-info"><i class="fa fa-suitcase"></i> <strong><?php echo $title;?></strong></button></a> <i class="fa fa-angle-double-left"></i> <button class="btn btn-sm btn-default"><i class="fa fa-folder-open-o"></i> <i><?php echo $mod;?></i></button>
						<div class="pull-right">
						<a href="<?php echo $ren_link;?>" class="btn btn-sm btn-default" title="<?php echo $_LANG["rename-module"];?>"><i class="fa fa-edit"></i></a>
						<a href="<?php echo $del_link;?>" class="btn btn-sm btn-danger" title="<?php echo $_LANG["remove-module"];?>"><i class="fa fa-trash-o"></i></a>
						&nbsp;
						<a href="<?php echo $exp_link;?>" class="btn btn-sm btn-info" title="<?php echo $_LANG["export-module"];?>"><i class="fa fa-external-link"></i></a>
						</div>
					</div>
				<?php
				}
				//echo "</ul>";
				?>
				</div>
			</div>
			<div class="panel-footer"><strong><?php echo count($mods);?></strong> <?php echo (count($mods)==1)?$_LANG['module']:$_LANG['modules'];?></div>
		</div>	
	</div>
</div>