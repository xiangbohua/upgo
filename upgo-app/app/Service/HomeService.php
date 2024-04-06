<?php

namespace App\Service;

use App\Models\ContactInfo;
use Illuminate\Support\Facades\DB;

class HomeService
{
    private $webDefaultSetting = [
        'caseTitleImg'=>'案例界面主图',
        'serviceTitleImg'=>'服务范围主图',
        'aboutTitleImg'=>'关于主图',
        'partnerTitleImg'=>'合作伙伴界面主图',
        'businessWechat'=>'合作商务微信号',
        'resumeContact'=>'简历投递地址及其备注',
        'siteLogo'=>'网站logo',
        'brandTitle'=>'品牌名称',
        'brandShortName'=>'品牌简称',
        'brandDesc'=>'网站详细介绍',
        'weiboLink'=>'微博地址',
        'qqLink'=>'qq地址',
        'weixiQrcodeLink'=>'微信二维码图片'
    ];

    public function getFooterInfo() {
        $allSetting = $this->listWebSetting();

        $addressInfos = DB::table('contact_address')
            ->where('deleted', 0)
            ->limit(3)
            ->get();
        $addressList = [];
        foreach ($addressInfos as $addressData) {
            $address = new ContactInfo();
            $address->titleName = $addressData->title_name;
            $address->titleHint = $addressData->title_hint;
            $address->detailAddress = $addressData->detail_address;
            $address->contactMobile = $addressData->contact_mobile;
            $address->contactChat = $addressData->contact_chat;
            $address->postCode = $addressData->post_code;
            $addressList[] = $address;
        }
        return array_merge($allSetting, ['addressList'=>$addressList]);
    }


    public function listWebSetting() {
        $allSettingData = DB::table('site_setting')
            ->select(['setting_code','setting_value'])
            ->get();
        $allSetting = [];
        foreach ($allSettingData as $data) {
            $allSetting[$data->setting_code] = $data->setting_value;
        }
        $result = [];
        foreach ($this->webDefaultSetting as $key=>$value) {
            $result[$key] = $allSetting[$key] ?? '';
        }
        return $result;
    }

}