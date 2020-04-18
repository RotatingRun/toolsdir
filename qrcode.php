<?php
include "phpqrcode/phpqrcode.php";
function GetQRCodeStream($params)
{
    if (!isset($params['outFile']))
    {
        $params['outFile']= false;
    }
    if (!isset($params['level']))
    {
        $params['level'] = QR_ECLEVEL_L;
    }
    if (!isset($params['size']))
    {
        $params['size'] = 6;
    }
    if (!isset($params['margin']))
    {
        $params['margin'] = 4;
    }
    if (!isset($params['saveandprint']))
    {
        $params['saveandprint'] = false;
    }
    QRcode::png($params['value'], $params['outFile'], $params['level'], $params['size'], $params['margin'],$params['saveandprint']);
//		var_dump($qrcode);exit();
//		return $qrcodeimg;
}
function GetQRCode($params)
{
    if (!isset($params['outFile']))
    {
        $params['outFile']='/tmp/qrcode.png';
    }
    if (!isset($params['level']))
    {
        $params['level'] = QR_ECLEVEL_L;
    }
    if (!isset($params['size']))
    {
        $params['size'] = 6;
    }
    if (!isset($params['margin']))
    {
        $params['margin'] = 4;
    }
    if (!isset($params['saveandprint']))
    {
        $params['saveandprint'] = false;
    }
    QRcode::png($params['value'], $params['outFile'], $params['level'], $params['size'], $params['margin'],$params['saveandprint']);
    $qrcodeimg = 'data:image/png;base64,'.base64_encode(file_get_contents($params['outFile']));
    if ($params['outFile'] == '/tmp/qrcode.png')
    {
        unlink('/tmp/qrcode.png');
    }
    return $qrcodeimg;
}
$params = ['value'=>'iloveu'];
GetQRCodeStream($params);