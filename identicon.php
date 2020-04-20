<?php
require_once __DIR__ . '/vendor/autoload.php';
use Identicon\Identicon;

$identicon = new Identicon();


$identicon->displayImage('test.com', 64, '999999');