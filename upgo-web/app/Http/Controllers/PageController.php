<?php

namespace App\Http\Controllers;

use App\Service\HomeService;
use App\Service\PageService;
use App\Service\ServiceService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param ServiceService $serviceService
     * @param $serviceId
     * @return void
     */
    public function webPageDetail(HomeService $homeService, PageService $pageService, $pageId) {
        if (empty($pageId)) {
            return redirect(forUrl('/home'));
        }
        $pageInfo = $pageService->getPageDetail($pageId);
        if (empty($pageInfo)) {
            return redirect(forUrl('/service'));
        }

        return view(forUrl('page'), array_merge($homeService->getFooterInfo(), ['pageInfo'=>$pageInfo]));
    }

}
