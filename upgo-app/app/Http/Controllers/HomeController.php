<?php

namespace App\Http\Controllers;

use App\Models\BannerInfo;
use App\Models\CaseInfo;
use App\Models\CategoryInfo;
use App\Models\HomePageInfo;
use App\Service\BannerService;
use App\Service\CaseService;
use App\Service\CategoryService;
use App\Service\HomeService;
use App\Service\PartnerService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home(BannerService $bannerService,
                        CategoryService $categoryService,
                        CaseService $caseService,
                        PartnerService $partnerService,
                         HomeService $homeService
                        ) {
        $homePageInfo = new HomePageInfo();
        $homePageInfo->categoryList = $categoryService->getDefaultCategory();
        $homePageInfo->bannerList = $bannerService->getBanners();
        $homePageInfo->partnerList = $partnerService->getPartnerForHomePage();
        $homePageInfo->defaultCaseList = $caseService->getDefaultCase();

        $result = array_merge($homeService->getFooterInfo(), ['homePageInfo'=>$homePageInfo]);


        return view('home', $result);
    }



    public function aboutPage(HomeService $homeService) {
        $footerInfo = $homeService->getFooterInfo();
        $footerInfo = array_merge($footerInfo, []);
        return view('about', $footerInfo);
    }



}
