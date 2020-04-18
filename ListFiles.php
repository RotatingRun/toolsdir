<?php

require __DIR__.'/vendor/autoload.php';
require './Help.php';

use Overtrue\Pinyin\Pinyin;

$filePath = 'logo/bank';
$newFilePath = 'logo_new/bank';

if (!file_exists($newFilePath)) {
    mkdir($newFilePath, 0777, true); //没有保存目录创建
}

$retFileArr = [];
$pinyin = new Pinyin(); //拼音类用于翻译成拼音
$fileList = listFile($filePath); //获取目标文件列表
foreach ($fileList as $file) {
    $abbrFileName = $pinyin->abbr($file['fileName']); //翻译成汉字的首字母
    if (strlen($abbrFileName) > 0) {
        $i = 0;
        while (file_exists($newFilePath.'/bank_'.$abbrFileName.'.'.$file['fileType'])) {
            //为了避免重名，有重名就加一个数字
            ++$i;
            if (1 == $i) {
                $abbrFileName = $abbrFileName.$i;
            } else {
                $abbrFileName = substr($abbrFileName, 0, strlen($abbrFileName) - 1).$i;
            }
        }

        if (copy($file['filePath'], $newFilePath.'/bank_'.$abbrFileName.'.'.$file['fileType'])) {
            $firChar = strtoupper(substr($abbrFileName, 0, 1));
            $retFileArr[$firChar][$abbrFileName] = str_replace('.'.$file['fileType'], '', $file['fileName']);
        }
    }
}
foreach ($retFileArr as &$retFile) {
    ksort($retFile);
}
ksort($retFileArr);
var_dump($retFileArr);
