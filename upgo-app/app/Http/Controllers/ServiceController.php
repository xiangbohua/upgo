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
        $bannerImage = 'localhost';
        $result = array_merge($homeService->getFooterInfo(),
            [
                'serviceList'=>$allService,
                'bannerImage'=>$bannerImage,
                'totalPage'=>hTotalPage($total, $size),
                'current'=>$page,
                'size'=>$size
            ]);
        return view('service', $result);
    }

}