<div class="row">
	<div class="col-md-6">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLinkModuleCMS();?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
	</div>
</div>

<?php if($error){ ?>
<div class="row"><div class="col-md-6">
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo $errormsg;?>
</div>
</div></div>
<?php } ?> 

<?php
$dirmodspack = DATA.'/modules-pack/'; //.$_SET["folder"];

$dir=opendir($dirmodspack); 
$select = '';
while ($folder = readdir($dir)){
  	if(is_file($dirmodspack."/".$folder) && $folder != '.' && $folder != '..' ){
		$i++;
		$select .= "<option value=\"$folder\">$folder</option>";
	}
}

?>
<?php if($i>0){ ?>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><?php echo $_LANG["install-pre-mod"];?></strong>
				<span class="tools pull-right">
				<a class="tool-toggle" href="javascript:;"><i class="fa fa-chevron-down"></i></a>
				</span>
			</div>
			<div class="panel-body">
				<form name="fpremod" method="POST">
				<input type="hidden" name="type" value="premod" />
					<div class="form-group">
					<label><?php echo $_LANG["module"];?> :</label>
					<select class="form-control" name="module">
					<?php echo $select;?>
					</select>
					</div>
					
					<div class="form-group">
						<label><?php echo $_LANG["name-mod"];?> :</label> 
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
						<input class="form-control" type="text" name="namemod" required /> 
						</div>
					</div>
					
					
					<div class="form-group">	
					<button class="btn btn-success pull-right" type="submit"><i class="fa fa-download"></i></button>
					</div>
				</form>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>
<?php }else{ ?>
<p><i><?php echo $_LANG["not-mods-found"];?></i></p>
<?php } ?>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><?php echo $_LANG["install-new-mod"];?></strong>
				<span class="tools pull-right">
				<a class="tool-toggle" href="javascript:;"><i class="fa fa-chevron-down"></i></a>
				</span>
			</div>
			<div class="panel-body">
				<form name="finsmod" method="POST" enctype="multipart/form-data" onsubmit="return submitForm();" >
				<input type="hidden" name="type" value="newmod" />
					<div class="form-group">
					<label><?php echo $_LANG["module"];?> :</label> 
					<input class="form-control" type="file" name="modup" accept="*.zip" />
					</div>
					
					<div class="form-group">
					<label><?php echo $_LANG["storg-?"];?> :</label> 
					<input type="checkbox" name="savemod" />
					</div>
					
					<div class="form-group">
						<label><?php echo $_LANG["name-mod"];?> :</label> 
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
						<input class="form-control" type="text" name="namemod" required /> 
						</div>
					</div>
					
					<div class="form-group">	
					<button class="btn btn-success pull-right" type="submit"><i class="fa fa-download"></i></button>
					</div>

				</form>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>