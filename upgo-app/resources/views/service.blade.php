@include('common.head', ['page_title'=>'CASE'])
<body class="child"><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div id="banner">
                <img src="{{hUrlImage($serviceTitleImg)}}">
            </div>
            <div class="content">
                <div class="mlist service module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container wide">
                        <div class="container_hc">
                            <div class="container_header wow animated" style="visibility: visible;">
                                <p class="title">BEST SERVICE</p>
                            </div>
                        </div>
                        <div class="container_content nocat">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($serviceList as $index => $item)
                                        <li id="item_block_{{$index}}" class="item_block col-33 wow" style="animation-delay: 0s; visibility: visible; animation-name: fadeInUp;">
                                            <div class="content">
                                                <a href="{{hServiceDetail($item->serviceId)}}" class="item_img" target="_blank" style="background-image:url({{$item->imageUrl}})">
                                                    <img src="background-image:url({{$item->imageUrl}}">
                                                    <div class="item_img_mask"></div>
                                                </a>
                                                <div class="item_wrapper">
                                                    <p class="title ellipsis">{{$item->title}}</p>
                                                    <p class="subtitle ellipsis">{{$item->subTitle}}</p>
                                                    <div class="description">
                                                        <p></p>
                                                    </div>
                                                    <a href="{{hServiceDetail($item->serviceId)}}" class="more" target="_blank">more</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="" class="more hide wow animated" style="animation-delay: 0.5s; visibility: visible;">查看更多</a>
                            </div><!--wrapper-->
                            <div class="clear"></div>
                            <div id="pages">
                                @if($current > 1)
                                    <a class="prev" href="{{hServicePage($currentCategory, $current - 1)}}">&nbsp;<i class="fa fa-angle-left"></i></a>
                                @endif
                                @for($pageIndex = 1; $pageIndex <= $totalPage; $pageIndex ++)
                                    <a @if($current != $pageIndex) href="{{hServicePage($currentCategory, $pageIndex)}}" @endif @if($pageIndex == $current) class="active" @endif>{{$pageIndex}}</a>
                                @endfor
                                @if($totalPage > 1 && $current < $totalPage)
                                    <a class="next" href="{{hServicePage($currentCategory, $current + 1)}}">&nbsp;<i class="fa fa-angle-right"></i></a>
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
    </div>
    @include('common.footer')
</div><!--siteWrapper-->
<div id="rshares">
    <a href="http://service.weibo.com/share/share.php?appkey=3206975293&amp;title=CASE+-+%E6%B1%A4%E8%87%A3%E6%9D%B0%E9%80%8A%E5%93%81%E7%89%8C%E6%88%98%E7%95%A5%E5%92%A8%E8%AF%A2+%7C+10%E4%BA%BF%E7%BA%A7%E8%B6%85%E7%BA%A7%E5%A4%A7%E5%8D%95%E5%93%81%E6%89%93%E9%80%A0&amp;url=http%3A%2F%2Fwww.toonsoon.com.cn%2Fforum%2Fid%2F10542%2Fcid%2F11045%2F" target="_blank" class="sweibo"><i class="fa fa-weibo"></i></a>
    <a href="javascript:;" class="sweixin"><i class="fa fa-mobile"></i></a>
    <a href="javascript:;" id="gotop" style="display: block;"><i class="fa fa-angle-up"></i></a>
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
        <li><a href="tencent://message/?uin=&amp;Site=uelike&amp;Menu=yes"><i class="fa fa-qq"></i></a></li>
    </ul>
    <div id="olx_tel">
        <div><i class="fa fa-phone"></i>联系电话</div>
        <p>
            15920410275<br>
        </p>
    </div>
