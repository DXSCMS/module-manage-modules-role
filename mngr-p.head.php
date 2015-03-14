<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/edit_area/edit_area_full.js"></script>
<!--<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/js/bootbox.js"></script>-->

<link rel="stylesheet" type="text/css" href="<?php echo MEDIA;?>/gritter/css/jquery.gritter.css" />
<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/gritter/js/jquery.gritter.min.js"></script>
<style>
html, body { height: 100%; }
</style>
<style>
</style>
<style>
@media screen and (max-width: 768px) {
	.col-l,.col-r{
		float: none !important;
	}
}
</style>
<script language="Javascript" type="text/javascript">

editAreaLoader.init({
			id: "codepreh"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "y"
			,allow_toggle: true
			//,word_wrap: false
			,language: "en"
			,syntax: "php"
			,toolbar: "save,|, search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, syntax_selection, word_wrap"
			,save_callback: "saveCode"
});
editAreaLoader.init({
			id: "codehead"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "y"
			,allow_toggle: true
			//,word_wrap: false
			,language: "en"
			,syntax: "php"
			,toolbar: "save,|, search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, syntax_selection, word_wrap"
			,save_callback: "saveCode"
});
editAreaLoader.init({
			id: "codebody"	// id of the textarea to transform		
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
	//alert("Se grabará " + id);
	//alert(content);return;
	if(id == "codebody"){
		$.post("<?php echo $_URLCMS->gtLinkAjax( true , 'save-file' , "role=".ROL );?>", { 
				//mode:'ajax',
				type:document.fcodebody.type.value,
				module:document.fcodebody.module.value,
				page:document.fcodebody.page.value,
				txtarea:content},
			function(data) { //alert(data);	//bootbox.alert(data);
				$.gritter.add({text: data});
			});
	}else if(id == "codepreh"){
		$.post("<?php echo $_URLCMS->gtLinkAjax( true , 'save-file' , "role=".ROL );?>", { 
				//mode:'ajax',
				type:document.fcodepreh.type.value,
				module:document.fcodepreh.module.value,
				page:document.fcodepreh.page.value,
				txtarea:content},
			function(data) { //alert(data);	//bootbox.alert(data);
				$.gritter.add({text: data});
			});
	}else if(id == "codehead"){
		$.post("<?php echo $_URLCMS->gtLinkAjax( true , 'save-file' , "role=".ROL );?>", { 
				//mode:'ajax',
				type:document.fcodehead.type.value,
				module:document.fcodehead.module.value,
				page:document.fcodehead.page.value,
				txtarea:content},
			function(data) { //alert(data);	//bootbox.alert(data);
				$.gritter.add({text: data});
			});
	}
	//alert('Saved!');
}
</script>

