<?php
//$linkuser = "modules-".$_SET["folder"];
$link = $linkMod;
function getData($file){
	$fp = @fopen($file, "a+");
	// Show File In TextArea
	$buffer="";
	while(!feof ($fp)) {
		$buffer .= fgets($fp);
	}
	@fclose($fp);
	return htmlspecialchars($buffer);
	//return $buffer;
}
$dir = "$link/".$_GET['m']."/data/module.preh.php";
$dir_lbl = "$link/<strong>".$_GET['m']."</strong>/data/module.preh.php";
?>
<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET['m'] ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>				
		&nbsp;
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLinkCurrent(); ?>"><i class="fa fa-refresh"></i> <?php echo $_LANG["refresh"];?></a>
	</div>
</div>
<!-- Sub Menu -->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["edit-preh-mod"];?></strong></div>
			<div class="panel-body">

				<?php if(is_file($dir)){ ?>
				<?php 
				$action = $_URLCMS->gtLink( null , 'save-file' , "role=".ROL."&m=".$_GET["m"] );
				?>
				<form name="feditpreh" method="post" action="<?php echo $action;?>">
					<input type="hidden" name="type" value="modpreh" />
					<input type="hidden" name="module" value="<?php echo $_GET["m"];?>" />
					
					<label class="btn btn-sm btn-default"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label>
					<label class="btn btn-sm btn-info"><i class="fa fa-code"></i> <?php echo $dir_lbl;?></label>												
					<button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-save"></i></button>
					
					<input type="hidden" name="dir" value="<?php echo $_GET['dir'];?>" />
					<div class="form-group" style="">
					<textarea class="form-control" name="txtarea" id="editcode" style="width:100%;height:300px;" wrap="off"><?php 
						echo getData($dir);
					?></textarea>			
					</div>
				</form>
				<?php }else{?>
				<div class="alert alert-danger ">			
					<?php echo $_LANG["error-opening-file"];?>					
				</div>
				<?php } ?>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>	
</div>