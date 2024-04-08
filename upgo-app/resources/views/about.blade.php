@include('common.head', ['page_title'=>'关于'])
<body class="child"><!--wrapper 整体宽度 container-->
<div id="siteWrapper">
    @include('common.navi')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage pageEditor" id="page_about.html11">
            <div id="banner">
                <img src="{{hUrlImage($aboutTitleImg)}}" alt="" />
            </div>
            <div class="content">
                <div class="postbody">
                    <div class="module" style="background-color:#FFFFFF;padding:60px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p style="text-align:center"><span style="color:#232323"><span style="line-height:1"><span style="font-size:28px">关于我们 </span></span></span></p><p style="text-align:center"><span style="font-size:14px"><span style="color:#bdc3c7"><span style="line-height:3"><span style="font-family:Arial,Helvetica,sans-serif">About us</span></span></span></span></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:;padding:20px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-33 wow">
                                    <div class="richtext"><p>&nbsp;</p><p style="text-align:center"><span style="font-size:10.5pt"><span style="font-family:&quot;Times New Roman&quot;"><sub><span style="font-size:72px">{{$partner_count}} </span>&nbsp;<strong><span style="font-size:28px">+</span></strong></sub></span></span>&nbsp;</p><p style="text-align:center"><span style="line-height:2"><span style="font-size:16px">品牌战略合作伙伴</span></span></p><p style="text-align:center"><span style="color:#bdc3c7"><span style="font-size:12px">战略伙伴</span></span></p><p style="text-align:center">&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-33 wow">
                                    <div class="richtext"><p>&nbsp;</p><p style="text-align:center"><span style="font-size:10.5pt"><span style="font-family:&quot;Times New Roman&quot;"><sub><span style="font-size:72px">{{$theme_count}} </span>&nbsp;<strong><span style="font-size:28px">+</span></strong></sub></span></span></p><p style="text-align:center"><span style="line-height:2"><span style="font-size:16px">高端视觉主题分享</span></span></p><p style="text-align:center"><span style="color:#bdc3c7"><span style="font-size:12px">主题分享</span></span></p><p>&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-33 wow">
                                    <div class="richtext"><p>&nbsp;</p><p style="text-align:center"><span style="font-size:10.5pt"><span style="font-family:&quot;Times New Roman&quot;"><sub><span style="font-size:72px">{{$artist_count}} </span>&nbsp;<strong><span style="font-size:28px">+</span></strong></sub></span></span></p><p style="text-align:center"><span style="line-height:2"><span style="font-size:16px">资深视觉创意专家</span></span></p><p style="text-align:center"><span style="color:#bdc3c7"><span style="font-size:12px">创意专家</span></span></p><p>&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:#FFFFFF;padding:0px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><img alt="" height="714" src="{{hUrlImage($image_1)}}" width="1270" /></p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:#F3F3F3;padding:90px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-33 wow">
                                    <div class="richtext"><p><span style="font-size:36px; line-height:1">01 </span>&nbsp;&nbsp;<span style="color:#000000"><span style="font-size:18px"><span style="font-family:等线"><span style="font-family:微软雅黑"><span style="font-family:微软雅黑">{{$first_title}}</span></span></span></span></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p><p><span style="line-height:2"><span style="color:#6f6f6f">{{$first_desc}}</span></span></p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-33 wow">
                                    <div class="richtext"><p><span style="font-size:36px; line-height:1">02 </span> &nbsp;<span style="color:#000000"><span style="font-size:18px">{{$sec_title}}</span></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p><p><span style="line-height:2">{{$sec_desc}}</span></p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-33 wow">
                                    <div class="richtext"><p><span style="font-size:36px; line-height:1">03 </span> &nbsp;<span style="color:#000000"><span style="font-size:18px">{{$trd_title}}</span></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p><p><span style="line-height:2"><span style="color:#6f6f6f">{{$trd_desc}}</span></span></p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:;padding:0px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p>&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:;padding:0px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext">
                                        <p>&nbsp;</p><p>&nbsp;</p><p style="text-align:center"><span style="line-height:2"><span style="color:#232323"><span style="font-size:28px">{{$content_title}}</span></span></span></p><p style="text-align:center">&nbsp;</p><p style="text-align:center">
                                            {{$content_desc}}
                                        </p><p style="text-align:center">&nbsp;</p><p style="text-align:center">&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:#FFFFFF;padding:0px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><img alt="LOGO.jpg" src="{{hUrlImage($image_2)}}" /></p><p>&nbsp;</p></div>
                                </div>
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
    <a href="http://service.weibo.com/share/share.php?appkey=3206975293&" target="_blank" class="sweibo"><i class="fa fa-weibo"></i></a>
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
            15920410275<br />
        </p>
    </div>
</div>
<div class="hide"><script src="//resources.jsmo.xin/templates/upload/13313/13313.js" type="text/javascript"></script></div>
<div class="loading">
    <div class="spinner"></div>
</div>
</body>
</html>
