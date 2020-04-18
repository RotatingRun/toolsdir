<?php

if (! function_exists('listFile')) {
    /**
     * 获取目标路径下的文件
     * @param $filePath 目标目录
     * @param bool $isPrint 是否显示文件目录
     * @return array $retPathArr 文件路径列表
     */
    function listFile($filePath, $isPrint = false)
    {
        $retPathArr = [];
        //1、首先先读取文件夹
        $fileArr = scandir($filePath, 0);
        //遍历文件夹
        foreach ($fileArr as $file)
        {
            $path = $filePath . '/' . $file;
            if (is_dir($path)) {//如果是文件夹则执行

                if ($file == '.' || $file == '..') {//判断是否为系统隐藏的文件.和..  如果是则跳过否则就继续往下走，防止无限循环再这里。
                    continue;
                }

                if ($isPrint === true)
                    echo "<div style='color: red;'>$path</div>"; //把文件夹红名输出

                $pathArr = listFile($path, $isPrint);//因为是文件夹所以再次调用自己这个函数，把这个文件夹下的文件遍历出来
                $retPathArr = array_merge($retPathArr, $pathArr);
            } else {

                if ($isPrint === true)
                    echo $path."<br/>";
                $type = mb_substr($file,mb_strpos($file, '.')+1);
                $retPathArr[] = [
                    'filePath' => $path,
                    'fileName' => $file,
                    'fileType' => $type
                    ];

            }
        }
        return $retPathArr;
    }
}

if (!function_exists('isPrime')) {
    /**
     * 判断一个数据是否为质数
     * @param $n 整数
     * @return bool
     */
    function isPrime($n)
    {
        if ($n <= 3) {
            return $n > 1;
        } else if ($n % 2 === 0 || $n % 3 === 0) { // 排除能被2整除的数(2x)和被3整除的数(3x)
            return false;
        } else { // 排除能被6x+1和6x+5整除的数
            for ($i = 5; $i * $i <= $n; $i += 6) {
                if ($n % $i === 0 || $n % ($i + 2) === 0) {
                    return false;
                }
            }
            return true;
        }
    }
}
if (!function_exists('isPhoneNumber')) {
    /**
     * 判断是否是手机号码
     * @param $str
     * @return false|int
     */
    function isPhoneNumber($str)
    {
        return preg_match("/^1[3456789]\d{9}$/", $str);
    }
}