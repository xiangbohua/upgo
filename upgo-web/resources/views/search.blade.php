@include('common.head', ['page_title'=>'搜索'])
<body class="child"><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage">
            <div class="content">
                <div class="mlist search module">
                    <div class="module_container">
                        <div class="container_hd">
                        </div>
                        <div class="container_content">
                            <div class="content_wrapper">
                                <div id="search_header">
                                    <div id="search_form">
                                        <form action="/search">
                                            <a href="javascript:;" class="search-form"><i id="searchButton" class="fa fa-search search-button"></i></a>
                                            <div><input id="searchInput" type="text" name="s" value="{{$keyWord}}" autocomplete="off" placeholder="搜索" /></div>
                                        </form>
                                    </div>
                                    <p id="search_result">“ {{$keyWord}} ” 搜索结果</p> </div>
                                <ul class="content_list row gutter">
                                    @foreach($searchResult as $index => $item)
                                        <li id="search_item_block_{{$index}}" class="item_block wow"  style="animation-delay:0s">
                                            <div class="content">
                                                <div class="item_wrapper">
                                                    <a class="title ellipsis" href="{{hCaseDetailPage($item->id)}}" target="_blank">{{$item->title}}</a>
                                                    <div class="description">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!--wrapper-->
                            <div class="clear"></div>
                            <div id="pages">
                                <a href="//www.toonsoon.com.cn/search/page/1/">1</a>
                                <a class="next" href="//www.toonsoon.com.cn/search/page/1/">&nbsp;<i class="fa fa-angle-right"></i></a>
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
</div>
<script>
    $(function () {//获取表单并跳转
        $("#searchButton").click(function () {
            var key=$("#searchInput").val();
            var url="/search/"+key;
            location.href=url;
        });
    });
</script>
<div class="fixed" id="fixed_weixin">
</div>
<div id="online_lx">
</div>
<div class="hide"><script src="//resources.jsmo.xin/templates/upload/13313/13313.js" type="text/javascript"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
