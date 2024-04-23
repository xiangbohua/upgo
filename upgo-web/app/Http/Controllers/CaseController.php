<?php

namespace App\Http\Controllers;

use App\Service\CaseService;
use App\Service\CategoryService;
use App\Service\HomeService;
use App\Service\ServiceService;
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

//        var_dump('当前第'.$page.'页，分类是'.$cateId);
        $cateList = $categoryService->getDefaultCategory();

        //TODO
        $result = array_merge($homeService->getFooterInfo(),
                [
                    'caseList'=>$caseList,
                    'cateList'=>$cateList,
                    'currentCategory'=>$cateId,
                    'totalPage'=>hTotalPage($caseCount, $this->defaultPageSize),
                    'current'=>$page,
                    'size'=>$this->defaultPageSize
                ]);

        return view(forUrl('cases'), $result);
    }

    /**
     * @param ServiceService $serviceService
     * @param $serviceId
     * @return void
     */
    public function caseDetail(HomeService $homeService, CaseService $caseService, $caseId) {
        if (empty($caseId)) {
            return redirect(forUrl('/case'));
        }
        $caseInfo = $caseService->getCaseDetail($caseId);
        if (empty($caseInfo)) {
            return redirect(forUrl('/case'));
        }

        return view(forUrl('case_detail'), array_merge($homeService->getFooterInfo(), $caseInfo));
    }

}