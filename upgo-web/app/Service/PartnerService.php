<?php

namespace App\Service;

use App\Models\PartnerInfo;
use Illuminate\Support\Facades\DB;

class PartnerService
{
    public function getPartnerForHomePage() {
        $result = [];

        $partners = DB::table('web_partner')
            ->where('display', 1)
            ->orderBy('display_index')
            ->limit(12)
            ->get();
        $index = 0;
        foreach ($partners as $pat) {
            $partner = new PartnerInfo();
            $partner->defaultCaseId = $pat->case_id;
            $partner->partnerName = $pat->partner_name;
            $partner->imageUrl = $pat->logo_url;
            $partner->displayIndex = $pat->display_index;
            $partner->index = $index;
            $partner->partnerSite = $pat->partner_site;
            $result[] = $partner;
            $index ++;
        }
        return $result;
    }

    /**
     * 分页获取
     * @param $page
     * @param $pageSize
     * @return array
     */
    public function listPartnerPage($page, $pageSize) {
        $result = [];
        $partners = DB::table('web_partner')
            ->where('display', 1)
            ->orderBy('display_index')
            ->orderBy('id', 'desc')
            ->offset(($page - 1) * $pageSize)
            ->limit($pageSize)
            ->get();

        $index = 0;
        foreach ($partners as $pat) {
            $partner = new PartnerInfo();
            $partner->defaultCaseId = $pat->case_id;
            $partner->partnerName = $pat->partner_name;
            $partner->imageUrl = $pat->logo_url;
            $partner->displayIndex = $pat->display_index;
            $partner->index = $index;
            $partner->partnerSite = $pat->partner_site;
            $result[] = $partner;
            $index ++;
        }
        return $result;
    }

    public function getTotalPartnerCount() {
        return DB::table('web_partner')->count();
    }

    /**
     * 重新排序
     * @param $currentId
     * @return void
     */
    public function reIndexCase($currentId, $newIndex) {
        $record = DB::table('web_partner')
            ->orderBy('display_index', 'asc')
            ->orderBy('updated_at', 'desc')
            ->select('id', 'display_index')
            ->get();

        foreach ($record as $index => $rec) {
            DB::table('web_partner')
                ->where('id', $rec->id)
                ->update(['display_index'=>$index + 1]);
        }
    }
}