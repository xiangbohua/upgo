<?php

namespace App\Service;

use App\Models\PageDetailInfo;
use App\Models\PageInfo;
use App\Models\ServiceInfo;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class PageService
{
    public function getPageDetail($pageId) {
        $pageInfo = DB::table('web_page')->where('id', $pageId)->select('id','page_title', 'banner','sub_title', 'page_desc')->first();

        if (empty($pageInfo)) {
            return null;
        }

        $pageImages = DB::table('web_page_detail')
            ->where('page_id', $pageId)
            ->orderBy( 'display_index')
            ->select('detail_title', 'image_url', 'detail_desc', 'text_position', 'title_left_right', 'text_left_right')
            ->get();



        $detail = [];
        foreach ($pageImages as $d) {
            $od = new PageDetailInfo();
            $od->image_url = $d->image_url;
            $od->detail_title = $d->detail_title;
            $od->detail_desc = $d->detail_desc;
            $od->text_position = $d->text_position;
            $od->title_left_right = $this->getTextAlignText($d->title_left_right);
            $od->text_left_right = $this->getTextAlignText($d->text_left_right);
            $detail[] = $od;
        }

        $pageResult = new PageInfo();
        $pageResult->title = $pageInfo->page_title;
        $pageResult->subTitle = $pageInfo->sub_title;
        $pageResult->pageDesc = $pageInfo->page_desc;
        $pageResult->banner = $pageInfo->banner;
        $pageResult->details = $detail;
        return $pageResult;
    }

    /**
     * css 文本
     * @param $settingValue
     * @return string
     */
    private function getTextAlignText($settingValue) {

        if (empty($settingValue)) {
            return 'left';
        }
        $setting = [0=>'left', 1=>'center', 2=>'right'];

        if (isset($setting[$settingValue])) {
            return $setting[$settingValue];
        }

        return $setting[0];//默认left
    }
}
