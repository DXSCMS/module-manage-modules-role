<?php include "$link/".$_GET["m"]."/data/settings.cms.php";?>
<div class="row">
	<div class="col-md-12">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'mngr-m' , "m=".$_GET['m'] ); ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>		
		<?php if(!$post){ ?>
		&nbsp;
		<a class="btn btn-success" href="#" onclick="document.fsettings.submit();"><i class="fa fa-save"></i> <?php echo $_LANG["save"];?></a>
		<?php } ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading"><strong><?php echo $_LANG["sett-mod"];?></strong></div>
			<div class="panel-body">
				<div class="alert alert-info">
					<?php echo $_LANG["module"];?>: <label class="btn btn-xs btn-info"><i class="fa fa-folder-open"></i> <?php echo $_GET['m'];?></label>
				</div>
				
				<?php if(!$post){ ?>
				<?php 
				//$action = "?mod=".MOD."&role=".ROL."&p=".$_GET["p"]."&m=".$_GET["m"];
				$action = $_URLCMS->gtLink( null , null , "role=".ROL."&m=".$_GET["m"] );
				?>
				<form name="fsettings" id="fsettings" method="POST" action="<?php echo $action;?>" class="form-horizontal">
				<input type="hidden" name="action" value="post" />
				<?php
				
				$txtform  = "";
				foreach($MOD_SET as $sett => $val){
					if(isset($SET_RST[$sett]["type"]) ){ //existe manejador;
						$type = $SET_RST[$sett]["type"];
						if(isset($_LANG["info-sett"][$sett])){$label = $_LANG["info-sett"][$sett];}else{$label=$sett;}
						$item = "<div class=\"form-group\"><label class=\"col-md-4 control-label\">".$label.":</label>";
						$item .= "<div class=\"col-md-8\">";
						if($type == "select"){
							$item .= "<select class=\"form-control\" name=\"$sett\">\n";
							$values = explode('|',$SET_RST[$sett]["values"]);
							foreach($values as $typ){
								$item .= "<option value=\"$typ\" ";
								if($typ == $val){$item .= "selected ";}
								if(isset($_LANG["info-values"][$typ])){$namee = $_LANG["info-values"][$typ];}else{$namee = $typ;}
								$item .= ">".$namee."</option>";
							}
							$item .= "</select>\n";
						}else if($type == "checkbox"){
							$item .= "<input type=\"checkbox\" name=\"$sett\"";
							if($val){$item .= " checked";}
							$item .= " />";
						}
						$item .= "</div>";
						$item .= "</div>";
						$txtform .= $item;
						
					}else{
						$txtform = "<input type=\"hidden\" name=\"action\" value=\"error\" />";
						$txtform .= '<div class="alert alert-danger">';
						$txtform .= $_LANG["error-notype"];
						$txtform .= '</div>';
						break;
					}
				}
				echo $txtform;
				?>
				</form>
				<div class="alert alert-info">					
					<?php echo $_LANG["info-settings"];?>
				</div>
				<?php }else{ ?>

				<pre>
				<?php echo $txtphp; ?>
				</pre>

				<?php } ?>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>
<?php unset($MOD_SET);?>