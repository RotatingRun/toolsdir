<?php
    date_default_timezone_set("Asia/Shanghai");
    $filename = "bing_".date('Ymd').".png";
    if(file_exists($filename))
        exit();
    $bing = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
    $path = substr($bing, strpos($bing, '<url>')+5,strpos($bing, '</url>')-strpos($bing, '<url>')-5);

    $imgurl = 'http://cn.bing.com/'.$path;
    $img = file_get_contents($imgurl);
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    fwrite($myfile, $img);
    fclose($myfile);