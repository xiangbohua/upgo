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


    /**
     * 关于界面
     * @param HomeService $homeService
     * @param PartnerService $partnerService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutPage(HomeService $homeService,
            PartnerService $partnerService) {
        $footerInfo = $homeService->getFooterInfo();

        $aboutPageSetting = $homeService->listAboutPageSetting();
        return view('about', array_merge($footerInfo, $aboutPageSetting));
    }


    /**
     * 合作伙伴界面
     * @param HomeService $homeService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function partnerPage(HomeService $homeService,
                                PartnerService $partnerService,
                                $page = 1) {
        $footerInfo = $homeService->getFooterInfo();
        $partnerCount = $partnerService->getTotalPartnerCount();

        $result = [
            'partnerList'=>$partnerService->listPartnerPage($page, $this->defaultPageSize),
            'totalPage'=>hTotalPage($partnerCount, $this->defaultPageSize),
            'current'=>$page
        ];
        return view('partner', array_merge($footerInfo, $result));
    }

    /**
     * 联系界面
     * @param HomeService $homeService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactPage(HomeService $homeService) {
        $footerInfo = $homeService->getFooterInfo();
        $webSetting = $homeService->listWebSetting();
        $result = [
            'addressList'=>$homeService->listAllContactAddress(0)
        ];

        return view('contact', array_merge($footerInfo, $webSetting, $result));
    }

    public function searchCase(HomeService $homeService,
    CaseService $caseService, $keyWork) {
        $footerInfo = $homeService->getFooterInfo();

        $caseList = $caseService->searchCase($keyWork);
        $result = [
            'searchResult'=>$caseList,
            'keyWord'=>$keyWork
        ];
        return view('search', array_merge($footerInfo, $result));
    }

}
