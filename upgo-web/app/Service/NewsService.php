<?php

namespace App\Service;

use App\Models\ContactInfo;
use App\Models\NewsInfo;
use Illuminate\Support\Facades\DB;

class NewsService
{
    /**
     * 分页获取
     * @param $page
     * @param $pageSize
     * @return mixed
     */
    public function getNewsByPage($page, $pageSize) {
        $page = !isset($page) || $page <= 0 ? 1 : $page;

        $query = DB::table('web_news as n')
            ->join('web_page as p', 'p.id', '=', 'n.page_id')
            ->select('p.page_title', 'p.sub_title', 'p.page_desc', 'n.page_id', 'p.banner', 'n.created_at')
            ->where('n.display', 1);

        $news = $query->orderBy('n.created_at', 'desc')
            ->offset(($page - 1) * $pageSize)
            ->limit($pageSize)
            ->get();

        return $this->convertFromDb($news);
    }

    public function getTotalNews() {
        return DB::table('web_news')->where('display', 1)->count();
    }

    public function convertFromDb($data) {
        $result = [];
        foreach ($data as $dbItem) {
            $r = new NewsInfo();
            $r->title = $dbItem->page_title;
            $r->subTitle = $dbItem->sub_title;
            $r->pageDesc = $dbItem->page_desc;
            $r->pageId = $dbItem->page_id;
            $r->banner = $dbItem->banner;
            $r->date= hFormatTime($dbItem->created_at, 'm-d');
            $r->year = hFormatTime($dbItem->created_at, 'Y');
            $result[] = $r;
        }
        return $result;
    }
}
