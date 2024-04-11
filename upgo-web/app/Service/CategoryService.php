<?php

namespace App\Service;

use App\Models\CategoryInfo;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function getDefaultCategory() {
        $result = [];
        $categorys = DB::table('web_category')
            ->where('is_deleted', 0)
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

    public function getDropList() {
        $result = [];
        $categorys = DB::table('web_category')
            ->where('is_deleted', 0)
            ->where('display', 1)
            ->select(['id', 'cate_name'])
            ->get();
        foreach ($categorys as $cate) {
            $result[$cate->id] = $cate->cate_name;
        }
        return $result;
    }

}