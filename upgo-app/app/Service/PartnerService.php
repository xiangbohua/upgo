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

        foreach ($partners as $pat) {
            $partner = new PartnerInfo();
            $partner->defaultCaseId = $pat->case_id;
            $partner->imageUrl = $pat->logo_url;
            $partner->displayIndex = $pat->display_index;
            $result[] = $partner;
        }
        return $result;
    }
}