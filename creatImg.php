<?php
$fundcode = 5;
$template = $_GET['template'];


//1.创建画布，默认的背景是黑色
$im_w = 750;
$im_h = 1054+$fundcode*70;
$im=imagecreatetruecolor($im_w,$im_h);
//选择主题
switch ($template)
{
    case 1:
        $head_template_filepath = "dtzhtemplate/dtzh_head_template_1.png";
        $foot_template_filepath = "dtzhtemplate/dtzh_foot_template_1.png";
        $boder_template_filepath = "dtzhtemplate/dtzh_boder_template_1.png";
        $color1=imagecolorallocate($im,255, 241, 241); //表格背景1
        $color2=imagecolorallocate($im,255, 255, 255); //表格背景2
        $color_text=imagecolorallocate($im,34, 34, 34); //字体颜色1
        $color_text2=imagecolorallocate($im,102, 102, 102); //字体颜色2
        $color_text3 = $color_text;
        $color_red=imagecolorallocate($im,233, 53, 59);
        $color_green=imagecolorallocate($im,67, 146, 40);
        $offset = 0;
        break;
    case 2:
        $head_template_filepath = "dtzhtemplate/dtzh_head_template_2.png";
        $foot_template_filepath = "dtzhtemplate/dtzh_foot_template_2.png";
        $boder_template_filepath = "dtzhtemplate/dtzh_boder_template_2.png";
        $color1=imagecolorallocate($im,242, 237, 252); //表格背景1
        $color2=imagecolorallocate($im,255, 255, 255); //表格背景2
        $color_text=imagecolorallocate($im,34, 34, 34); //字体颜色1
        $color_text2=imagecolorallocate($im,102, 102, 102); //字体颜色2
        $color_text3 = $color_text;
        $color_red=imagecolorallocate($im,233, 53, 59);
        $color_green=imagecolorallocate($im,67, 146, 40);
        $offset = 10;
        break;
    case 3:
        $head_template_filepath = "dtzhtemplate/dtzh_head_template_3.png";
        $foot_template_filepath = "dtzhtemplate/dtzh_foot_template_3.png";
        $boder_template_filepath = "dtzhtemplate/dtzh_boder_template_3.png";
        $color1=imagecolorallocate($im,2, 3, 69); //表格背景1
        $color2=imagecolorallocate($im,0, 0, 52); //表格背景2
        $color_text=imagecolorallocate($im,255, 255, 255); //字体颜色1
        $color_text2=imagecolorallocate($im,187, 187, 187); //字体颜色2
        $color_text3=$color_text2;
        $color_red=imagecolorallocate($im,233, 53, 59);
        $color_green=imagecolorallocate($im,56, 216, 0);
        $offset = 10;
        break;
    case 4:
        $head_template_filepath = "dtzhtemplate/dtzh_head_template_4.png";
        $foot_template_filepath = "dtzhtemplate/dtzh_foot_template_4.png";
        $boder_template_filepath = "dtzhtemplate/dtzh_boder_template_4.png";
        $color1=imagecolorallocate($im,232, 234, 255); //表格背景1
        $color2=imagecolorallocate($im,255, 255, 255); //表格背景2
        $color_text=imagecolorallocate($im,34, 34, 34); //字体颜色1
        $color_text2=imagecolorallocate($im,84, 84, 84); //字体颜色2
        $color_text3=imagecolorallocate($im,122, 122, 122); //字体颜色2
        $color_red=imagecolorallocate($im,233, 53, 59);
        $color_green=imagecolorallocate($im,67, 146, 40);
        $offset = 10;
        break;
    case 5:
        $head_template_filepath = "dtzhtemplate/dtzh_head_template_5.png";
        $foot_template_filepath = "dtzhtemplate/dtzh_foot_template_5.png";
        $boder_template_filepath = "dtzhtemplate/dtzh_boder_template_5.png";
        $color1=imagecolorallocate($im,253, 238, 236); //表格背景1
        $color2=imagecolorallocate($im,255, 255, 255); //表格背景2
        $color_text=imagecolorallocate($im,34, 34, 34); //字体颜色1
        $color_text2=imagecolorallocate($im,84, 84, 84); //字体颜色2
        $color_text3=imagecolorallocate($im,122, 122, 122); //字体颜色2
        $color_red=imagecolorallocate($im,233, 53, 59);
        $color_green=imagecolorallocate($im,67, 146, 40);
        $offset = 10;
        break;
    default :
        $head_template_filepath = "dtzhtemplate/dtzh_head_template_1.png";
        $foot_template_filepath = "dtzhtemplate/dtzh_foot_template_1.png";
        $boder_template_filepath = "dtzhtemplate/dtzh_boder_template_1.png";
        $color1=imagecolorallocate($im,255, 241, 241); //表格背景1
        $color2=imagecolorallocate($im,255, 255, 255); //表格背景2
        $color_text=imagecolorallocate($im,34, 34, 34); //字体颜色1
        $color_text2=imagecolorallocate($im,102, 102, 102); //字体颜色2
        $color_text3 = $color_text;
        $color_red=imagecolorallocate($im,233, 53, 59);
        $color_green=imagecolorallocate($im,67, 146, 40);
        $offset = 0;
        break;
}
//默认是黑色背景，修改为白色
$white=imagecolorallocate($im,255, 255, 255);
imagefill($im,0,0,$white);

