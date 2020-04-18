<?php
include "Help.php";
echo "好运质数日：<br>";
for ($date = date('Ymd', strtotime('20190101')); strtotime($date)<=strtotime('20481231');$date=date('Ymd', strtotime($date)+3600*24))
{
    for ($i=0;$i<8;$i++)
    {
        $num = intval(substr($date,$i,8-$i));
        if (!isPrime(intval($num)))
            break;
        if ($i==7)
        {
            echo $date.'<br>';
        }
    }
}
