<?php
$link = SETTINGS.'/';
$dir=opendir($link); 
while ($folder = readdir($dir)){
  if(is_file("$link/".$folder) && $folder != '.' && $folder != '..'){
		if(  preg_match("/^role./", $folder) ) {
			$role = explode(".",$folder);
			$role = $role[1];
			$roles[] = $role;
		}
  }
}
closedir($dir);
?>