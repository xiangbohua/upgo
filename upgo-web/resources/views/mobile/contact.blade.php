@include('common.mobile.head', ['page_title'=>'联系我们'])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')

<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage pageEditor" id="page_contact2.html">
            <div class="content">
                <div class="postbody">
                    <div class="module" style="padding:15px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p style="text-align:center">&nbsp;</p><p style="text-align:center">&nbsp;</p><p style="text-align:center"><span style="line-height:1"><span style="color:#232323"><span style="font-size:28px">联系我们</span></span></span></p><p style="text-align:center">联系我们</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><strong><span style="font-size:16px">合作商务</span></strong><br />联系微信：联系微信：{{$business_wechat}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>&nbsp;</p><hr /><p>&nbsp;</p></div>
                                </div>
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><strong><span style="font-size:16px">简历投递</span></strong><br /><span style="font-family:Arial,Helvetica,sans-serif">{{$resume_contact}} </span><span style="font-family:Arial,Helvetica,sans-serif">（</span>邮件主题请注明：姓名+应聘职位+获取途径，邮件大小不超过20 M）</p><p>&nbsp;</p><hr /><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="">
                        <div class="module_container">
                            <div class="row gutter">
                                @foreach($addressList as $index => $item)
                                    <div class="col-50 wow">
                                        <div class="richtext"><p>&nbsp;</p><p><img alt="{{$item->titleHint}}.JPG" height="270" src="{{hUrlImage($item->displayImage)}}" width="487" /></p><p>&nbsp;</p><p><span style="color:#333333"><strong><span style="font-size:16px">联系-{{$item->titleHint}}</span></strong></span></p><p><span style="color:#7e7e7e">{{$item->titleName}}</span></p><p>&nbsp;</p><p><span style="line-height:2">总部地址：{{$item->detailAddress}}</span></p><p><span style="line-height:2">联系电话：{{$item->contactMobile}}</span></p><p><span style="line-height:2">联系微信：</span> {{$item->contactChat}}</p><p>邮编<span style="line-height:2">：</span> {{$item->postCode}}</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><hr /><p>&nbsp;</p></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="module" style="">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="yyform module">
                                        <div class="bgmask"></div>
                                        <div class="module_container">
                                            <div class="container_content">
                                            </div>
                                        </div>
                                    </div><!--counter-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--postbody-->
            </div>
        </div><!--npagePage-->
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
