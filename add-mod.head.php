<script language="JavaScript">

extArray = new Array("zip");
var maxSize = "100";

function submitForm(){
	file = document.finsmod.modup;
	if(!fileFormat(file)){return false;}		
	return true;
}

function fileFormat(inp_file){
	file = inp_file.value;		
	
	allowSubmit = false;
	if (!file) return;
	while (file.indexOf("\\") != -1){
	file = file.slice(file.indexOf("\\") + 1);
	//ext = file.slice(file.indexOf(".")).toLowerCase();
	exts = file.split('.');
	ext = exts[exts.length-1];

	}
	
	for (var i = 0; i < extArray.length; i++) {
		if (extArray[i] == ext) { allowSubmit = true; break; }
	}
	if (allowSubmit){ return true;}
	else{
	var message = "Please only upload files that end in types:  " + 
				  (extArray.join("  ")) + 
				  "\nPlease select a new file to upload and submit again.";
	alert(message);
	return false;
	}
}				
</script>