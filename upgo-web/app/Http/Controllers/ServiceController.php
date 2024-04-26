<?php

namespace App\Http\Controllers;

use App\Service\HomeService;
use App\Service\ServiceService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ServiceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listAllService(HomeService $homeService, ServiceService $service, $page = 1) {
        $size = 9;

        $allService = $service->getServiceByPage($page, $size);
        $total = $service->getTotalService();

        //3个一排
//        $serviceArray = collect($allService)->chunk(3);

        //TODO
        $result = array_merge($homeService->getFooterInfo(),
            [
                'serviceList'=>$allService,
                'totalPage'=>hTotalPage($total, $size),
                'current'=>$page,
                'size'=>$size
            ]);
        return view(forUrl('service'), $result);
    }

    /**
     * @param ServiceService $serviceService
     * @param $serviceId
     * @return void
     */
    public function serviceDetail(HomeService $homeService, ServiceService $serviceService, $serviceId) {
        if (empty($serviceId)) {
            return redirect(forUrl('/service'));
        }
        $serviceInfo = $serviceService->getServiceDetail($serviceId);
        if (empty($serviceInfo)) {
            return redirect(forUrl('/service'));
        }

        return view(forUrl('services'), array_merge($homeService->getFooterInfo(), $serviceInfo));
    }

}