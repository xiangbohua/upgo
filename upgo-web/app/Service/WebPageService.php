<?php

namespace App\Service;

use App\Models\ContactInfo;
use Illuminate\Support\Facades\DB;

class WebPageService
{
   public function getPageTitle($pageId) {
       $title = DB::table('web_page')->where('id', $pageId)->value('page_name');
       if (empty($title)) {
           return '';
       }
       return $title;
   }

   public function listAllPage($pageType = 2) {
       $query = DB::table('web_page')->select('id', 'page_name');
        if (!empty($pageType)) {
            $query->where('page_type', $pageType);
        }
       $pages = $query->get();
       $result = [];
       foreach ($pages as $page) {
           $result[$page->id] = $page->page_name;
       }
       return $result;
   }
}
