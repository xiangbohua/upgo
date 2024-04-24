@include('common.mobile.head', ['page_title'=>'服务范围'])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div class="content">
                <div class="mlist service module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container">
                        <div class="container_header wow">
                            <p class="title">BEST SERVICE</p>
                        </div>
                        <div class="container_content nocat">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($serviceList as $index => $item)
                                        <li id="item_block_{{$index}}" class="item_block col-50" >
                                            <div class="content">
                                                <a href="{{hServiceDetail($item->serviceId)}}" target="_self" >
                                                    <div class="item_img" style="background-image:url({{hUrlImage($item->imageUrl)}})">
                                                        <img src="{{hUrlImage($item->imageUrl)}}" width="750" height="500"/>
                                                    </div>
                                                    <div class="item_wrapper">
                                                        <p class="title ellipsis">{{$item->title}}</p>
                                                        <p class="subtitle ellipsis">{{$item->subTitle}}</p>
                                                        <div class="description">
                                                            <p></p>
                                                        </div>
                                                        <p class="more">more</p>
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
        @include('common.mobile.footer')
    </div>
    <div id="bgmask"></div>
</div>
<div class="hide"></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>