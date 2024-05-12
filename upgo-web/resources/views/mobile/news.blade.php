@include('common.mobile.head', ['page_title'=>'案例'])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div class="content">
                <div class="mlist news module" style="">
                    <div class="bgmask"></div>
                    <div class="module_container">
                        <div class="container_header wow">
                            <p class="title">News</p>
                        </div>
                        <div class="container_content nocat">
                            <div class="content_wrapper ">
                                <ul class="content_list row gutter">
                                    @foreach($newsList as $index => $newsItem)
                                    <li id="item_block_0" class="item_block col-50">
                                        <div class="content">
                                            <a href="{{webPageUrl($newsItem->pageId)}}" target="_self">
                                                <div class="item_img" style="background-image:url({{hUrlImage($newsItem->banner)}})">
                                                    <img src="{{hUrlImage($newsItem->banner)}}" width="760" height="560"/>
                                                    <div class="item_date">{{$newsItem->year.$newsItem->date}}</div>
                                                </div>
                                                <div class="item_wrapper">
                                                    <div class="title ellipsis">{{$newsItem->title}}</div>
                                                    <div class="line"><div></div></div>
                                                    <div class="description">
                                                        <p>{{$newsItem->subTitle}}</p>
                                                    </div>
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
                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/1/"  class="active">1</a>
                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/2/">2</a>
                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/3/">3</a>
                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/4/">4</a>
                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/5/">5</a>
                                <span>...</span>
                                <a href="//www.toonsoon.com.cn/forum/id/10552/page/6/">6</a>
                                <a class="next" href="//www.toonsoon.com.cn/forum/id/10552/page/2/">&nbsp;<i class="fa fa-angle-right"></i></a>
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
<div class="hide"><script src="//resources.jsmo.xin/templates/upload/13313/13313.js" type="text/javascript"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>