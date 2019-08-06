<?php
    date_default_timezone_set("Asia/Shanghai");
    $savePath = "/Users/bhb/Pictures/";
    $fileName = $savePath."bing_".date('Ymd').".png";
    if(file_exists($fileName))
        exit();
    $bing = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
    $path = substr($bing, strpos($bing, '<url>')+5,strpos($bing, '</url>')-strpos($bing, '<url>')-5);

    $imgUrl = 'http://cn.bing.com/'.$path;
    $img = file_get_contents($imgUrl);
    $myFile = fopen($fileName, "w") or die("Unable to open file!");
    fwrite($myFile, $img);
    fclose($myFile);