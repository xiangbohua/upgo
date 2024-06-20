<?php

namespace App\Service;

use App\Models\CategoryInfo;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function getDefaultCategory() {
        $result = [];
        $categorys = DB::table('web_category')
            ->where('display', 1)
            ->select(['id', 'cate_name'])
            ->orderBy('display_index')
            ->limit(8)
            ->get();

        foreach ($categorys as $cate) {
            $categoryInfo = new CategoryInfo();
            $categoryInfo->cateName = $cate->cate_name;
            $categoryInfo->categoryId = $cate->id;
            $result[] = $categoryInfo;
        }
        return $result;
    }

    public function getDropList($withAll = false, $showAll) {
        $result = [];
        if ($withAll) {
            $result[0] = '全部';
        }
        $categorysQuery = DB::table('web_category')

            ->select(['id', 'cate_name']);
        if (!$showAll) {
            $categorysQuery->where('display', 1);
        }
        $categorys = $categorysQuery->get();
        foreach ($categorys as $cate) {
            $result[$cate->id] = $cate->cate_name;
        }
        return $result;
    }

    /**
     * 重新排序
     * @param $currentId
     * @return void
     */
    public function reIndexCase($currentId, $newIndex) {
        $record = DB::table('web_category')
            ->orderBy('display_index', 'asc')
            ->orderBy('updated_at', 'desc')
            ->select('id', 'display_index')
            ->get();

        foreach ($record as $index => $rec) {
            DB::table('web_category')
                ->where('id', $rec->id)
                ->update(['display_index'=>$index + 1]);
        }
    }

}