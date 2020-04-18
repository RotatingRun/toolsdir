<?php
require './Help.php';
$filePath = "./";
$fileArr = scandir($filePath, 0);

foreach ($fileArr as $file)
{
	if (is_dir($file) || !strpos($file,'.php'))
		continue;
	echo "<a href='./".$file."'>".$file."</a><br/>";
}
//listFile($filePath, true);

