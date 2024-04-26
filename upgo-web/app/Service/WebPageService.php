<?php

namespace App\Service;

use App\Models\ContactInfo;
use Illuminate\Support\Facades\DB;

class WebPageService
{
   public function getPageTitle($pageId) {
       $title = DB::table('web_page')->where('id', $pageId)->value('page_title');
       if (empty($title)) {
           return '';
       }
       return $title;
   }

   public function listAllPage() {
       $pages = DB::table('web_page')->select('id', 'page_title')->get();
       $result = [];
       foreach ($pages as $page) {
           $result[$page->id] = $page->page_title;
       }
       return $result;
   }
}
