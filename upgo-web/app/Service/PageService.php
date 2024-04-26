<?php

namespace App\Service;

use App\Models\PageInfo;
use App\Models\ServiceInfo;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class PageService
{
    public function getPageDetail($pageId) {
        $pageInfo = DB::table('web_page')->where('id', $pageId)->select('id','page_title', 'page_desc')->first();

        if (empty($pageInfo)) {
            return null;
        }

        $pageImages = DB::table('web_page_detail')
            ->where('page_id', $pageId)
            ->orderBy('display_index')
            ->get('image_url');

        $images = [];
        foreach ($pageImages as $d) {
            $images[] = $d->image_url;
        }

        $pageResult = new PageInfo();
        $pageResult->title = $pageInfo->page_title;
        $pageResult->pageDesc = $pageInfo->page_desc;
        $pageResult->images = $images;
        return $pageResult;
    }
}
