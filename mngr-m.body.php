<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , 'role='.ROL ); ?>"><i class="fa fa-arrow-left"></i>  <?php echo $_LANG["back"];?></a>
		&nbsp;
		<a class="btn btn-warning" href="<?php echo $_URLCMS->gtLink( null , 'new-p' , 'role='.ROL.'&m='.$_GET['m'] ); ?>"><i class="fa fa-plus"></i> <?php echo $_LANG["new-page"];?></a>
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'sett-mod' , 'role='.ROL.'&m='.$_GET['m'] ); ?>"><i class="fa fa-cog"></i> <?php echo $_LANG["sett-mod"];?></a>
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'lang' , 'role='.ROL.'&m='.$_GET['m'] ); ?>"><i class="fa fa-language"></i> <?php echo $_LANG["languages"];?></a>
		&nbsp;
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'mod-preh' , 'role='.ROL.'&m='.$_GET['m'] ); ?>"><i class="fa fa-code"></i> <?php echo $_LANG["mod-preh"];?></a>
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'mod-head' , 'role='.ROL.'&m='.$_GET['m'] ); ?>"><i class="fa fa-code"></i> <?php echo $_LANG["mod-head"];?></a>
		&nbsp;
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'settings' , 'role='.ROL.'&m='.$_GET['m'] ); ?>"><i class="fa fa-cogs"></i> <?php echo $_LANG["settings"];?></a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			<strong><?php echo $_LANG["list-pages"];?></strong>
			<span class="tools pull-right">
				<a class="tool-toggle" href="javascript:;"><i class="fa fa-chevron-down"></i></a>
			</span>
			</div>
			<div class="panel-body">
				
				<?php
				if( is_file($link.'/'.$module.'/data/update.php') ){
					if( is_file($update_url_file) ){
						if( URLexists($update_link) ){
							if( isUpgrade($upgrade_link) ){
								$update_a = '<a href="'.$_URLCMS->gtLinkAll(true,'update-mod',true).'" name="upd" title="'.$_LANG['urlupd-require'].'"><img src="'.MEDIA.'/img/icons/rss_red2.png'.'" /></a>';
							}else{
								$update_a = '<a name="upd" title="'.$_LANG['urlupd-not-require'].'"><img src="'.MEDIA.'/img/icons/rss_green2.png'.'" /></a>';
							}
						}else{
							$update_a = '<a name="upd" title="'.$_LANG['urlupd-not-connect'].'"><img src="'.MEDIA.'/img/icons/rss_yellow.png'.'" /></a>';
						}
					}else{
						$update_a = '<a name="upd" title="'.$_LANG['urlupd-not-exists'].'"><img src="'.MEDIA.'/img/icons/rss_black1.png'.'" /></a>';
					}
				}else{
					$update_a = '<a name="upd" title="'.$_LANG['no-upgradeable'].'"><img src="'.MEDIA.'/img/icons/rss_gray2.png'.'" /></a>';
				}
				?>
				<div class="alert alert-info">
					<?php echo $_LANG["module"];?>: <label class="btn btn-xs btn-info"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label> <?php echo $update_a;?>
				</div>
				
				
				<?php
				//$link = ROOT.'modules/'.$_SET["folder"];


				$dir=opendir("$link/".$module); 
				while ($folder = readdir($dir)){
				  if(is_file("$link/$module/".$folder) && $folder != '.' && $folder != '..'){
					//echo "_".$folder."_";
					$names = explode('.',$folder);
					//$name = $names[0];
					if($names[count($names)-2] == 'body'){
						if( count($names) > 1 ){
							$names2 = $names;
							unset( $names2[count($names)-1] );
							$name = implode('.',$names2);
						}else{
							$name = $names[0];	
						}
						//echo "_".$names[count($names)-2]."_";
						//echo "_".nameFile($folder)."_";
						$pags[$name] = nameFile($folder);
					}
				  }
				}
				closedir($dir);
				sort($pags);

				//ksort($mods); // ASC SORT BY KEY
				$isIndex = false;
				if( count($pags) > 0 ){
					//echo "<br />";
					//echo "<ul class=\"listpages\">";
				?>
				<div class="list-group">
				<?php
					foreach($pags as $pag => $title){ if($title == 'index'){$isIndex = true;}
					
						$open_link = $_URLCMS->gtLink( null , 'mngr-p' , "role=".ROL."&m=$module&pg=$title" );
						$del_link  = $_URLCMS->gtLink( null , 'del-p' , "role=".ROL."&m=$module&pg=$title" );
						$ren_link  = $_URLCMS->gtLink( null , 'ren-p' , "role=".ROL."&m=$module&pg=$title" );
				?>
					<div class="list-group-item list-condensed list-hover">
						<a href="<?php echo $open_link;?>"><button class="btn btn-sm btn-warning"><i class="fa fa-file"></i> <strong><?php echo $title;?></strong></button></a>
						<div class="pull-right">
						<a href="<?php echo $ren_link;?>" class="btn btn-sm btn-default" title="<?php echo $_LANG["rename-page"];?>"><i class="fa fa-edit"></i></a>
						<a href="<?php echo $del_link;?>" class="btn btn-sm btn-danger" title="<?php echo $_LANG["remove-page"];?>"><i class="fa fa-trash-o"></i></a>
						</div>
					</div>
				<?php
					}
					//echo "</ul>";
				?>
				</div>
				<?php }else{ ?>
				<div class="alert alert-warning">
				<?php echo $_LANG['no-pages-yet'];?>
				</div>	
				<?php } ?>
				
				<?php if(!$isIndex){ ?>
				<div class="alert alert-warning">
                <i><?php echo $_LANG['index-advice'];?></i>
                </div>
				<?php } ?>
			</div>
			<div class="panel-footer">
			<strong><?php echo count($pags);?></strong> <?php echo (count($pags)=='1')?$_LANG['page']:$_LANG['pages'];?>
			</div>
		</div>	
	</div>	
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<i class="fa fa-suitcase"></i> <?php echo $_LANG["module-info"];?>
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
</div>