@include('common.head', ['page_title'=>$serviceInfo->title])
<body class="child"><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage post">
            <div class="content">
                <div class="mlistpost service module">
                    <div class="module_container wide">
                        <div class="container_content">
                            <div class="content_wrapper">
                                <div id="postContent">
                                    <div id="postInfo">
                                        <div class="module">
                                            <div class="module_container">
                                                <p class="title">{{$serviceInfo->title}}</p>
                                                <p class="subtitle">{{$serviceInfo->sub_title}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="postbody">
                                        <div class="module">
                                            <div class="module_container">
                                                @foreach($images as $url)
                                                    <div class="richtext">
                                                        <p><img alt="" src="{{hUrlImage($url)}}"></p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--wrapper-->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div><!--mlist-->
            </div>
        </div><!--npagePage post-->
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
    <script src="13313/13313.js" type="text/javascript"></script>
</div>
<div class="loading">
    <div class="spinner"></div>
</div>
<div class="fixed" id="fixed_mp">
</div>
<div class="index-mask"></div>
<div id="screenity-ui">
    <div class="screenity-shadow-dom">
        <div>
            <div></div>
            <div></div>
        </div>
        <style type="text/css">
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
                border-radius: 5px !important;
            }
            .screenity-blur {
                filter: blur(10px) !important;
            }
            .screenity-shadow-dom * {
                transition: unset;
            }
            .screenity-shadow-dom .TooltipContent {
                border-radius: 30px !important;
                background-color: #29292F !important;
                padding: 10px 15px !important;
                font-size: 12px;
                margin-bottom: 10px !important;
                bottom: 100px;
                line-height: 1;
                font-family: 'Satoshi-Medium', sans-serif;
                z-index: 99999999 !important;
                color: #FFF;
                box-shadow: hsl(206 22% 7% / 35%) 0px 10px 38px -10px, hsl(206 22% 7% / 20%) 0px 10px 20px -15px !important;
                user-select: none;
                transition: opacity 0.3 ease-in-out;
                will-change: transform, opacity;
                animation-duration: 400ms;
                animation-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
                will-change: transform, opacity;
            }
            .screenity-shadow-dom .hide-tooltip {
                display: none !important;
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
            #screenity-ui [data-radix-popper-content-wrapper] {
                z-index: 999999999999 !important;
            }
            .screenity-shadow-dom .CanvasContainer {
                position: fixed;
                pointer-events: all !important;
                top: 0px !important;
                left: 0px !important;
                z-index: 99999999999 !important;
            }
            .screenity-shadow-dom .canvas {
                position: fixed;
                top: 0px !important;
                left: 0px !important;
                z-index: 99999999999 !important;
                background: transparent !important;
            }
            .screenity-shadow-dom .canvas-container {
                top: 0px !important;
                left: 0px !important;
                z-index: 99999999999;
                position: fixed !important;
                background: transparent !important;
            }
            .ScreenityDropdownMenuContent {
                z-index: 99999999999 !important;
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
                color: #6E7684;
            !important;
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
        </style>
    </div>
</div>
</body>
</html>
