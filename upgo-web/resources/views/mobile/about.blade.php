@include('common.mobile.head', ['page_title'=>'关于'])
<body  class="child"><!--wrapper 整体宽度 container-->
@include('common.mobile.navi')

<div id="siteWrapper">
    @include('common.mobile.header')
    <div id="sitecontent">
        <!--page-->
        <div class="npagePage pageEditor" id="about">
            <div class="content">
                <div class="postbody">
                    <div class="module" style="background-color:#FFFFFF;padding:30px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p style="text-align:center"><span style="color:#232323"><span style="line-height:1"><span style="font-size:28px">关于我们 </span></span></span></p><p style="text-align:center"><span style="font-size:14px"><span style="color:#bdc3c7"><span style="line-height:3"><span style="font-family:Arial,Helvetica,sans-serif">About us</span></span></span></span></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="padding:10px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p style="text-align:center"><span style="font-size:10.5pt"><span style="font-family:&quot;Times New Roman&quot;"><sub><span style="font-size:72px">{{$partner_count}} </span>&nbsp;<strong><span style="font-size:28px">+</span></strong></sub></span></span>&nbsp;</p><p style="text-align:center"><span style="line-height:2"><span style="font-size:16px">品牌战略合作伙伴</span></span></p><p style="text-align:center"><span style="color:#bdc3c7"><span style="font-size:12px">战略伙伴</span></span></p><p style="text-align:center">&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p style="text-align:center"><span style="font-size:10.5pt"><span style="font-family:&quot;Times New Roman&quot;"><sub><span style="font-size:72px">{{$theme_count}} </span>&nbsp;<strong><span style="font-size:28px">+</span></strong></sub></span></span></p><p style="text-align:center"><span style="line-height:2"><span style="font-size:16px">高端视觉主题分享</span></span></p><p style="text-align:center"><span style="color:#bdc3c7"><span style="font-size:12px">主题分享</span></span></p><p>&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-50 wow">
                                    <div class="richtext"><p>&nbsp;</p><p style="text-align:center"><span style="font-size:10.5pt"><span style="font-family:&quot;Times New Roman&quot;"><sub><span style="font-size:72px">{{$artist_count}} </span>&nbsp;<strong><span style="font-size:28px">+</span></strong></sub></span></span></p><p style="text-align:center"><span style="line-height:2"><span style="font-size:16px">资深视觉创意专家</span></span></p><p style="text-align:center"><span style="color:#bdc3c7"><span style="font-size:12px">创意专家</span></span></p><p>&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:#FFFFFF;">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p>&nbsp;</p><p><img alt="" height="714" src="{{hUrlImage($image_1)}}" width="1270" /></p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:#F3F3F3;padding:45px 0">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-50 wow">
                                    <div class="richtext"><p><span style="font-size:36px; line-height:1">01 </span>&nbsp;&nbsp;<span style="color:#000000"><span style="font-size:18px"><span style="font-family:等线"><span style="font-family:微软雅黑"><span style="font-family:微软雅黑">{{$first_title}}</span></span></span></span></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p><p><span style="line-height:2"><span style="color:#6f6f6f">以&ldquo;价值锚点就是超级策略&rdquo;为核心的方法论，从「品牌策略定位」、「产品策略布局」、「品类重塑」、「创新视觉咨询」、「视觉策略传达」等多维矩阵为多家企业提供超级品牌增长策略。</span></span></p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-50 wow">
                                    <div class="richtext"><p><span style="font-size:36px; line-height:1">02 </span> &nbsp;<span style="color:#000000"><span style="font-size:18px">{{$sec_title}}</span></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p><p><span style="line-height:2">{{$sec_desc}}</span></p><p>&nbsp;</p></div>
                                </div>
                                <div class="col-50 wow">
                                    <div class="richtext"><p><span style="font-size:36px; line-height:1">03 </span> &nbsp;<span style="color:#000000"><span style="font-size:18px">{{$trd_title}}</span></span></p><p>&nbsp;</p><hr /><p>&nbsp;</p><p><span style="line-height:2"><span style="color:#6f6f6f">{{$trd_desc}}</span></span></p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p>&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="">
                        <div class="module_container">
                            <div class="row gutter">
                                <div class="col-100 wow">
                                    <div class="richtext"><p>&nbsp;</p><p>&nbsp;</p><p style="text-align:center"><span style="line-height:2"><span style="color:#232323"><span style="font-size:28px">{{$content_title}}</span></span></span></p><p style="text-align:center">&nbsp;</p><p style="text-align:center">{{$content_desc}}</p><p style="text-align:center">&nbsp;</p><p style="text-align:center">&nbsp;</p><p style="text-align:center">汤臣杰逊生于互联网时代，至今已迈入第十个年头，作为新一代消费者和互联网消费时代的原住民，以更贴近和熟悉互联网消费格局和全新一代消费者的姿态，在大量实战中，不断调整优化与这个时代贴合的品牌策略方法论。</p><p style="text-align:center">&nbsp;</p><p style="text-align:center">&nbsp;</p><p>&nbsp;</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module" style="background-color:#FFFFFF;">
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
