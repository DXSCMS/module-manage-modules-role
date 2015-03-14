<div class="row">
	<div class="col-md-12">
		<?php foreach($roles as $rol){ ?>
		<a href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , "role=$rol" );?>" class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo $rol;?></strong></a>
		<?php } ?>
		
	</div>
</div>