<?php

namespace App\Service;

use App\Models\CaseInfo;
use App\Models\CategoryInfo;
use Illuminate\Support\Facades\DB;

class CaseService
{
    public function getDefaultCase() {
        $cases = DB::table('web_case_page')
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

    /**
     * 通过id获取案例名称
     * @param $caseId
     * @return mixed|string
     */
    public function getCaseNameById($caseId) {
        $name = DB::table('web_case_page')->where('id', $caseId)->value('title');
        return empty($name) ? '' : $name;
    }

    /**
     * 通过id获取案例名称
     * @param $caseId
     * @return mixed|string
     */
    public function getCaseFullNameById($caseId) {
        $nameInfo = DB::table('web_case_page')
            ->where('id', $caseId)
            ->select('title', 'sub_title')
            ->first();
        return empty($nameInfo) ? '' : ($nameInfo->title.'-'.$nameInfo->sub_title);
    }

    /**
     * 通过id获取案例名称
     * @param $caseId
     * @return mixed|string
     */
    public function listForDropDown() {
        $nameInfo = DB::table('web_case_page')
            ->select('id', 'title', 'sub_title')
            ->get();

        $result = [];
        foreach ($nameInfo as $c) {
            $result[$c->id] = $c->title .'-'.$c->sub_title;
        }

        return $result;
    }

    public function listCaseCount($cateId) {
        $query = DB::table('web_case_page')
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

    /**
     * 获取详情
     * @param $caeId
     * @return array|null
     */
    public function getCaseDetail($caeId) {
        $caseInfo = DB::table('web_case_page')->where('id', $caeId)->select('id','title', 'sub_title')->first();

        if (empty($caseInfo)) {
            return null;
        }

        $caseDetail = DB::table('web_case_page_item')
            ->where('case_id', $caeId)
            ->orderBy('display_index')
            ->get('image_url');

        $images = [];
        foreach ($caseDetail as $d) {
            $images[] = $d->image_url;
        }

        return [
            'caseInfo'=>$caseInfo,
            'images'=>$images
        ];
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