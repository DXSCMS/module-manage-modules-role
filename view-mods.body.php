<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , 'role='.ROL ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["stored-modules"];?></strong></div>
			<div class="panel-body">
				<div class="list-group">
				<?php
				$dirmodspack = DATA."/modules-pack";
				$dir=opendir($dirmodspack); $i=0;				
				while ($folder = readdir($dir)){
					if(is_file($dirmodspack."/".$folder) && $folder != '.' && $folder != '..' ){ $i++;
						$link_txt = $_URLCMS->gtLink( null , 'down-mod' , "m=".urlencode($folder) );						
				?>
					<div class="list-group-item">
						<button class="btn btn-sm btn-info"><i class="fa fa-file-archive-o"></i> <strong><?php echo $folder;?></strong></button>
						<div class="pull-right">
						<a href="<?php echo $link_txt;?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash-o"></i></a>
						</div>
					</div>
				<?php 
					}
				}
				?>
				<?php if($i==0){ ?>
				<div class="alert alert-warning"><?php echo $_LANG["no-mods-stored"];?></div>				
				<?php }?>
				</div>				
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>
