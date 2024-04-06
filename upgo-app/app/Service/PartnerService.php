<?php

namespace App\Service;

use App\Models\PartnerInfo;
use Illuminate\Support\Facades\DB;

class PartnerService
{
    public function getPartnerForHomePage() {
        $result = [];

        $partners = DB::table('partner')
            ->where('deleted', 0)
            ->where('display', 1)
            ->orderBy('display_index')
            ->limit(8)
            ->get();
        $index = 0;
        foreach ($partners as $pat) {
            $partner = new PartnerInfo();
            $partner->defaultCaseId = $pat->case_id;
            $partner->partnerName = $pat->partner_name;
            $partner->imageUrl = $pat->logo_url;
            $partner->displayIndex = $pat->display_index;
            $partner->index = $index;
            $result[] = $partner;
            $index ++;
        }
        return $result;
    }
}