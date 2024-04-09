@include('common.head', ['page_title'=>'合作伙伴'])
<body class="child"><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div class="content">
                <div class="mlist imagelink module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container">
                        <div class="container_hc">
                            <div class="container_header wow">
                                <p class="title">合作伙伴</p>
                                <p class="subtitle">Bset Partner</p>
                            </div>
                        </div>
                        <div class="container_content nocat">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($partnerList as $index => $partnerItem)
                                        <li id="item_block_{{$index}}" class="item_block col-16 wow" style="animation-delay:.0s">
                                            <div class="content">
                                                <a href="{{hCaseDetailPage($partnerItem->defaultCaseId)}}" class="item_img" target="_blank" title="{{$partnerItem->title}}"  style="background-image:url({{hUrlImage($partnerItem->imageUrl)}})">
                                                    <img src="{{hUrlImage($partnerItem->imageUrl)}}" width="225" height="110"/>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <a href="" class="more hide wow" style="animation-delay:.5s">查看更多</a>
                            </div><!--wrapper-->
                            <div class="clear"></div>
                            <div id="pages">
                                @if($current > 1)
                                    <a class="prev" href="{{hPartnerPage($current - 1)}}">&nbsp;
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                @endif
                                @for($pageIndex = 1; $pageIndex <= $totalPage; $pageIndex ++)
                                    <a @if($current != $pageIndex) href="{{hPartnerPage($pageIndex)}}"
                                       @endif @if($pageIndex == $current) class="active" @endif>{{$pageIndex}}</a>
                                @endfor
                                @if($totalPage > 1 && $current < $totalPage)
                                    <a class="next" href="{{hPartnerPage($current + 1)}}">&nbsp;
                                        <i class="fa fa-angle-right"></i>
                                    </a>
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
    <a href="http://service.weibo.com/share/share.php?appkey=3206975293&" target="_blank" class="sweibo"><i class="fa fa-weibo"></i></a>
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
            15920410275<br />
        </p>
    </div>
</div>
<div class="hide"><script src="//resources.jsmo.xin/templates/upload/13313/13313.js" type="text/javascript"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