//2.绘制需要的各种图形
//拷贝图片到画布
$srcImage=imagecreatefrompng($head_template_filepath);
$srcImageInfo=getimagesize($head_template_filepath);
$imageWidth_head=$srcImageInfo[0];
$imageHeight_head=$srcImageInfo[1];
////拷贝源图片到目标画布
imagecopy($im, $srcImage,0,0,0,0,$imageWidth_head,$imageHeight_head);
//拷贝图片到画布
$srcImage=imagecreatefrompng($foot_template_filepath);
//这里我们可以使用一个getimagesize()
$srcImageInfo=getimagesize($foot_template_filepath);
$imageWidth_foot=$srcImageInfo[0];
$imageHeight_foot=$srcImageInfo[1];
////拷贝源图片到目标画布
imagecopy($im, $srcImage,0, $im_h-$imageHeight_foot,0,0,$imageWidth_foot,$imageHeight_foot);


//拷贝图片到画布
$srcImage=imagecreatefrompng($boder_template_filepath);
$srcImageInfo=getimagesize($boder_template_filepath);
$imageWidth_boder=$srcImageInfo[0];
$imageHeight_boder=$srcImageInfo[1];

for ($i=0;$i<$fundcode;$i++)
{
    //拷贝源图片到目标画布
    imagecopy($im, $srcImage, 0, $imageHeight_head+ 70*$i, 0, 0, $imageWidth_boder, $imageHeight_boder);
    $srcImage = imagerotate($srcImage, 180, 0);
    imagecopy($im, $srcImage, $im_w-$imageWidth_boder, $imageHeight_head+ 70*$i, 0, 0, $imageWidth_boder, $imageHeight_boder);
    $srcImage = imagerotate($srcImage, 180, 0);
    if ($i%2==0)//矩形背景色
        imagefilledrectangle($im, $imageWidth_boder, $imageHeight_head+70*$i, $im_w-$imageWidth_boder, $imageHeight_head + 70+ 70*$i, $color1);
    else
        imagefilledrectangle($im, $imageWidth_boder, $imageHeight_head+70*$i, $im_w-$imageWidth_boder, $imageHeight_head + 70+ 70*$i, $color2);
    //写字
    $str = "富国天惠成长混合(LOG)A";
    imagettftext($im, 16, 0, $imageWidth_boder+9+$offset, $imageHeight_head+30+70*$i, $color_text, "PingFang.ttc", $str);
    $str = "161005";
    imagettftext($im, 14, 0, $imageWidth_boder+9+$offset, $imageHeight_head+62+70*$i, $color_text2, "PingFang.ttc", $str);
    $str = "100000.00";
    imagettftext($im, 16, 0, $imageWidth_boder+340+$offset, $imageHeight_head+42+70*$i, $color_text, "PingFang.ttc", $str);
    $str = "125";
    imagettftext($im, 16, 0, $imageWidth_boder+490+$offset, $imageHeight_head+42+70*$i, $color_text, "PingFang.ttc", $str);
    $str = "-35.12%";
    imagettftext($im, 16, 0, $imageWidth_boder+560+$offset, $imageHeight_head+42+70*$i, $color_green, "PingFang.ttc", $str);
}
//写字
imagefilledrectangle($im, $imageWidth_boder, $imageHeight_head+20+70*$i, $im_w-$imageWidth_boder, $imageHeight_head + 70+ 70*$i, $color2);
$str = "（定投方式：周定投；定投扣款日：每周四；";
imagettftext($im, 16, 0, $imageWidth_boder, $imageHeight_head +42+70*$i, $color_text3, "PingFang.ttc", $str);
$str = "定投方式";
imagettftext($im, 16, 0, $imageWidth_boder+21, $imageHeight_head +42+70*$i, $color_text3, "PingFang.ttc", $str);
$str = "定投扣款日";
imagettftext($im, 16, 0, $imageWidth_boder+210, $imageHeight_head +42+70*$i, $color_text3, "PingFang.ttc", $str);
$str = "定投周期：从2018/01/24上；证指数3559.47点至2019/07/19）";
imagettftext($im, 16, 0, 55, $imageHeight_head +70+ 70*$i, $color_text3, "PingFang.ttc", $str);
$str = "定投周期";
imagettftext($im, 16, 0, 55, $imageHeight_head +70+ 70*$i, $color_text3, "PingFang.ttc", $str);

//3.输出图像到网页，也可以另存
header("content-type:image/png");
imagepng($im);
//4.销毁该图片（释放内存--服务器内存）
imagedestory($im);