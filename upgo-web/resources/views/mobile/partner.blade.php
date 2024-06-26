@include('common.mobile.head', ['page_title'=>'合作伙伴'])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div class="content">
                <div class="mlist imagelink module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container">
                        <div class="container_header wow">
                            <p class="title">合作伙伴</p>
                            <p class="subtitle">Bset Partner</p>
                        </div>
                        <div class="container_content nocat">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($partnerList as $index => $partnerItem)
                                        <li id="item_block_{{$index}}" class="item_block col-50">
                                            <div class="content">
                                                <a @if($partnerItem->defaultCaseId > 0) href="{{hCaseDetailPage($partnerItem->defaultCaseId)}}" @endif class="item_img" target="_blank" title="{{$partnerItem->title}}" style="background-image:url({{hUrlImage($partnerItem->imageUrl)}})">
                                                    <img src="{{hUrlImage($partnerItem->imageUrl)}}" width="225" height="110"/>
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
        <@include('common.mobile.footer')
    </div>
    <div id="bgmask"></div>
</div>
<div class="hide"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>