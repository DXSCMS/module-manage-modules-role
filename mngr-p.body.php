<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , "role=".ROL."&m=".$_GET['m'] );?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>				
		&nbsp;
		<a class="btn btn-default" href="<?php echo $_URLCMS->gtLink( null , 'mngr-p' , "role=".ROL."&m=".$_GET['m']."&pg=".$_GET['pg'] );?>"><i class="fa fa-refresh"></i> <?php echo $_LANG["refresh"];?></a>
	</div>
</div>
<?php
//$link = "modules-".$_SET["folder"];
$link = $linkMod;

$module = $_GET['m'];
$page   = $_GET['pg'];

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

$dirpage = "$link/$module/$page.body.php";
$dirhead = "$link/$module/$page.head.php";
$dirpreh = "$link/$module/$page.preh.php";
$dirlang = "$link/$module/lang/";


if(is_file($dirpage)){

//echo $buffer;
?>
<div class="row">
	<div class="col-md-5 pull-right col-r">
		<div class="panel panel-default">
			<div class="panel-heading">
			<strong><?php echo $_LANG['preh'];?></strong>
			<span class="tools pull-right">				
				<a class="tool-toggle" href="javascript:;"><i class="fa fa-chevron-down"></i></a>
			</span>
			</div>
			<div class="panel-body">
				<form name="fcodepreh" id="fcodepreh" method="post" action="<?php echo $_URLCMS->gtLink( null , 'save-file' , "role=".ROL );?>">
				
					<input type="hidden" name="type" value="preh" />
					<input type="hidden" name="module" value="<?php echo $module;?>" />
					<input type="hidden" name="page" value="<?php echo $page;?>" />	
					
					<label class="btn btn-sm btn-default"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label>
					<label class="btn btn-sm btn-info"><i class="fa fa-code"></i> <?php echo "<b>$page</b>.preh.php";?> </label>												
					<button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-save"></i></button>
					
					<input type="hidden" name="dir" value="<?php echo $_GET['dir'];?>" />
					<div class="form-group" style="">
					<textarea class="form-control" name="txtarea" id="codepreh" style="width:100%;height:240px;" wrap="off"><?php 
						echo getData($dirpreh);
					?></textarea>			
					</div>
				</form>
				
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
		
		<div class="panel panel-default">
			<div class="panel-heading">
			<strong><?php echo $_LANG['head'];?></strong>
			<span class="tools pull-right">				
				
				<a class="tool-toggle" href="javascript:;"><i class="fa fa-chevron-down"></i></a>
			</span>
			</div>
			<div class="panel-body">
				<form name="fcodehead" id="fcodehead" method="post" action="<?php echo $_URLCMS->gtLink( null , 'save-file' , "role=".ROL );?>">
				
					<input type="hidden" name="type" value="head" />
					<input type="hidden" name="module" value="<?php echo $module;?>" />
					<input type="hidden" name="page" value="<?php echo $page;?>" />	
					
					<label class="btn btn-sm btn-default"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label>
					<label class="btn btn-sm btn-info"><i class="fa fa-code"></i> <?php echo "<b>$page</b>.head.php";?> </label>												
					<button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-save"></i></button>
					
					<input type="hidden" name="dir" value="<?php echo $_GET['dir'];?>" />
					<div class="form-group" style="">
					<textarea class="form-control" name="txtarea" id="codehead" style="width:100%;height:240px;" wrap="off"><?php 
						echo getData($dirhead);
					?></textarea>			
					</div>
				</form>
				
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
		
	</div>	
	
	<div class="col-md-7 pull-left col-l">
		<div class="panel panel-default">
			<div class="panel-heading">
			<strong><?php echo $_LANG['body'];?></strong>
			<span class="tools pull-right">				
				<!--<a class="tool-width" href="javascript:;"><i class="fa fa-chevron-right"></i></a>-->
				<a class="tool-toggle" href="javascript:;"><i class="fa fa-chevron-down"></i></a>
			</span>
			</div>
			<div class="panel-body">
				<form name="fcodebody" id="fcodebody" method="post" action="<?php echo $_URLCMS->gtLink( null , 'save-file' , "role=".ROL );?>">
				
					<input type="hidden" name="type" value="body" />
					<input type="hidden" name="module" value="<?php echo $module;?>" />
					<input type="hidden" name="page" value="<?php echo $page;?>" />		
					
					<label class="btn btn-sm btn-default"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label>
					<label class="btn btn-sm btn-info"><i class="fa fa-code"></i> <?php echo "<b>$page</b>.body.php";?> </label>												
					<button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-save"></i></button>
					
					<input type="hidden" name="dir" value="<?php echo $_GET['dir'];?>" />
					<div class="form-group" style="">
					<textarea class="form-control" name="txtarea" id="codebody" style="width:100%;height:400px;" wrap="off"><?php 
						echo getData($dirpage);
					?></textarea>			
					</div>
				</form>
				
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>	
</div>

<?php }else{?>
<div class="alert alert-danger ">			
	<?php echo $_LANG["error-opening-file"];?>					
</div>
<?php } ?>

<script>
/*
jQuery('.panel .tools .tool-width i').click(function () {
	var el = jQuery(this).parents(".panel").children(".panel-body");
	if (jQuery(this).hasClass("fa-chevron-right")) {
		jQuery(this).removeClass("fa-chevron-right").addClass("fa-chevron-left");
		//el.slideUp(200);
		var div = jQuery(this).parents(".panel").parents('div');console.log(div);
		if( $(div).hasClass('col-l') ){ // hide right			
			
			var row = $(div).parents('.row');
			$('.col-r',row).hide();
			$(div).removeClass('col-md-7');//
			$(div).addClass('col-md-12');
		}
	} else {
		jQuery(this).removeClass("fa-chevron-left").addClass("fa-chevron-right");
		//el.slideDown(200);
		var div = jQuery(this).parents(".panel").parents('div');console.log(div);
		if( $(div).hasClass('col-l') ){ // hide right			
			//$(div).removeClass('col-md-12').addClass('col-md-7');
			var row = $(div).parents('.row');
			$('.col-r',row).show();
		}
	}
});
*/
</script>	


