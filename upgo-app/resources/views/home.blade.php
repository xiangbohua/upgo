@include('common.head', ['page_title'=>'首页'])
<body><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div id="indexPage">
            <!--slider-->
            <div id="topSlider" class="mslider module">
                <div class="module_container wide">
                    <ul class="content_list" data-slider-height="0" data-slider-auto="1" data-slider-mode="0" data-slider-pause="4" data-slider-ease="ease-out" data-slider-speed="0.5" style="height:1000px">
                        @foreach ($homePageInfo->bannerList as $banner)
                            <li>
                                <div class="item_bg image" data-thumb="" style="background-image:url('{{$banner->imageUrl}}')">
                                    <img src="{{hUrlImage($banner->imageUrl)}}"/>
                                </div>
                                <div class="wrapper">
                                    <div class="description mc">
                                        <p class="title ellipsis"></p>
                                        <p class="subtitle"></p>
                                    </div>
                                </div>
                                @if(!$banner->onlyImage)
                                    <a href="{{hCasePage($banner->caseInfoId)}}}" class="full" target="_blank"></a></a>
                                @endif
                            </li>
                        @endforeach

                        <li class="active">
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689821833435.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/1690276074816.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689821881534.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/1690276160916.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689817279461.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/1689817561288.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                            <a href="forum/post/334267/index.html" class="full" target="_blank"></a></a>
                        </li>
                        <li>
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689820604990.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/168982060911.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                            <a href="forum/post/334222/index.html" class="full" target="_blank"></a></a>
                        </li>
                        <li>
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689820826673.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/1689820830303.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                            <a href="forum/post/334215/index.html" class="full" target="_blank"></a></a>
                        </li>
                        <li>
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689821177563.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/1689821180856.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                            <a href="forum/post/334145/index.html" class="full" target="_blank"></a></a>
                        </li>
                        <li>
                            <div class="item_bg image" data-thumb=""
                                 style="background-image:url(http://resources.jsmo.xin/templates/upload/13313/202307/1689821772784.jpg)">
                                <img src="http://resources.jsmo.xin/templates/upload/13313/202307/1689821776729.jpg"/>
                            </div>
                            <div class="wrapper">
                                <div class="description mc">
                                    <p class="title ellipsis"></p>
                                    <p class="subtitle"></p>
                                </div>
                            </div>
                            <a href="forum/post/334261/index.html" class="full" target="_blank"></a></a>
                        </li>
                    </ul>
                    <div class="sliderArrow fa fa-angle-down"></div>
                </div>
            </div>
            <div class="mcounter module" style=" background-color:#FFFFFF;">
                <div class="bgmask"></div>
{{--                <div class="module_container wide">--}}
{{--                    <div class="container_content">--}}
{{--                        <ul class="content_list row">--}}
{{--                            <li class="col-25">--}}
{{--                                <div>--}}
{{--                                    <p class="number"><span class="counterDX" data-counter-value="3">3</span><span--}}
{{--                                                class="unit">年</span></p>--}}
{{--                                    <p class="title">3年间</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-25">--}}
{{--                                <div>--}}
{{--                                    <p class="number"><span class="counterDX" data-counter-value="23">23</span><span--}}
{{--                                                class="unit">+</span></p>--}}
{{--                                    <p class="title">助23个品牌</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-25">--}}
{{--                                <div>--}}
{{--                                    <p class="number"><span class="counterDX" data-counter-value="3">3</span><span--}}
{{--                                                class="unit"></span></p>--}}
{{--                                    <p class="title">占据类目前3</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="col-25">--}}
{{--                                <div>--}}
{{--                                    <p class="number"><span class="counterDX" data-counter-value="126">126</span><span--}}
{{--                                                class="unit">亿</span></p>--}}
{{--                                    <p class="title">提升126亿销售</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="clear"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div><!--counter-->
            <div class="mlist project module" style="">
                <div class="bgmask"></div>
                <div class="module_container wide">
                    <div class="container_hc">
                        <div class="container_header wow">
                            <p class="title">Brand New Strategy</p>
                        </div>
                        <div class="container_category wow">
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
                                            <a href="{{hCasePage($case->caseInfoId)}}" target="_blank">
                                                <div class="item_img"
                                                     style="background-image:url({{$case->imageUrl}})">
                                                    <img src="{{$case->imageUrl}}"/>
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
                                    <li id="item_block_{{$partnerInfo->index}}" class="item_block col-16 wow" style="animation-delay:.0s">
                                        <div class="content">
                                            <a href="{{hCasePage($partnerInfo->defaultCaseId)}}" class="item_img" target="_blank"
                                               title="{{$partnerInfo->partnerName}}"
                                               style="background-image:url({{$partnerInfo->imageUrl}})">
                                                <img src="{{$partnerInfo->imageUrl}}" width="225" height="110"/>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{hCategoryPage(0)}}" class="more hide wow" style="animation-delay:.5s">查看更多</a>
                        </div><!--wrapper-->
                        <div class="clear"></div>
                        <a href="/page/partner" class="more wow hide">MORE<i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!--mlist-->
        </div><!--index-->
        <!--page-->
    </div>
    @include('common.footer')
</div><!--siteWrapper-->
<div id="rshares">
    <a href="http://service.weibo.com/share/share.php?appkey=3206975293&amp;" target="_blank" class="sweibo"><i
                class="fa fa-weibo"></i></a>
    <a href="javascript:;" class="sweixin"><i class="fa fa-mobile"></i></a>
    <a href="javascript:;" id="gotop"><i class="fa fa-angle-up"></i></a>
</div>
<div class="fixed" id="fixed_weixin">
    <div class="fixed-container">
        <div id="qrcode"></div>
        <p>扫描二维码分享到微信</p>
    </div>
</div>
<div id="online_open"><i class="fa fa-comments-o"></i></div>
<div id="online_lx">
    <div id="olx_head">
        在线咨询<i class="fa fa-times fr" id="online_close"></i>
    </div>
    <ul id="olx_qq">
        <li><a href="tencent://message/?uin=&Site=uelike&Menu=yes"><i class="fa fa-qq"></i></a></li>
    </ul>
    <div id="olx_tel">
        <div><i class="fa fa-phone"></i>联系电话</div>
        <p>
            15920410275<br/>
        </p>
    </div>
</div>
<div class="hide">
    <script src="http://resources.jsmo.xin/templates/upload/13313/13313.js" type="text/javascript"></script>
</div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
