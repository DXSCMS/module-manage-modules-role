<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET['m'] ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["languages"];?></strong></div>
			<div class="panel-body">
				<div class="alert alert-info">
					<?php echo $_LANG["module"];?>: <label class="btn btn-xs btn-info"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label>
				</div>
				<?php
				//$linkuser = "modules-".$_SET["folder"];
				$link = $linkMod;
				$module = $_GET['m'];
				$dir=opendir("$link/".$module."/lang"); 
				while ($folder = readdir($dir)){
				  if(is_file("$link/$module/lang/".$folder) && $folder != '.' && $folder != '..'){
					$name = explode('.',$folder);
					$name = $name[0];
					$pags[$name] = $folder;
				  }
				}
				closedir($dir);
				//ksort($mods); // ASC SORT BY KEY
				?>
				<div class="list-group">
				<?php foreach($pags as $pag => $title){ //echo $pag;					
					$open_link = $_URLCMS->gtLink ( null , 'edit-lang', "&role=".ROL."&m=$module&lang=$pag" );
					$open_link_cms = $_URLCMS->gtLink ( null , 'edit-lang-cms', "&role=".ROL."&m=$module&lang=$pag" );
					if( isset($_LANG["langs"][$pag]) ){$namelang = $_LANG["langs"][$pag];}else{$namelang = $pag;}
					if( is_file("$link/$module/lang/".$pag.".cms.php") ){
					?>
						<div class="list-group-item">
						<a href="<?php echo $open_link;?>" class="btn btn-info"><i class="fa fa-language"></i> <strong><?php echo $namelang;?></strong></a>
						<a href="<?php echo $open_link_cms;?>" class="btn btn-warning"><i class="fa fa-square-o"></i> CMS</a>
						</div>
					<?php
					}				
				}				
				?>
				</div>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>	
</div>
