<style>
</style>

<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/edit_area/edit_area_full.js"></script>
<!--<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/js/bootbox.js"></script>-->

<link rel="stylesheet" type="text/css" href="<?php echo MEDIA;?>/gritter/css/jquery.gritter.css" />
<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/gritter/js/jquery.gritter.min.js"></script>

<script language="Javascript" type="text/javascript">
editAreaLoader.init({
			id: "editcode"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "y"
			,allow_toggle: true
			//,word_wrap: true
			,language: "en"
			,syntax: "php"
			,toolbar: "save,|, search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, syntax_selection,|,word_wrap,|,highlight, reset_highlight, |, help"
			,save_callback: "saveCode"
});


function saveCode(id, content){
	$.post("<?php echo $_URLCMS->gtLink( null , 'save-file' , "role=".ROL );?>", 
		{mode:'ajax',txtarea:content,type:'modhead',module:'<?php echo $_GET["m"];?>'},
		function(data) { //alert(data);	//bootbox.alert(data);
			$.gritter.add({text: data});
		});
}
</script>