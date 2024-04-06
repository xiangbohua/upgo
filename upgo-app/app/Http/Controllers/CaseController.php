<?php

namespace App\Http\Controllers;

use App\Service\CaseService;
use App\Service\CategoryService;
use App\Service\HomeService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listCaseByCategory(CaseService $caseService,
                                       CategoryService $categoryService,
                                       HomeService $homeService,
                                       $cateId, $page) {
        $caseList = $caseService->getCasesByCateId($cateId, $page);

        $cateList = $categoryService->getDefaultCategory();

        $bannerImage = 'localhost';


        $result = array_merge($homeService->getFooterInfo(),
            ['caseList'=>$caseList, 'cateList'=>$cateList, 'bannerImage'=>$bannerImage]);
        return view('cases', $result);
    }

}