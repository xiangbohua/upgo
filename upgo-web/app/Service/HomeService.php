<?php

namespace App\Service;

use App\Models\ContactInfo;
use Illuminate\Support\Facades\DB;

class HomeService
{
    /**
     * @var string[] 网站配置
     */
    private $webDefaultSetting = [
        'brand_title'=>'品牌名称',
        'brand_short_name'=>'品牌简称',
        'brand_desc'=>'网站详细介绍',

        'case_title_img'=>'案例界面主图',
        'service_title_img'=>'服务范围主图',
        'about_title_img'=>'关于主图',
        'partner_title_img'=>'合作伙伴界面主图',
        'site_logo'=>'网站logo',

        'business_wechat'=>'合作商务微信号',
        'resume_contact'=>'简历投递地址及其备注',
        'site_code'=>'网站备案号',
        'slogan'=>'网站底部Slogan',

        'weibo_link'=>'微博地址',
        'qq_link'=>'qq地址',
        'weixi_qrcode_link'=>'微信二维码图片',
    ];

    /**
     * @var string[] 关于界面的设置
     */
    private $aboutPageSetting = [
            'partner_count'=>'1',
            'theme_count'=>'1',
            'artist_count'=>'1',
            'first_title'=>'品牌战略咨询',
            'first_desc'=>' 以“价值锚点就是超级策略”为核心的方法论，从「品牌策略定位」、「产品策略布局」、「品类重塑」、「创新视觉咨询」、「视觉策略传达」等多维矩阵为多家企业提供超级品牌增长策略。',
            'sec_title'=>'品牌超级体系构建',
            'sec_desc'=>'「品牌超级体系」是根据商业逻辑定制的思维模型，通过超级体系地图，建立与用户的沟通矩阵，顺应认知，占领消费者心智，为品牌落地而建立的新时代品牌理论体系。',
            'trd_title'=>'品牌新视觉打造',
            'image_1'=>'1.jpg',
            'image_2'=>'2.jpg',
            'trd_desc'=>'站在品牌经营角度全盘考虑，协助品牌更好的落地企业升级战略，以全新的形象和内容与消费者和经销商深度沟通，构建品类品牌，成为消费者心智中的涂料首选品牌，并向超级品牌的发展蓄势。',
            'content_title'=>'UPGO=品牌咨询公司+产品研发公司+品牌新视觉公司',
            'content_desc'=>'汤臣杰逊，是目前中国炙手可热的品牌策略及咨询机构，成名于南方，被公认为“不一样的品牌新策略，能决定品牌在用户心中的评价”！汤臣杰逊CEO刘威创立独特的「品牌超级体系」，从顶层设计、战略方向帮助品牌在市场中实现差异化定位，突围破局，荣获2021天猫食品品牌升级大奖。
汤臣杰逊生于互联网时代，至今已迈入第十个年头，作为新一代消费者和互联网消费时代的原住民，以更贴近和熟悉互联网消费格局和全新一代消费者的姿态，在大量实战中，不断调整优化与这个时代贴合的品牌策略方法论。'
    ];

    public function getFooterInfo() {
        $allSetting = $this->listWebSetting();
        $addressList = $this->listAllContactAddress(3);
        $service = $this->listHomeService(3);
        return array_merge($allSetting, ['addressList'=>$addressList, 'services'=>$service]);
    }

    public function listAllContactAddress($limit) {
        $query = DB::table('web_contact_address');

        if (!empty($limit) && $limit > 0) {
            $query->limit($limit);
        }
        $addressInfos = $query->get();
        $addressList = [];
        foreach ($addressInfos as $addressData) {
            $address = new ContactInfo();
            $address->titleName = $addressData->title_name;
            $address->titleHint = $addressData->title_hint;
            $address->detailAddress = $addressData->detail_address;
            $address->contactMobile = $addressData->contact_mobile;
            $address->contactChat = $addressData->contact_chat;
            $address->postCode = $addressData->post_code;
            $address->displayImage = $addressData->display_image;
            $addressList[] = $address;
        }
        return $addressList;
    }

    /**
     * 页脚需要的服务
     * @param $limit
     * @return array
     */
    public function listHomeService($limit) {
        $service = new ServiceService();

        $query = DB::table('web_service_page')
            ->where('display', 1);
        $serviceList = $query->orderBy('display_index')
            ->limit($limit)
            ->get();
        return $service->convertFromDb($serviceList);
    }


    /**
     * @return array|string[] 关于界面配置
     */
    public function listAboutPageSetting() {
        $setting = DB::table('web_about_page')->where('id', 1)->first();
        if (empty($setting)) {
            return $this->aboutPageSetting;
        } else {
            $result = [];
            foreach ($this->aboutPageSetting as $key=>$defaultValue) {
                if (empty($setting->$key)) {
                    $result[$key] = $defaultValue;
                } else {
                    $result[$key] = $setting->$key;
                }
            }
            return $result;
        }
    }

    /**
     * 获取设置名称
     * @param $code
     * @return string
     */
    public function getSiteSettingDesc($code) {

        return $this->webDefaultSetting[$code] ?? '';
    }

    /**
     * 获取网站配置
     * @return array
     */
    public function listWebSetting() {
        $setting = DB::table('web_site_setting')
            ->where('id', 1)
            ->first();
        if (empty($setting)) {
            $result = [];
            foreach ($this->webDefaultSetting as $key=>$value) {
                $result[$key] = '';
            }
            return $result;
        }
        return get_object_vars($setting);
    }
}