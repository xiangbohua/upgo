<?php

namespace App\Service;

use App\Models\BannerInfo;
use Illuminate\Support\Facades\DB;

class BannerService
{
    public function getBanners() {
        $result = [];
        $banners = DB::table('web_home_banner')
            ->where('display', 1)
            ->select(['title', 'case_id', 'image_url', 'display_index'])
            ->orderBy('display_index')
            ->limit(7)
            ->get();

        foreach ($banners as $bannerInfo) {
            $homeCase = new BannerInfo();
            $homeCase->caseInfoId = $bannerInfo->case_id;
            $homeCase->displayIndex = $bannerInfo->display_index;
            $homeCase->imageUrl = $bannerInfo->image_url;
            $homeCase->title = $bannerInfo->title;
            $homeCase->onlyImage = $bannerInfo->case_id <= 0;
            $result[] = $homeCase;
        }
        return $result;
    }
}