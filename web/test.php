<?php

/**
 * Этот код не вызывает ошибок
 */
// засекаем время выполнения скрипта
$time = microtime(true);
error_reporting('E_ALL');
ini_set('display_errors', 'on');

define('AAA', 'AAA');
$arr = [];
$r='ee';
try {
    for ($i = 0; $i < 100000; $i++) {
//$arr[BBB] = $i;
        $arr[$r] = $i;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
printf('%f seconds <br/>', microtime(true) - $time);
