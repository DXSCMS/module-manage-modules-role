<link rel="stylesheet" type="text/css" href="<?php echo MEDIA;?>/gritter/css/jquery.gritter.css" />
<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/gritter/js/jquery.gritter.min.js"></script>

<script>
$(function() {
	<?php //print_r($_CMS["settings"]); //print_r($SET_RST);
	foreach($_CMS["settings"] as $sett => $val){
		if( isset($SET_RST[$sett]["on-change-update"]) ){
			$_update = $SET_RST[$sett]["on-change-update"];
			if( is_array($_update) && count($_update)>0 ){
	?>
$('#fsettingsuser select[name="<?php echo $sett;?>"]').change(function(e) {
	var url = '<?php echo $_URLCMS->gtLinkCMS(true,"sett-cms-ajax",Array("find"=>implode(',',$_update)));?>';
	url += '&skin=' + this.value;
	$.post( url , {} , function(data) {  // console.log(data);
	<?php foreach($_update as $_upd_sett){ ?>
	if( data['login-template'] && data['<?php echo $_upd_sett;?>'].length >0 ){
			$('#fsettingsuser select[name="<?php echo $_upd_sett;?>"]').empty();
			$.each( data['<?php echo $_upd_sett;?>'],function(id,row){
				$('#fsettingsuser select[name="<?php echo $_upd_sett;?>"]').append('<option value="'+row+'">'+row+'</option>');	    	
			});
		}
	<?php } ?>
	})
	  .fail(function() {	    
		$.gritter.add({text: '<?php echo $_LANG['ajax-error'];?>'});
	  })
	<?php }
		}
	}
	?>
});
});
</script>