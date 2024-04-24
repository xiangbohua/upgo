@include('common.mobile.head', ['page_title'=>'案例'])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div class="content">
                <div class="mlist project module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container">
                        <div class="container_header wow">
                            <p class="title">CASE</p>
                        </div>
                        <div class="container_category wow">
                            <a href="{{hCategoryPage(0)}}" class="active"><span>全部</span></a>
                            @foreach ($cateList as $cateInfo)
                                <a href="{{hCategoryPage($cateInfo->categoryId)}}"><span>{{$cateInfo->cateName}}</span></a>
                            @endforeach
                        </div>
                        <div class="container_content">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($caseList as $index => $oneCase)
                                        <li id="item_block_$index" class="item_block col-50">
                                            <div class="content">
                                                <a  href="{{hCaseDetailPage($oneCase->caseInfoId)}}" target="_self">
                                                    <div class="item_img" style="background-image:url({{hUrlImage($oneCase->imageUrl)}})">
                                                        <img src="{{hUrlImage($oneCase->imageUrl)}}" width="800" height="650"/>
                                                    </div>
                                                    <div class="item_wrapper">
                                                        <a class="title ellipsis" >{{$oneCase->title}}</a>
                                                        <p class="subtitle ellipsis"></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="" class="more hide">查看更多</a>
                            </div><!--wrapper-->
                            <div class="clear"></div>
                            <div id="pages">
                                @if($current > 1)
                                    <a class="prev" href="{{hCategoryPage($currentCategory, $current - 1)}}">&nbsp;<i class="fa fa-angle-left"></i></a>
                                @endif
                                @for($pageIndex = 1; $pageIndex <= $totalPage; $pageIndex ++)
                                    <a @if($current != $pageIndex) href="{{hCategoryPage($currentCategory, $pageIndex)}}" @endif @if($pageIndex == $current) class="active" @endif>{{$pageIndex}}</a>
                                @endfor
                                @if($totalPage > 1 && $current < $totalPage)
                                    <a class="next" {{ $currentCategory }} href="{{hCategoryPage($currentCategory, $current + 1)}}">&nbsp;<i class="fa fa-angle-right"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div><!--mlist-->
                <div class="clear"></div>
                <!--projectlist-->
            </div>
        </div><!--npagePage list-->
        <!--page-->
        @include('common.mobile.footer')
    </div>
    <div id="bgmask"></div>
</div>
<div class="hide"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>