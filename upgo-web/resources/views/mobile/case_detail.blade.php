@include('common.mobile.head', ['page_title'=>$caseInfo->title])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage post">
            <div class="content">
                <div class="mlistpost project module">
                    <div class="module_container wide">
                        <div class="container_content">
                            <div class="content_wrapper">
                                <div id="postContent">
                                    <div id="postSlider" data-slider-num="1">
                                        <div class="mlist module">
                                            <div class="module_container wide">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="postInfo">
                                        <div class="module">
                                            <div class="module_container">
                                                <p class="title"></p>
                                                <p class="usetdate"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="postbody">
                                        <div class="module">
                                            <div class="module_container">
                                                <div class="richtext">
{{--                                                    <p>{{$caseInfo->title}}</p>--}}
                                                    @foreach($images as $url)
                                                        <p><img alt="" src="{{hUrlImage($url)}}" /></p>
                                                        <p>收藏</p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="postfooter">
                                        <div class="module">
                                            <div class="module_container">
                                                <div class="tags fl">
{{--                                                    <a href="">ABD</a>--}}
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="listContent">
                                    <div class="module">
                                        <div class="module_container">
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
