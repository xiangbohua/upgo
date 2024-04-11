<?php

namespace App\Service;

use App\Models\ServiceInfo;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class ServiceService
{
    public function getServiceByPage($page, $pageSize) {
        $page = !isset($page) || $page <= 0 ? 1 : $page;

        $query = DB::table('web_service_page')
            ->where('is_deleted', 0)
            ->where('display', 1);

        $service = $query->orderBy('display_index')
            ->orderBy('id', 'desc')
            ->offset(($page - 1) * $pageSize)
            ->limit($pageSize)
            ->get();

        return $this->convertFromDb($service);
    }

    public function getTotalService() {
        return DB::table('web_service_page')
            ->where('is_deleted', 0)
            ->where('display', 1)
            ->count();
    }

    public function convertFromDb($services) {
        $result = [];
        foreach ($services as $ser) {
            $s = new ServiceInfo();
            $s->imageUrl = $ser->image_url;
            $s->serviceId = $ser->id;
            $s->title = $ser->title;
            $s->subTitle = $ser->sub_title;
            $result[] =$s;
        }
        return $result;
    }

}