</div>
<div class="hide"><script src="13313/13313.js" type="text/javascript"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
<div class="fixed" id="fixed_mp"><div class="fixed-container"><img src="//resources.jsmo.xin/templates/upload/13313/201901/1546587377152.png"><p>微信扫一扫</p></div></div><div class="index-mask"></div><div id="screenity-ui"><div class="screenity-shadow-dom"><div><div></div><div></div></div><style type="text/css">
            #screenity-ui, #screenity-ui div {
                background-color: unset;
                padding: unset;
                width: unset;
                box-shadow: unset;
                display: unset;
                margin: unset;
                border-radius: unset;
            }
            .screenity-outline {
                position: absolute;
                z-index: 99999999999;
                border: 2px solid #3080F8;
                outline-offset: -2px;
                pointer-events: none;
                border-radius: 5px!important;
            }
            .screenity-blur {
                filter: blur(10px)!important;
            }
            .screenity-shadow-dom * {
                transition: unset;
            }
            .screenity-shadow-dom .TooltipContent {
                border-radius: 30px!important;
                background-color: #29292F!important;
                padding: 10px 15px!important;
                font-size: 12px;
                margin-bottom: 10px!important;
                bottom: 100px;
                line-height: 1;
                font-family: 'Satoshi-Medium', sans-serif;
                z-index: 99999999!important;
                color: #FFF;
                box-shadow: hsl(206 22% 7% / 35%) 0px 10px 38px -10px, hsl(206 22% 7% / 20%) 0px 10px 20px -15px!important;
                user-select: none;
                transition: opacity 0.3 ease-in-out;
                will-change: transform, opacity;
                animation-duration: 400ms;
                animation-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
                will-change: transform, opacity;
            }
            .screenity-shadow-dom .hide-tooltip {
                display: none!important;
            }
            .screenity-shadow-dom .tooltip-tall {
                margin-bottom: 20px;
            }
            .screenity-shadow-dom .tooltip-small {
                margin-bottom: 5px;
            }
            .screenity-shadow-dom .TooltipContent[data-state='delayed-open'][data-side='top'] {
                animation-name: slideDownAndFade;
            }
            .screenity-shadow-dom .TooltipContent[data-state='delayed-open'][data-side='right'] {
                animation-name: slideLeftAndFade;
            }
            .screenity-shadow-dom.TooltipContent[data-state='delayed-open'][data-side='bottom'] {
                animation-name: slideUpAndFade;
            }
            .screenity-shadow-dom.TooltipContent[data-state='delayed-open'][data-side='left'] {
                animation-name: slideRightAndFade;
            }
            @keyframes slideUpAndFade {
                from {
                    opacity: 0;
                    transform: translateY(2px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes slideRightAndFade {
                from {
                    opacity: 0;
                    transform: translateX(-2px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            @keyframes slideDownAndFade {
                from {
                    opacity: 0;
                    transform: translateY(-2px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes slideLeftAndFade {
                from {
                    opacity: 0;
                    transform: translateX(2px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            #screenity-ui [data-radix-popper-content-wrapper] { z-index: 999999999999!important; }
            .screenity-shadow-dom .CanvasContainer {
                position: fixed;
                pointer-events: all!important;
                top: 0px!important;
                left: 0px!important;
                z-index: 99999999999!important;
            }
            .screenity-shadow-dom .canvas {
                position: fixed;
                top: 0px!important;
                left: 0px!important;
                z-index: 99999999999!important;
                background: transparent!important;
            }
            .screenity-shadow-dom .canvas-container {
                top: 0px!important;
                left: 0px!important;
                z-index: 99999999999;
                position: fixed!important;
                background: transparent!important;
            }
            .ScreenityDropdownMenuContent {
                z-index: 99999999999!important;
                min-width: 200px;
                background-color: white;
                margin-top: 4px;
                margin-right: 8px;
                padding-top: 12px;
                padding-bottom: 12px;
                border-radius: 15px;
                z-index: 99999;
                font-family: 'Satoshi-Medium', sans-serif;
                color: #29292F;
                box-shadow: 0px 10px 38px -10px rgba(22, 23, 24, 0.35),
                0px 10px 20px -15px rgba(22, 23, 24, 0.2);
                animation-duration: 400ms;
                animation-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
                will-change: transform, opacity;
            }
            .ScreenityDropdownMenuContent[data-side="top"] {
                animation-name: slideDownAndFade;
            }
            .ScreenityDropdownMenuContent[data-side="right"] {
                animation-name: slideLeftAndFade;
            }
            .ScreenityDropdownMenuContent[data-side="bottom"] {
                animation-name: slideUpAndFade;
            }
            .ScreenityDropdownMenuContent[data-side="left"] {
                animation-name: slideRightAndFade;
            }
            .ScreenityItemIndicator {
                position: absolute;
                right: 12px;
                width: 18px;
                height: 18px;
                background: #3080F8;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .ScreenityDropdownMenuItem,
            .ScreenityDropdownMenuRadioItem {
                font-size: 14px;
                line-height: 1;
                display: flex;
                align-items: center;
                height: 40px;
                padding: 0 5px;
                position: relative;
                padding-left: 22px;
                padding-right: 22px;
                user-select: none;
                outline: none;
            }
            .ScreenityDropdownMenuItem:hover {
                background-color: #F6F7FB !important;
                cursor: pointer;
            }
            .ScreenityDropdownMenuItem[data-disabled] {
                color: #6E7684; !important;
                cursor: not-allowed;
                background-color: #F6F7FB !important;
            }
            @keyframes slideUpAndFade {
                from {
                    opacity: 0;
                    transform: translateY(2px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes slideRightAndFade {
                from {
                    opacity: 0;
                    transform: translateX(-2px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            @keyframes slideDownAndFade {
                from {
                    opacity: 0;
                    transform: translateY(-2px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes slideLeftAndFade {
                from {
                    opacity: 0;
                    transform: translateX(2px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
        </style></div></div></body>
</html>
