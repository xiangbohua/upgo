<?php

namespace App\Service;

use App\Models\CaseInfo;
use App\Models\CategoryInfo;
use Illuminate\Support\Facades\DB;

class CaseService
{
    public function getDefaultCase() {
        $cases = DB::table('web_case_page')
            ->where('is_deleted', 0)
            ->where('display', 1)
            ->where('home_page_display', 1)
            ->orderBy('display_index')
            ->limit(8)
            ->get();


        return $this->convertFromDb($cases);
    }

    public function getCasesByCateId($cateId, $page, $pageSize) {
        $page = !isset($page) || $page <= 0 ? 1 : $page;

        $query = DB::table('web_case_page')
            ->where('is_deleted', 0)
            ->where('display', 1)
            ->where('home_page_display', 1);
        if (isset($cateId) && !is_null($cateId) && $cateId > 0) {
            $query->where('category_id', $cateId);
        }

        $cases = $query->orderBy('display_index')
            ->orderBy('id', 'desc')
            ->offset(($page - 1) * $pageSize)
            ->limit($pageSize)
            ->get();

        return $this->convertFromDb($cases);
    }

    public function listCaseCount($cateId) {
        $query = DB::table('web_case_page')
                ->where('is_deleted', 0)
                ->where('display', 1)
                ->where('home_page_display', 1);

        if (isset($cateId) && !is_null($cateId) && $cateId > 0) {
            $query->where('category_id', $cateId);
        }
        return $query->count();
    }

    /**
     * @param $keyWork
     * @return array|\Illuminate\Support\Collection
     */
    public function searchCase($keyWork) {
        if (empty($keyWork)) {
            return [];
        }
        $result = DB::table('web_case_page')
            ->where('title', 'like', '%'.$keyWork.'%')
            ->orWhere('sub_title', 'like', '%'.$keyWork.'%')
            ->select('id', 'title')
            ->orderBy('id', 'desc')
            ->limit(100)
            ->get();
        return $result;
    }

    private function convertFromDb($dbData) {
        $result = [];
        foreach ($dbData as $ca) {
            $caseInfo = new CaseInfo();
            $caseInfo->caseInfoId = $ca->id;
            $caseInfo->imageUrl = $ca->main_image_url;
            $caseInfo->categoryId = $ca->category_id;
            $caseInfo->title = $ca->title;
            $caseInfo->subTitle = $ca->sub_title;
            $caseInfo->displayIndex = $ca->display_index;
            $result[] = $caseInfo;
        }
        return $result;
    }

}