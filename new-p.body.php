<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET['m'] ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
		&nbsp;
		<a class="btn btn-success" href="#" onclick="document.fnewpage.submit();"><i class="fa fa-plus"></i> <?php echo $_LANG["create"];?></a>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["new-page"];?></strong></div>
			<div class="panel-body">
				<?php if($error){ ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $errormsg;?>
				</div>
				<?php } ?>
				
				<?php $action = $_URLCMS->gtLink( null , null , "role=".ROL."&m=".$_GET['m'] );?>
				<form name="fnewpage" method="post" action="<?php echo $action;?>"  class="form-horizontal">
				<input type="hidden" name="module" value="<?php echo $_GET['m'];?>"/>
				<div class="alert alert-info">
				<?php echo $_LANG["skin-pages"];?>: <label class="btn btn-sm btn-info"><i class="fa fa-desktop"></i> <?php echo $uStts['skin'];?></label>
				</div>

				<?php //echo $pagesFolder.'<br />';
				$dir=opendir($pagesFolder); 
				$options = '';$i=0;$ext = '.body.php';
				while ($folder = readdir($dir)){
					if(is_file($pagesFolder."/".$folder) && $folder != '.' && $folder != '..' ){
						if( preg_match('/\\'.$ext.'$/i', $folder,$coinc) ){
							$i++;
							$names = explode($ext,$folder);
							$name = $names[0];
							$options .= "<option value=\"$name\">$name</option>";
						}
					}
				}
				?>
				<?php if($i>0){?>
				<div class="form-group">
					<label class="col-md-4 control-label"><?php echo $_LANG["skin-page"];?>: </label>
					<div class="col-md-8">
						<select name="template" class="form-control">
						<?php echo $options;?>
						</select>
					</div>
				</div>

				<?php }else{ ?>
				<div class="alert alert-warning">				
					<?php echo $_LANG["pages-not-found"];?>
				</div>
				
				<?php } ?>
				<div class="form-group">
					<label class="col-md-4 control-label"><?php echo $_LANG["page-name"];?></label>	
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-file"></i></span>
							<input type="text" name="page" class="form-control" />
						</div>
						<p class="help-block"><strong><i>.body.php</i></strong></p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<button class="btn btn-success pull-right"><i class="fa fa-plus"></i></button>
					</div>
				</div>

				</form>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>	