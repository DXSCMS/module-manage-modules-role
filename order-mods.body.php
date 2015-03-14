<div class="row">
	<div class="col-md-6">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , "role=".ROL );?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
		&nbsp;
		<a class="btn btn-success" href="#" onclick="document.fordermods.submit();"><i class="fa fa-save"></i> <?php echo $_LANG["save"];?></a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["order-mods"];?></strong></div>
			<div class="panel-body">
				<?php
				if($_GET["error"] != ""){
					if(isset($_LANG["info-error"][$_GET["error"]])){$errorget = $_LANG["info-error"][$_GET["error"]];}else{$errorget = $_GET["error"];}
				?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?php echo $errorget;?>
					</div>
				<?php } ?>
				
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
				<form name="fordermods" method="POST" >
				<ul class="listmods" id="listmods" style="padding-left: 0px;">
				<?php foreach($mods as $mod => $title){ ?>
					<li class="panel panel-info list-primary">
						<a class="moveUp"><i class="fa fa-caret-square-o-up"></i></a>						
						<a class="moveDown"><i class="fa fa-caret-square-o-down"></i></a>
						
						<div class="btn btn-sm btn-info"><i class="fa fa-suitcase"></i> <strong><?php echo $title;?></strong></div>
						
						<i class="fa fa-angle-double-left"></i> 
						<div class="btn btn-sm btn-default"><i><?php echo $mod;?></i></div>

						<input type="hidden" name="mods[]" value="<?php echo $mod;?>" />
					</li>
				<?php }	?>
				</ul>
				</form>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>
