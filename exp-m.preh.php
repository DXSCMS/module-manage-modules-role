<?php

function ZipFolder($root,$source,$destination){// echo 'from: '.$root.' / '.$source.' to: '.$destination;
    if (!extension_loaded('zip') || !file_exists($root.'/'.$source)){ return false;}

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {return false;}
    //$source = str_replace('\\', '/', realpath($source));
   
    if (is_dir($root.'/'.$source) === true){// echo '_opening_'.$root.'/'.$source.'_is_dir_';echo '<br />';
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root.'/'.$source), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($files as $file){
            $file = str_replace('\\', '/', $file);
            // Ignore "." and ".." folders
            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) ) continue;
            //$file = realpath($file); 
            //echo '_reading_file_'.$file.'_';echo '<br />';
            if (is_dir($file) === true){
                $zip->addEmptyDir(str_replace($root . '/', '', $file . '/'));
                //$zip->addEmptyDir($file);
            }else if (is_file($file) === true){
                $zip->addFromString(str_replace($root . '/', '', $file), file_get_contents($file));
                //$zip->addFromString($file, file_get_contents($root.'/'.$file));
            }
        }
    }
    else if (is_file($root.'/'.$source) === true){// echo '_'.$root.'/'.$source.'_is_file_';
        $zip->addFromString(basename($source), file_get_contents($root.'/'.$source));
    }
    return $zip->close();
}


if($_POST){
	if( $_POST["module"] == $_GET["m"] ){
		$modName = $_POST["module"];
		
		$modFolder = $_SET["mod-dir"].'/'.$modName;
		$outPut = TEMP.'/expmod.'.$modName.'.zip';
		if( ZipFolder( $_SET["mod-dir"] , $modName , $outPut ) ){
		    
		    //header("Content-Type: archive/zip");
		    header("Content-Transfer-Encoding: binary");
		    header("Content-type: application/force-download");
		    header("Content-Disposition: attachment; filename=$modName.zip");
		    $filesize = filesize($outPut);
		    header("Content-Length: $filesize");
		    //$fp = fopen($outPut,"r");
		    readfile($outPut);
		    unlink($outPut);
		    exit();
		    
		}else{
			$error = true;
			$errormsg = $_LANG["error-zipping"];
		}
	}
}
?>