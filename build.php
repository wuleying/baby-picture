<?php
// 目录分隔符
define('DS', DIRECTORY_SEPARATOR);
// 项目根目录
define('ROOT_PATH', dirname(__FILE__));
// HTML目录
define('HTML_PATH', ROOT_PATH . DS . 'html');
// 图片目录
define('PIC_PATH', HTML_PATH . DS . 'pic');
// 模板
define('TEMPLATE_FILE', ROOT_PATH . DS . 'template' . DS . 'index.html');

// 获取当天时间
$time  = time();
$month = date('Ym', $time);
$day   = date('d', $time);

$pic_dir  = PIC_PATH . DS . $month;
$html_dir = HTML_PATH . DS . $month;

// 生成图片目录
if (!is_dir($pic_dir)) {
    mkdir($pic_dir, 0755);
}

// 生成HTML目录
if (!is_dir($html_dir)) {
    mkdir($html_dir, 0755);
}

$pic_file = $pic_dir . DS . $day . '.png';
$html_file = $html_dir . DS . $day . '.html';

$pic = "/pic/{$month}/{$day}.png";

$result = '';

if (file_exists($pic_file) && !file_exists($html_file)) {
    $content = file_get_contents(TEMPLATE_FILE);
    $content = str_replace('%pic_file%', $pic, $content);
    file_put_contents($html_file, $content);
    $result = $html_file;
}

echo 'Success.' . $result . PHP_EOL;

