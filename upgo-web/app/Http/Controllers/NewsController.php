<?php

namespace App\Http\Controllers;

use App\Service\HomeService;
use App\Service\NewsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class NewsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listNews(HomeService $homeService, NewsService $newsService, $page = 1) {
        $size = 12;

        $allNews = $newsService->getNewsByPage($page, $size);
        $total = $newsService->getTotalNews();
        //3个一排
//        $serviceArray = collect($allService)->chunk(3);

        //TODO
        $result = array_merge($homeService->getFooterInfo(),
            [
                'newsList'=>$allNews,
                'totalPage'=>hTotalPage($total, $size),
                'current'=>$page,
                'size'=>$size
            ]);

        return view(forUrl('news'), $result);
    }


}