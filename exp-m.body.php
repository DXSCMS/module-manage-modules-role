<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , 'role='.ROL ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>		
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG['export-module'];?></strong></div>
			<div class="panel-body">
				<?php if($error){?>
				<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $errormsg;?>
				</div>
				<?php } ?>
				<?php $modName = $_GET['m']; ?>
				<form method="POST">
				<input type="hidden" name="module" value="<?php echo $modName;?>" />		
				<?php echo $_LANG["exporting-module"];?> <label class="btn btn-sm btn-info"><i class="fa fa-file-archive-o"></i> <?php echo $modName;?>.zip</label>&nbsp;<button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-external-link"></i></button>
				</form>

			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>