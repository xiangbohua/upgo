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
                                       $cateId, $page = 1) {
        $caseList = $caseService->getCasesByCateId($cateId, $page);
        $cseCount = $caseService->listCaseCount($cateId);

        $cateList = $categoryService->getDefaultCategory();

        $bannerImage = 'localhost';


        $result = array_merge($homeService->getFooterInfo(),
                [
                    'caseList'=>$caseList,
                    'cateList'=>$cateList,
                    'bannerImage'=>$bannerImage,
                    'total'=>$cseCount,
                    'current'=>$page,
                    'size'=>$this->defaultPageSize
                ]);
        return view('cases', $result);
    }

}