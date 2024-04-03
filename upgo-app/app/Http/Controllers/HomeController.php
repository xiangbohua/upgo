<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home() {
        $caseCategory = [['url'=>'123', 'name'=>'分类1'],['url'=>'1233','name'=>'分类3'],];


        return view('home', ['homePageImage'=>['123','456'], 'caseCategory'=>$caseCategory]);
    }

}
