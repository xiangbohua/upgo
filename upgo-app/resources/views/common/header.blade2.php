<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{{$page_title}} - {{$share_app_name}}</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="{{hUrlAsset('layui/css/layui.css')}}" media="all">
		<link rel="stylesheet" href="{{hUrlAsset('layui/css/custom.css')}}" media="all">
		<link rel="stylesheet" href="{{hUrlAsset('js/autocomplete/autocomplete.css')}}" media="all">
		<link rel="stylesheet" href="{{hUrlAsset('css/header.css')}}" media="all">

		<!-- JQuery 2.0.1 -->
		<script src="{{hUrlAsset('js/jquery_2.0.1.min.js')}}"></script>
		<!-- 全局公共方法调用Util.js -->
		<script src="{{hUrlAsset('js/Util.js')}}"></script>

		<script src="{{hUrlAsset('js/header.js')}}"></script>
		<script src="{{hUrlAsset('js/autocomplete/autocomplete.js')}}"></script>

		@if(isset($add_css))
			@if(is_array($add_css))
				@foreach($add_css as $css_path)
					<link rel="stylesheet" href="{{hUrlAsset($css_path)}}" media="all">
				@endforeach
			@else
				<link rel="stylesheet" href="{{hUrlAsset($add_css)}}" media="all">
			@endif

		@endif

		@if(isset($add_js))
			@if(is_array($add_js))
				@foreach($add_js as $js_path)
					<script src="{{hUrlAsset($js_path)}}"></script>
				@endforeach
			@else
				<script src="{{hUrlAsset($add_js)}}"></script>
			@endif
		@endif
	</head>
	<body>
		<div class="layui-layout layui-layout-admin">
			<div class="layui-header header header-demo _top_nav_">
				<a class="layui-logo" href="{{URL('index/index')}}" title="点击返回首页并刷新权限">
					锐锢管理系统
				</a>
				<ul class="layui-nav layui-nav-top" lay-filter="">
					@foreach ($share_top_menus as $_stm)
					<li class="layui-nav-item {{isset($_stm['is_selected']) ? 'layui-this' : ''}}">
						<a href="{{URL($_stm['action'])}}">
							{{$_stm['name']}}
						</a>
					</li>
					@endforeach
				</ul>
				<ul class="layui-nav layui-exit _nav_right_" lay-filter="">
					<li class="layui-nav-item">
						<a class="layui-exit-spec" href="{{URL('message/index')}}">
							@if (isset($share_additional) && isset($share_additional['message_count']) && $share_additional['message_count'] > 0){{$share_additional['message_count']}}条新@endif消息
						</a>
					</li>
					<li class="layui-nav-item">
						<a class="layui-exit-spec" href="javascript:;">
							{{$share_username}}&nbsp;&nbsp;&nbsp;&nbsp;
						</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="{{URL('system/update_password')}}">
									改密
								</a>
							</dd>
							<dd>
								<a href="{{URL('nologin/logout')}}">
									退出
								</a>
							</dd>
						</dl>
					</li>
				</ul>
				<span class="_top_nav_flag_">&nbsp;</span>
			</div>
			<div class="layui-side layui-bg-black _left_nav_">
				<div class="layui-side-scroll">
					<ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="demo">
						@foreach ($share_left_menus as $_slm)
						<li class="layui-nav-item layui-nav-itemed">
							<a href="javascript:;" class="left-nav-two">
								{{$_slm['name']}}
							</a>
							@if(isset($_slm['kids']))
							<dl class="layui-nav-child">
								@foreach ($_slm['kids'] as $_slmi)
								<dd class="{{isset($_slmi['is_selected']) ? 'layui-this' : ''}}">
									<a href="{{URL($_slmi['action'])}}">
										{{$_slmi['name']}}

										@if(isset($menu_badge) && is_array($menu_badge) && key_exists($_slmi['action'], $menu_badge))
											<span style="float: right; text-align: center; margin-top: 5px; line-height: 20px; height: 15px; width: 15px;" class="badge badge-danger">{{$menu_badge[$_slmi['action']]}}</span>
										@endif
									</a>

								</dd>
								@endforeach
							</dl>
							@endif
						</li>
						@endforeach
					</ul>
				</div>
			</div>