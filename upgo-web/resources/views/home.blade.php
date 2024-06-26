@include('common.head', ['page_title'=>'首页'])
<body class="child"><!--wrapper 整体宽度 container-->
    <div id="siteWrapper">
        @include('common.navi')
        <div id="sitecontent">
            <!--page-->
            <div id="indexPage">
                <!--slider-->
                <div id="topSlider" class="mslider module" style="height: 835px;">
                    <div class="module_container wide">
                        <div class="bx-wrapper" style="max-width: 100%;">
                            <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 835px;">

                                <ul id = "swiper_content_list" class="content_list" current-display-index="0" data-slider-height="0" data-slider-auto="1" data-slider-mode="0"
                                    data-slider-pause="4" data-slider-ease="ease-out" data-slider-speed="0.5"
                                    style="height: 835px; width: 915%; position: relative;
                                    transition-timing-function: ease-out; transition-duration: 0.5s; transform: translate3d(0px, 0px, 0px);">

                                    @foreach ($homePageInfo->bannerList as $banner)
                                        <li style="height: 835px; float: left; list-style: none; position: relative; width: 100%;" class="bx-clone">
                                            <div class="item_bg image" data-thumb="" style="background-image:url({{hUrlImage($banner->imageUrl)}})">
                                                <img src="{{hUrlImage($banner->imageUrl)}}">
                                            </div>
                                            <div class="wrapper">
                                                <div class="description mc">
                                                    <p class="title ellipsis"></p>
                                                    <p class="subtitle"></p>
                                                </div>
                                            </div>
                                            @if(!$banner->onlyImage)
                                                <a href="{{hCaseDetailPage($banner->caseInfoId)}}}" class="full" target="_blank"></a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="bx-controls bx-has-pager bx-has-controls-direction">
                                <div class="bx-pager bx-custom-pager">
                                    @foreach ($homePageInfo->bannerList as $key=>$banner)
                                        <div class="bx-pager-item">
                                            <a href="" id="mask-cover-{{$key}}" data-slide-index="{{$key}}" onclick="return false" class="bx-pager-link">
                                                <div class="progress" data-slide-index="{{$key}}">
                                                    <div class="mask auto" progress-mask="{{$key}}"  data-slide-index="{{$key}}" style="">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="bx-controls-direction">
                                    <a class="bx-prev"  >
                                        <i id="left-button" class="fa fa-angle-left" style="cursor: pointer"></i>
                                    </a>
                                    <a id ="right-button" onclick="return false;" class="bx-next" style="cursor: pointer">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="sliderArrow fa fa-angle-down">
                        </div>
                    </div>
                </div>
                @if (!empty($show_numbers))
                    <div class="mcounter module" style=" background-color:#FFFFFF;">
                        <div class="bgmask"></div>
                        <div class="module_container wide">
                            <div class="container_content">
                                <ul class="content_list row">
                                    <li class="col-25">
                                        <div>
                                            <p class="number"><span class="counterDX" data-counter-value="3">{{$for_years}}</span><span class="unit">年</span></p>
                                            <p class="title">{{$for_years}}年间</p>
                                        </div>
                                    </li>
                                    <li class="col-25">
                                        <div>
                                            <p class="number"><span class="counterDX" data-counter-value="23">{{$help_brands}}</span><span class="unit">+</span></p>
                                            <p class="title">助{{$help_brands}}个品牌</p>
                                        </div>
                                    </li>
                                    <li class="col-25">
                                        <div>
                                            <p class="number"><span class="counterDX" data-counter-value="3">{{$category_beyond}}</span><span class="unit"></span></p>
                                            <p class="title">占据类目前{{$category_beyond}}</p>
                                        </div>
                                    </li>
                                    <li class="col-25">
                                        <div>
                                            <p class="number"><span class="counterDX" data-counter-value="126">{{$sale_amounts}}</span><span class="unit">亿</span></p>
                                            <p class="title">提升{{$sale_amounts}}亿销售</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mcounter module" style=" background-color:#FFFFFF;">
                    <div class="bgmask"></div>
                </div><!--counter-->
                <div class="mlist project module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container wide">
                        <div class="container_hc">
                            <div class="container_header wow">
                                <p class="title">Brand New Strategy</p>
                            </div>
                            <div class="container_category wow">
                                <a href="{{hCategoryPage(0)}}"><span>全部</span></a>
                                @foreach ($homePageInfo->categoryList as $cateInfo)
                                    <a href="{{hCategoryPage($cateInfo->categoryId)}}"><span>{{$cateInfo->cateName}}</span></a>
                                @endforeach
                            </div>
                        </div>
                        <div class="container_content">
                            <div class="content_wrapper">
                                <ul class="content_list row gutter">
                                    @foreach($homePageInfo->defaultCaseList as $case)
                                        <li id="item_block_0" class="item_block col-50 wow" style="animation-delay:.0s">
                                            <div class="content">
                                                <a href="{{hCaseDetailPage($case->caseInfoId)}}" target="_blank">
                                                    <div class="item_img"
                                                         style="background-image:url({{hUrlImage($case->imageUrl)}})">
                                                        <img src="{{hUrlImage($case->imageUrl)}}"/>
                                                        <div class="item_img_mask"></div>
                                                        <div class="item_icon">
                                                            <div class="PostImage">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                                <div class="item_icon_bg"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item_wrapper">
                                                        <p class="title ellipsis" target="_blank">{{$case->title}}</p>
                                                        <p class="subtitle ellipsis"></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="forum/id/10542/index.html" class="more hide wow"
                                   style="animation-delay:.5s">查看更多</a>
                            </div><!--wrapper-->
                            <div class="clear"></div>
                            <a href="forum/id/10542/index.html" class="more wow hide">MORE<i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div><!--mlist-->
                @if (!empty($show_partner))
                    <div class="mlist imagelink module" style=" background-color:#FFFFFF;">
                        <div class="bgmask"></div>
                        <div class="module_container">
                            <div class="container_hc">
                                <div class="container_category wow one hide">
                                    <a href="/page/partner" class="active"><span>全部</span></a>
                                </div>
                            </div>
                            <div class="container_content">
                                <div class="content_wrapper">
                                    <ul class="content_list row gutter">
                                        @foreach($homePageInfo->partnerList as $partnerInfo)
                                            <li id="item_block_{{$partnerInfo->index}}" class="item_block col-16 wow"
                                                style="animation-delay:.0s">
                                                <div class="content">
                                                    @if(!empty($partnerInfo->partnerSite))
                                                        <a href="{{$partnerInfo->partnerSite}}" class="item_img"
                                                           target="_blank"
                                                           title="{{hUrlImage($partnerInfo->partnerName)}}"
                                                           style="background-image:url({{hUrlImage($partnerInfo->imageUrl)}})">
                                                            <img src="{{hUrlImage($partnerInfo->imageUrl)}}" width="225" height="110"/>
                                                        </a>
                                                    @else
                                                        <a @if($partnerInfo->defaultCaseId > 0) href="{{hCaseDetailPage($partnerInfo->defaultCaseId)}}" @endif class="item_img"
                                                           target="_blank"
                                                           title="{{hUrlImage($partnerInfo->partnerName)}}"
                                                           style="background-image:url({{hUrlImage($partnerInfo->imageUrl)}})">
                                                            <img src="{{hUrlImage($partnerInfo->imageUrl)}}" width="225" height="110"/>
                                                        </a>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{hCategoryPage(0)}}" class="more hide wow"
                                       style="animation-delay:.5s">查看更多</a>
                                </div><!--wrapper-->
                                <div class="clear"></div>
                                <a href="/page/partner" class="more wow hide">MORE<i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div><!--mlist-->
                @endif
            </div><!--index-->
            <!--page-->
        </div>
        @include('common.footer')
    </div><!--siteWrapper-->
    <div id="rshares">
    </div>
    <div class="fixed" id="fixed_weixin">
    </div>
    <div id="online_lx">
    </div>
    <div class="hide">
    </div>
    <div class="loading">
        <div class="spinner"></div>
    </div>
</body>
</html>
