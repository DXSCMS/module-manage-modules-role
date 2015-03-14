<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , 'role='.ROL ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>		
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG['rename-module'];?></strong></div>
			<div class="panel-body">
				<?php if($error){?>
				<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $errormsg;?>
				</div>
				<?php } ?>

				<form name="frenamefile" id="frenamefile" method="post" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo $_LANG['from'];?>:</label>
					<div class="col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
						<input type="text" name="oldname" value="<?php echo $_GET['m'];?>" class="form-control" readonly />
					</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label"><?php echo $_LANG['to'];?>:</label>
					<div class="col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
						<input type="text" name="newname" value="<?php echo $_GET['m'];?>" class="form-control" required autofocus /> 				
					</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-12">
					<button type="submit" class="btn btn-success pull-right"><i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
				
				</form>

			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>
