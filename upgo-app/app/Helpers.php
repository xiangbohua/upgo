<?php

/*
 * 全局使用的自定义函数
 * 命名规则：驼峰式，以小写h开头，尽量短；若仅在当前文件使用则以_开头；
 * @author Jason
 * @version 2017-05-04
 */

use App\Exceptions\KnownLogicException;
use Illuminate\Support\Facades\Log;

/**
 * 生成静态文件路径，并后缀系统版本号
 * @param type $path 路径
 * @param type $secure 是否使用https
 */
function hUrlAsset($path, $secure = null) {
    echo URL::asset($path, $secure),
    false === strpos($path, '?') ? '?rgv=' : '&rgv=',
    defined('_STATIC_FILE_VERSION_') ? _STATIC_FILE_VERSION_ : 0;
}

function hCasePage($caseInfoId)
{
    return '/page/case/'.$caseInfoId;
}

function hCategoryPage($categoryPage, $page = 0)
{
    if (!isset($categoryPage) || $categoryPage == 0) {
        return '/page/cate';
    }

    $pageStr = !isset($page) || $page == 0 ? '' : ('/page/'.$page);

    return '/page/cate/'.$categoryPage.$pageStr;
}

function hTotalPage($total, $size)
{
    if (!isset($total)) {
        return 0;
    }
    $size = $size ?? 12;
    return ceil($total / $size);
}

function hCheckViewWidget($allWidget, $widgetName){
    if(empty($allWidget) || empty($widgetName))
        return false;

    if(isset($allWidget['view_widget'])){
        foreach ($allWidget['view_widget'] as $ww){
            if(isset($ww['action']) && $ww['action'] == $widgetName){
                return true;
            }
        }
    }
    return false;
}

function hdate($timestamp = 0, $formatter = 'Y-m-d H:i:s')
{
    if($timestamp == 0)
    {
        return date($formatter, time());
    }
    return date($formatter, $timestamp);
}

function hIsTestEvn(){

    return 'test' == _ENV_FILE_PATH_ || 'debug' == _ENV_FILE_PATH_ || 'dev' == _ENV_FILE_PATH_;
}

function hTryMapArray($array, $key, $defaultString = '未知') {
    if (key_exists($key, $array)) {
        return $array[$key];
    } else {
        return $defaultString.$key;
    }
}

function hTryShowTime($timeString, $holder = '') {
    if (strtotime($timeString) > 0) {
        return $timeString;
    } else {
        return $holder;
    }
}

function hFormatException(\Exception $e, $writeLog = false)
{
    $traceString = '';
    $arr = $e->getTrace();
    foreach ($arr as $tra) {
        $traceString .= key_exists('file', $tra) ? ' FILE:'. $tra['file'] ." ": '';
        $traceString .= key_exists('line', $tra) ? ' LINE:'.$tra['line'] ." " : '';
        $traceString .= key_exists('function', $tra) ? ' FUNCTION:'.$tra['function'] ." " : '';
        $traceString .= "\n";
    }
    $msg = $e->getMessage()."\n".
        "TRACE:".$traceString;
    if ($writeLog === true) {
        Log::error($msg);
    }
    return $msg;
}
/**
 * 使用此方法检查逻辑是否满足条件，如果检查的表达式为false，则抛出KnownLogicException，此错误可以被捕捉并且直接返回错误
 * @param  bool $checkBoolValue 需要检查的值货值表达式
 * @param string $errorMessage 检查条件不满足时应当返回的错误信息
 * @throws KnownLogicException 抛出错误
 */
function checkLogicAndThrow($checkBoolValue, $errorMessage = '逻辑错误')
{
    if (!$checkBoolValue) {
        throw new KnownLogicException($errorMessage);
    }
}