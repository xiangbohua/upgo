<div id="footer">
    <div class="module" id="flinks">
        <div class="module_container">
            <ul class="content_list row gutter">
                <li id="fitem_block_0" class="fitem_block_info item_block col-25 wow">
                    <h3 class="title">
                        <a href="">{{$brandTitle}}</a>
                    </h3>
                    <p class="description">{{$brandDesc}}</p>
                    <div class="shareicon">
{{--                        <a class="fl" target="_blank"--}}
{{--                           href="{{$weiboLink}}">--}}
{{--                            <i class="fa fa-weibo"></i>--}}
{{--                        </a>--}}
{{--                        <a class="fl" target="_blank" href="{{$qqLink}}">--}}
{{--                            <i class="fa fa-qq"></i>--}}
{{--                        </a>--}}
{{--                        <a id="mpbtn" class="fl"--}}
{{--                           href="{{$weixiQrcodeLink}}">--}}
{{--                            <i class="fa fa-weixin"></i>--}}
{{--                        </a>--}}
                    </div>
                </li>
                <li id="fitem_block_1" class="fitem_block_link item_block col-25 wow">
                    <ul>
                        <li class="title"><span class="ellipsis">upgo</span></li>
                        <li><a class="ellipsis" href="page/about" target="_blank">关于我们</a></li>
                        <li><a class="ellipsis" href="page/contact" target="_blank">合作机会</a></li>
                        <li><a class="ellipsis" href="page/contact" target="_blank">简历投递</a></li>
                    </ul>
                </li>
                <li id="fitem_block_2" class="fitem_block_link item_block col-25 wow">
                    <ul>
                        <li class="title"><span class="ellipsis">服务范围</span></li>
                        <li><a class="ellipsis" href="forum/post/79361/index.html" target="_blank">新视觉创意策划</a></li>
                        <li><a class="ellipsis" href="forum/post/79349/index.html" target="_blank">品牌新视觉 VI 规范</a></li>
                        <li><a class="ellipsis" href="forum/post/79339/index.html" target="_blank">新零售视觉策划及设计</a></li>
                    </ul>
                </li>

                <li id="fitem_block_3" class="fitem_block_link item_block col-25 wow">
                    <ul>
                        <li class="title"><span class="ellipsis">联系地址</span></li>
                        @foreach($addressList as $address)
                            <li><a class="ellipsis" href="http://map.baidu.com/?newmap=1&amp;s=con%26wd%3D%E5%B9%BF%E5%B7%9E%E6%B5%B7%E7%8F%A0%E5%8C%BA%E5%B7%A5%E4%B8%9A%E5%A4%A7%E9%81%93%E4%B8%AD279%E5%8F%B7%26c%3D257&amp;from=alamap&amp;tpl=mapsite" target="_blank">{{$address->detailAddress}}</a></li>
                        @endforeach
                        @if(sizeof($addressList) > 3)
                            <li><a class="ellipsis" href="page/contact" target="_blank">更多联系地址</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="module" id="copyright">
        <div class="module_container">
            <span class="ellipsis">COPYRIGHT (©) 2024  UPGO品牌战略咨询 | 100亿级超级大单品打造. </span>
            <a id="fbeian" href="https://beian.miit.gov.cn/" target="_blank">沪ICP备xxx号</a>
            <span style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;技术支持</span>
        </div>
    </div>
</div>