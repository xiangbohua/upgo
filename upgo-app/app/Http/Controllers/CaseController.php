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
                                       $cateId = 0, $page = 1) {
        $caseList = $caseService->getCasesByCateId($cateId, $page, $this->defaultPageSize);
        $caseCount = $caseService->listCaseCount($cateId);

        $cateList = $categoryService->getDefaultCategory();

        //TODO
        $bannerImage = 'localhost';
        $result = array_merge($homeService->getFooterInfo(),
                [
                    'caseList'=>$caseList,
                    'cateList'=>$cateList,
                    'bannerImage'=>$bannerImage,
                    'currentCategory'=>$cateId,
                    'totalPage'=>hTotalPage($caseCount, $this->defaultPageSize),
                    'current'=>$page,
                    'size'=>$this->defaultPageSize
                ]);
        return view('cases', $result);
    }

}