<?php
require 'vendor/autoload.php';
$file = 'text.txt';

$content = file_get_contents($file);
$arrContent = explode("\n", $content);

$startQ = $startO = $startA = $startJ =false;
$quenum = 0;
$ret = [];
foreach ($arrContent as $line)
{
    $line = trim($line);
    if (strlen($line)==0)
        continue;
    $sign = mb_substr($line,0,4);
    if ($sign == '[题目]')
    {
        $quenum++;
        $startO = $startA = $startJ =false;
        $startQ = true;
        $ret[$quenum]['question'] = mb_substr($line,4,mb_strlen($line)-4);
        continue;
    }elseif ($sign == '[选项]')
    {
        $startQ = $startA = $startJ =false;
        $startO = true;
        continue;
    }elseif ($sign == '[答案]')
    {
        $startQ = $startO = $startJ =false;
        $startA = true;
        $ret[$quenum]['answer'] = mb_substr($line,4,mb_strlen($line)-4);
        continue;
    }
    elseif ($sign == '[解析]')
    {
        $startA = $startQ = $startO =false;
        $startJ = true;
        $ret[$quenum]['jiexi'] = mb_substr($line,4,mb_strlen($line)-4);
        continue;
    }
    if ($startQ)
        $ret[$quenum]['question'] .= $line."\n";
    elseif ($startO)
    {
        $ret[$quenum]['option'][] = mb_substr($line, 2,mb_strlen($line)-2);
    }
    elseif ($startA)
        $ret[$quenum]['answer'] .=$line;
    elseif ($startJ)
        $ret[$quenum]['jiexi'] .= $line;
}
var_dump($ret);