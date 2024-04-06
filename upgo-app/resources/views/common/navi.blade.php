<div id="header">
    <div class="content">
        <div id="headTop">
            <a href="index.html" id="logo"><img src="{{$siteLogo}}" alt="{{$brandTitle}}" /></a>
        </div>
        <div id="navWrapper">
            <div class="content">
                <ul class="nav">
                    <li class="navitem">
                        <a  class="active" href="/" target="_self"><span data-title="首页">首页</span>
                        </a>
                    </li>
                    <li class="navitem">
                        <a  href="{{hCategoryPage(0)}}" target="_self"><span data-title="案例">案例</span>
                        </a>
                    </li>
                    <li class="navitem">
                        <a  href="/page/service" target="_self"><span data-title="服务范围">服务范围</span>
                        </a>
                    </li>
                    <li class="navitem">
                        <a  href="/page/about" target="_self"><span data-title="关于">关于{{$brandShortName}}</span>
                        </a>
                    </li>
                    <li class="navitem">
                        <a  href="/page/partner" target="_self"><span data-title="合作伙伴">合作伙伴</span>
                        </a>
                    </li>
                    <li class="navitem">
                        <a  href="/page/contact" target="_self"><span data-title="联系我们">联系我们</span>
                        </a>
                    </li>
                </ul>
                <div id="openBtn" class="fl btn">
                    <div class="lcbody">
                        <div class="lcitem top">
                            <div class="rect top"></div>
                        </div>
                        <div class="lcitem bottom">
                            <div class="rect bottom"></div>
                        </div>
                    </div>
                </div>
                <div class="search-btn"><a href="javascript:;" class="header-search-form"><i class="fa fa-search search-button"></i></a></div>
                <div id="searchbar" class="search-wrap">
                    <div class="search-frame clearfix">
                        <form class="clearfix " action="search/index.html">

                            <a href="javascript:;" class="fl searchtext-btn" onclick="$(this).parent().submit()"><i class="fa fa-search search-button"></i></a>

                            <div class="search-input"><input placeholder="搜索" name="s"  value="" autocomplete="off" type="text" class=" fl"></div>
                        </form>
                        <a href="javascript:;" class="search-close"><i class="lcitem-top"></i><i class="lcitem-bottom"></i></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

    </div>

</div>