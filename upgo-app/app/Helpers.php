<?php

/*
 * 全局使用的自定义函数
 * 命名规则：驼峰式，以小写h开头，尽量短；若仅在当前文件使用则以_开头；
 * @author Jason
 * @version 2017-05-04
 */

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

/**
 * 生成静态文件路径，并后缀系统版本号
 * @param type $path 路径
 * @param type $secure 是否使用https
 */
function hUrlImage($path, $secure = null) {
    echo URL::asset($path, $secure);
}

function hCaseDetailPage($caseInfoId)
{
    return '/case/case/'.$caseInfoId;
}

function hCategoryPage($categoryId, $page = 0)
{
//    if (empty($categoryId) && $categoryId == 0 && empty($page) && $page == 0) {
//        return '/case/cate';
//    }
//
//    if (empty($categoryId)) {
//        return '/case/page/'.$page;
//    }
    return '/case/cate/'.$categoryId.'/page/'.$page;
}

/**
 * 计算总页数
 * @param $total
 * @param $size
 * @return false|float|int
 */
function hTotalPage($total, $size)
{
    if (!isset($total)) {
        return 0;
    }
    $size = $size ?? 12;
    return ceil($total / $size);
}

/**
 * 指定服务的界面
 * @param $categoryPage
 * @param $page
 * @return string
 */
function hServicePage($categoryPage, $page = 0)
{
    if (!isset($categoryPage) || $categoryPage == 0) {
        return '/service';
    }

    $pageStr = !isset($page) || $page == 0 ? '' : ('/page/'.$page);

    return '/service/'.$categoryPage.$pageStr;
}

/**
 * 服务详情界面
 * @param $serviceId
 * @return string
 */
function hServiceDetail($serviceId)
{
    return '/page/service/d/'.$serviceId;
}

/**
 * @param $partnerId
 * @return string
 */
function hPartnerPage($pageIndex) {
    return '/partner/page/'.$pageIndex;
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