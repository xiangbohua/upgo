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
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home(BannerService $bannerService,
                        CategoryService $categoryService,
                        CaseService $caseService,
                        PartnerService $partnerService
                        ) {
        echo env('DB_HOST');
        $homePageInfo = new HomePageInfo();
        $homePageInfo->categoryList = $categoryService->getDefaultCategory();
        $homePageInfo->bannerList = $bannerService->getBanners();
        $homePageInfo->partnerList = $partnerService->getPartnerForHomePage();
        $homePageInfo->defaultCaseList = $caseService->getDefaultCase();

        return view('home', ['homePageInfo'=>$homePageInfo]);
    }

}
