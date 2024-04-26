@include('common.mobile.head', ['page_title'=>$pageInfo->title])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')
<div id="siteWrapper">
    @include('common.mobile.header')
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
                                                <p class="title">{{$pageInfo->pageDesc}}</p>
                                                <p class="usetdate">{{$pageInfo->subTitle}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="postbody">
                                        <div class="module">
                                            <div class="module_container" style="max-width:100%">
                                                <div class="richtext">
                                                    <p>
                                                        @foreach($pageInfo->images as $url)
                                                            <img alt="" style="width: 100%" src="{{hUrlImage($url)}}"/>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="postfooter">
                                        <div class="module">
                                            <div class="module_container">
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
