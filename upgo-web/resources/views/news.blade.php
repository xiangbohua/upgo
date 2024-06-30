@include('common.head', ['page_title'=>'动态'])
<body class="child"><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div id="banner">
                <img src="{{hUrlImage($new_title_img)}}" />
            </div>
            <div class="content">
                <div class="mlist news module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container wide">
                        <div class="container_hc">
                            <div class="container_header wow">
                                <p class="title">News</p>
                            </div>
                        </div>
                        <div class="container_content nocat">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($newsList as $index => $newsItem)
                                        <li id="item_block_0" class="item_block col-25 wow"  style="animation-delay:.0s; margin-bottom: 0px">
                                            <div class="content">
                                                <a href="{{webPageUrl($newsItem->pageId)}}" class="item_img" target="_blank" style="background-image:url({{hUrlImage($newsItem->cover)}})">
                                                    <img src="{{hUrlImage($newsItem->cover)}}"/>
                                                    <div class="item_img_mask"></div>
                                                </a>
                                                <div class="item_wrapper" style="padding: 0px">
                                                    <a class="title ellipsis" href="{{webPageUrl($newsItem->pageId)}}" target="_blank">{{$newsItem->title}}</a>
                                                    <div class="line"><div></div></div>
                                                    <div style="width: 100%" class="description">
                                                        <p>{{$newsItem->subTitle}}</p>
                                                    </div>
                                                </div>
                                                <div class="item_date">
                                                    <p class="year">{{$newsItem->year}}</p>
                                                    <p class="day">{{$newsItem->date}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="" class="more hide wow" style="animation-delay:.5s">查看更多</a>
                            </div><!--wrapper-->
                            <div class="clear"></div>
{{--                            <div id="pages">--}}
{{--                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/1/"  class="active">1</a>--}}
{{--                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/2/">2</a>--}}
{{--                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/3/">3</a>--}}
{{--                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/4/">4</a>--}}
{{--                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/5/">5</a>--}}
{{--                                <span>...</span>--}}
{{--                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/6/">6</a>--}}
{{--                                <a class="next" href="//www.toonsoon.com.cn/forum/id/10552/page/2/">&nbsp;<i class="fa fa-angle-right"></i></a>--}}
{{--                            </div>--}}
                            <div id="pages">
                                @if($current > 1)
                                    <a class="prev" href="{{hNewsPage($current - 1)}}">&nbsp;<i
                                                class="fa fa-angle-left"></i></a>
                                @endif
                                @for($pageIndex = 1; $pageIndex <= $totalPage; $pageIndex ++)
                                    <a @if($current != $pageIndex) href="{{hNewsPage($pageIndex)}}" @endif @if($pageIndex == $current) class="active" @endif>{{$pageIndex}}</a>
                                @endfor
                                @if($totalPage > 1 && $current < $totalPage)
                                    <a class="next" href="{{hNewsPage($current + 1)}}">&nbsp;<i
                                                class="fa fa-angle-right"></i></a>
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
<div class="hide"><script src="" type="text/javascript"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
