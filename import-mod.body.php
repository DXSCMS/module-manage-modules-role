<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLinkModule();?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["import-module"];?></strong></div>
			<div class="panel-body">
				<?php if($error){ ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $errormsg;?>
				</div>
				<?php } ?>
				
				<?php if(!$success){ ?>
				<form name="fimpmod" method="POST" enctype="multipart/form-data" onsubmit="return submitForm();" >
				<input type="hidden" name="type" value="newmod" />
				<div class="form-group">
					<label><?php echo $_LANG["module"];?> :</label> 
					<input class="form-control" type="file" name="modup" accept="*.zip" />
				</div>
				<div class="form-group">
					<label><?php echo $_LANG["new-name-?"];?> :</label> 
					<input type="checkbox" name="renmod" onclick="return clickRen();" /> 
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-folder-open"></i></span>
						<input class="form-control" type="text" name="namemod" disabled /> 
					</div>
					
				</div>
				<div class="form-group">	
					<button class="btn btn-success pull-right" type="submit"><i class="fa fa-download"></i></button>
				</div>
				</form>
				<?php }else{ ?>
					<div class="alert alert-danger alert-dismissable">
						<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
						<?php echo $errormsg;?>
					</div>
				<?php } ?>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
	<?php if($success){ ?>
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<?php echo $_LANG["module-info"];?>
				<?php 
				if( isset($MOD_INFO['info-link']) ){
					echo '<a name="rss" href="'.$MOD_INFO['info-link'].'" target="_blank" title="'.$_LANG['info-link'].'"><img src="'.MEDIA.'/img/icons/link_icon.gif'.'" /></a>';
				}else{
					echo '<a name="rss" title="'.$_LANG['no-info-link'].'"><img src="'.MEDIA.'/img/icons/link_delete.gif'.'" /></a>';
				}
				?>
			</div>
			<div class="panel-body">
				<div class="list-group">
				<?php foreach($MOD_INFO as $inf => $desc){ ?>
					<a href="#" class="list-group-item">
						<i class="fa fa-info-circle"></i>
						<i><?php echo isset($_LANG["info-mod"][$inf])?$_LANG["info-mod"][$inf]:$inf;?></i>
						: 
						<strong><?php echo $desc;?></strong>
					</a>
				<?php } ?>
				</div>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>
	</div>
	<?php } ?>	
</div>
