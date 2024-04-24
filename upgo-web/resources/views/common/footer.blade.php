<div id="footer">
    <div class="module" id="flinks">
        <div class="module_container">
            <ul class="content_list row gutter">
                <li id="fitem_block_0" class="fitem_block_info item_block col-50 wow">
                    <h3 class="title">
                        <a href="">{{$brand_title}}</a>
                    </h3>
                    <p class="description" style="height: 120px">{{$brand_desc}}</p>
                    <div class="shareicon">

                    </div>
                </li>
                <li id="fitem_block_1" class="fitem_block_link item_block col-25 wow">
                    <ul>
                        <li class="title"><span class="ellipsis">上和行upgo</span></li>
                        <li><a class="ellipsis" href="/case/cate/0/page/0" target="_blank">案例</a></li>
                        <li><a class="ellipsis" href="/service" target="_blank">服务范围</a></li>
                        <li><a class="ellipsis" href="/about" target="_blank">关于上和行</a></li>
                    </ul>
                </li>
{{--                <li id="fitem_block_2" class="fitem_block_link item_block col-25 wow">--}}
{{--                    <ul>--}}
{{--                        <li class="title"><span class="ellipsis">服务范围</span></li>--}}
{{--                        @foreach($services as $ser)--}}
{{--                            <li><a class="ellipsis" href="{{hServiceDetail($ser->serviceId)}}" target="_blank">{{$ser->title}}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <li id="fitem_block_3" class="fitem_block_link item_block col-25 wow">
                    <ul>
                        <li class="title"><span class="ellipsis">联系地址</span></li>
                        @foreach($addressList as $address)
                            <li><a class="ellipsis" href="{{$address->naviUrl}}" target="_blank">{{$address->detailAddress}}</a></li>
                        @endforeach
                        @if(sizeof($addressList) > 3)
                            <li><a class="ellipsis" href="page/contact" target="_blank">更多联系地址</a></li>
                        @endif
                        <li><a class="ellipsis">联系微信：{{$business_wechat}}</a></li>
                        <li><a class="ellipsis">联系电话：{{$resume_contact}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="module" id="copyright">
        <div class="module_container">
            <span class="ellipsis">COPYRIGHT (©) 2024  {{$slogan}} </span>
            <a id="fbeian" href="https://beian.miit.gov.cn/" target="_blank">{{$site_code}}</a>
            <span style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;技术支持</span>
        </div>
    </div>
</div>