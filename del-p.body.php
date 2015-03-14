<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET['m'] ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
		&nbsp;
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["remove-page"];?></strong></div>
			<div class="panel-body">
				<?php if($error){ ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $errormsg;?>
				</div>
				<?php } ?>
				
				<?php $action = $_URLCMS->gtLink( null , true ,  "role=".ROL."&m=".$_GET['m'] ); ?>
				<form name="fdelpage" method="post" action="<?php echo $action;?>">
				<input type="hidden" name="module" value="<?php echo $_GET['m'];?>" readonly />
				<input type="hidden" name="page" value="<?php echo $_GET['pg'];?>" readonly />
				
				<?php echo $_LANG["delete"];?> 
				<label class="btn btn-sm btn-info"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label> /
				<label class="btn btn-sm btn-warning"><i class="fa fa-file"></i> <?php echo $_GET['pg'];?></label>
				&nbsp;
				<button class="btn btn-sm btn-danger pull-right" type="submit"><i class="fa fa-trash"></i></button>
				</form>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>