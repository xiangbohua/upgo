@include('common.mobile.head', ['page_title'=>'首页'])

@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div id="indexPage">
            <!--slider-->
            <div id="topSlider" class="mslider module">
                <div class="module_container wide">
                    <ul class="content_list" data-slider-height="0" data-slider-auto="1" data-slider-mode="0" data-slider-pause="4" data-slider-ease="ease-out" data-slider-speed="0.5" style="height:0px">
                        @foreach ($homePageInfo->bannerList as $banner)
                            <li >
                                <div class="item_bg image" data-thumb="" style="background-image:url({{hUrlImage($banner->imageUrl)}})">
                                    <img src="{{hUrlImage($banner->imageUrl)}}" />
                                </div>
                                @if(!$banner->onlyImage)
                                    <a href="{{hCaseDetailPage($banner->caseInfoId)}}"></a>
                                @endif

                                <div class="wrapper">
                                    <div class="description mc">
                                        <p class="title ellipsis"></p>
                                        <p class="subtitle"></p>
                                        @if(!$banner->onlyImage)
                                            <a class="more white" href="{{hCaseDetailPage($banner->caseInfoId)}}">More</a>
                                        @endif

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="sliderArrow fa fa-angle-down"></div>
                </div>
            </div>
            <div class="mcounter module" style=" background-color:#FFFFFF;">
                <div class="bgmask"></div>
                <div class="module_container wide">
                    <div class="container_content">
                        <ul class="content_list row">
                            <li class="col-25">
                                <div>
                                    <p class="number"><span class="counterDX" data-counter-value="3">3</span><span class="unit">年</span></p>
                                    <p class="title">3年间</p>
                                </div>
                            </li>
                            <li class="col-25">
                                <div>
                                    <p class="number"><span class="counterDX" data-counter-value="23">23</span><span class="unit">+</span></p>
                                    <p class="title">助23个品牌</p>
                                </div>
                            </li>
                            <li class="col-25">
                                <div>
                                    <p class="number"><span class="counterDX" data-counter-value="3">3</span><span class="unit"></span></p>
                                    <p class="title">占据类目前3</p>
                                </div>
                            </li>
                            <li class="col-25">
                                <div>
                                    <p class="number"><span class="counterDX" data-counter-value="126">126</span><span class="unit">亿</span></p>
                                    <p class="title">提升126亿销售</p>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div><!--counter-->
            <div class="mlist project module" style="">
                <div class="bgmask"></div>
                <div class="module_container wide">
                    <div class="container_header wow">
                        <p class="title">Brand New Strategy</p>
                    </div>
                    <div class="container_category wow">
                        @foreach ($homePageInfo->categoryList as $cateInfo)
                            <a href="{{hCategoryPage($cateInfo->categoryId)}}"><span>{{$cateInfo->cateName}}</span></a>
                        @endforeach
                    </div>
                    <div class="container_content">
                        <div class="content_wrapper">
                            <ul class="content_list row gutter">
                                @foreach($homePageInfo->defaultCaseList as $key=> $case)
                                    <li id="item_block_{{$key}}" class="item_block col-50">
                                        <div class="content">
                                            <a  href="{{hCaseDetailPage($case->caseInfoId)}}" target="_self">
                                                <div class="item_img" style="background-image:url({{hUrlImage($case->imageUrl)}})">
                                                    <img src="{{hUrlImage($case->imageUrl)}}" width="800" height="650"/>
                                                </div>
                                                <div class="item_wrapper">
                                                    <a class="title ellipsis" >{{$case->title}}</a>
                                                    <p class="subtitle ellipsis"></p>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="case/cate/0/page/0" class="more hide">查看更多</a>
                        </div><!--wrapper-->
                        <div class="clear"></div>
                        <a href="case/cate/0/page/0" class="more wow hide">MORE<i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!--mlist-->
            <div class="mlist imagelink module" style=" background-color:#FFFFFF;">
                <div class="bgmask"></div>
                <div class="module_container">
                    <div class="container_category wow one hide">
                        <a href="partner" class="active"><span>全部</span></a>
                    </div>
                    <div class="container_content">
                        <div class="content_wrapper">
                            <ul class="content_list row gutter">
                                @foreach($homePageInfo->partnerList as $key=>$partnerInfo)
                                    <li id="item_block_{{$key}}" class="item_block col-50">
                                        <div class="content">
                                            <a href="{{hCaseDetailPage($partnerInfo->defaultCaseId)}}" class="item_img" target="_blank" title="{{$partnerInfo->partnerName}}" style="background-image:url({{hUrlImage($partnerInfo->imageUrl)}})">
                                                <img src="{{hUrlImage($partnerInfo->imageUrl)}}" width="225" height="110"/>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <a href="partner" class="more hide">查看更多</a>
                        </div><!--wrapper-->
                        <div class="clear"></div>
                        <a href="partner" class="more wow hide">MORE<i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!--mlist-->
        </div><!--index-->
        <!--page-->
        @include('common.mobile.footer')
    </div>
    <div id="bgmask"></div>
</div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
