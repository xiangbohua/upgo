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
                                    @if(strlen(trim($pageInfo->pageDesc)) >0)
                                        <div id="postInfo">
                                            <div class="module">
                                                <div class="module_container">
                                                    <p class="title">{{$pageInfo->pageDesc}}</p>
                                                    <p class="subtitle ellipsis">{{$pageInfo->subTitle}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="postbody">
                                        <div class="module">
                                            <div class="module_container" style="max-width:100%">
                                                <div class="richtext">
                                                    <p>
                                                        <img alt="" style="width: 100%" src="{{hUrlImage($pageInfo->banner)}}"/>
                                                    </p>
                                                    <p>
                                                        @foreach($pageInfo->details as $detail)
                                                            @if($detail->text_position == 1)
                                                                <p style="font-size: 18px; line-height: normal; padding-bottom: 10px; padding-top: 10px">{{$detail->detail_title}}</p>
                                                                <p>{{$detail->detail_desc}}</p>
                                                            @endif
                                                            @if(!empty($detail->image_url))
                                                                <img alt="" style="width: 100%" src="{{hUrlImage($detail->image_url)}}"/>
                                                            @endif
                                                            @if($detail->text_position == 0)
                                                                <p style="font-size: 18px; line-height: normal; padding-bottom: 10px; padding-top: 10px">{{$detail->detail_title}}</p>
                                                                <p>{{$detail->detail_desc}}</p>
                                                            @endif
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
