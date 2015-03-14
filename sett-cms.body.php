<div class="row">
	<div class="col-md-6">
		<a class="btn btn-info"><i class="fa fa-user"></i> <strong><?php echo ROL;?></strong></a>
		<a class="btn btn-danger" href="<?php echo $_URLCMS->gtLink( null , 'list-mods' , "role=".ROL) ; ?>"><i class="fa fa-arrow-left"></i> <?php echo $_LANG["back"];?></a>			
		<?php if(!$post){ ?>
		&nbsp;<a class="btn btn-success" href="#" onclick="document.fsettingsuser.submit();"><i class="fa fa-save"></i> <?php echo $_LANG["save"];?></a>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
			<strong><?php echo $_LANG["user-settings"];?></strong>
			</div>
			<div class="panel-body">
			<?php if(!$post){ ?>
				<?php $action = $_URLCMS->gtLink( null , null , "role=".ROL ) ; ?>
				<form name="fsettingsuser" method="POST" action="<?php echo $action;?>" id="fsettingsuser" role="form">
				<input type="hidden" name="action" value="post" />
				<?php //print_r($MOD_SET);
				$txtform  = "";
				foreach($_CMS["settings"] as $sett => $val){
					if(isset($SET_RST[$sett]["type"]) ){ //existe manejador;
						$type = $SET_RST[$sett]["type"];
						if(isset($_LANG["info-sett"][$sett])){$label = $_LANG["info-sett"][$sett];}else{$label=$sett;}
						$item = "<div class=\"form-group\"><label>".$label.": </label>";
						
						if($type == "select" || $type == "select-php"){
							$item .= "<select class=\"form-control\" name=\"$sett\">\n";
							$values = explode('|',$SET_RST[$sett]["values"]);
							$values = array_unique($values);
							foreach($values as $typ){
								$item .= "<option value=\"$typ\" ";
								if($typ == $val){$item .= "selected ";}
								if(isset($_LANG["info-values"][$typ])){$namee = $_LANG["info-values"][$typ];}else{$namee = $typ;}
								$item .= ">".$namee."</option>";
							}
							$item .= "</select>\n";
						}else if($type == "checkbox"){
							$item .= " <label class=\"checkbox-inline\"><input type=\"checkbox\" name=\"$sett\"";
							if($val){$item .= " checked";}
							$item .= " />&nbsp;</label>";
						}else if($type == "text"){
							$item .= "<input class=\"form-control\" type=\"text\" name=\"$sett\" value=\"$val\" />";
						}else if($type = "number"){
							$item .= "<input class=\"form-control\" type=\"number\" name=\"$sett\" value=\"$val\" />";
						}
						$item .= "</div>";
						
						$txtform .= $item;
						
					}else{
						$txtform = "";
						$txtform .= "<input type=\"hidden\" name=\"action\" value=\"error\" />";
						//$txtform .= "<p>".$_LANG["error-notype"]."</p>";
						//$txtform .= "<p>[".$sett."]</p>";
						
						$txtform .= '<div class="alert alert-danger alert-dismissable">';
						$txtform .= $_LANG["error-notype"];
						$txtform .= '<br /><br />';
						$txtform .= '<label class="btn btn-sm btn-danger"><i class="fa fa-cog"></i> <strong>'.$sett.'</strong></label>';
						$txtform .= '</div>';
						break;
					}
				}
				echo $txtform;
				?>
				<div class="form-group">	
				<button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i> <?php echo $_LANG["save"];?></button>
				</div>
				</form>
			<?php }else{ ?>
			<div class="alert alert-danger">
				<?php echo $txtphp; ?>
			</div>
			<?php } ?>
			</div>
			<!--<div class="panel-footer"></div>-->
		</div>	
	</div>
</div>