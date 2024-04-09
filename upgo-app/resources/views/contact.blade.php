@include('common.head', ['page_title'=>'联系我们'])
<body><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage pageEditor" id="page_contact2.html">
            <div class="content">
                <div class="postbody">
                    <div class="module" style="background-color:;padding:30px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p style="text-align:center">&nbsp;</p><p style="text-align:center">&nbsp;</p><p style="text-align:center"><span style="line-height:1"><span style="color:#232323"><span style="font-size:28px">联系我们</span></span></span></p><p style="text-align:center">联系我们</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:;padding:0px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><strong><span style="font-size:16px">合作商务</span></strong><br />联系微信：{{$businessWechat}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p>&nbsp;</p><hr /><p>&nbsp;</p></div>
                                </div>
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><strong><span style="font-size:16px">简历投递</span></strong><br /><span style="font-family:Arial,Helvetica,sans-serif">{{$resumeContact}} </span><span style="font-family:Arial,Helvetica,sans-serif"></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:;padding:px 0">
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
                </div><!--postbody-->
            </div>
        </div><!--npagePage-->
        <!--page-->
    </div>

    @include('common.footer')
</div><!--siteWrapper-->
<div id="rshares">
    <a href="http://service.weibo.com/share/share.php?appkey=3206975293&amp;" target="_blank" class="sweibo"><i
                class="fa fa-weibo"></i></a>
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
            15920410275<br/>
        </p>
    </div>
</div>
<div class="hide">
    <script src="http://resources.jsmo.xin/templates/upload/13313/13313.js" type="text/javascript"></script>
</div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
