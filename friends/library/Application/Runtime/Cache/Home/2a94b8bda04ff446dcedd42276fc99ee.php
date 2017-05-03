<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>Makerway</title>
	<link rel="stylesheet" type="text/css" href="/makerway/Public/css/index.css">
	<link rel="stylesheet" type="text/css" href="/makerway/Public/css/footer.css">
	<script type="text/javascript" src="/makerway/Public/js/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="content">
	<div class="title">
		<div class="logs">
			<ul>
				<li>最新消息：<span id="log" ></span>
				</li>
			</ul>
		</div>
		<img src="/makerway/Public/images/title.png"/>
		<!--<div style="position: fixed;">-->
			<span class="title-m"><span class="title-top">Makerway</span></span>
			<span class="title-help"><a href="<?php echo U(help);?>">帮助</a></span>
			<span class="title-main"><a href="<?php echo U(contribute);?>">书籍上传</a></span>
			<span class="title-share"><a href="<?php echo U(share);?>">共享库</a></span>
			<?php if($user['username'] == '') :?>
			<div class="username-list">
				<ul>
					<li class="register"><a href="<?php echo U(register);?>">注册</a></li>
					<li class="login"><a href="<?php echo U(login);?>">登录</a></li>
				</ul>
			</div>
			<?php else :?>
			<div class="username-c">
				<ul>
					<li>
						<?php if($user['image'] == '') :?>
						<span><img src="/makerway/Public/images/defaultheader.jpg"/></span>
						<?php else :?>
						<span><img src="<?php echo ($user['image']); ?>"/></span>
						<?php endif?>
						<span class="username-c-username"><?php echo ($user['username']); ?></span>
						<ul>
							<li><a href="<?php echo U(person);?>">我的主页</a></li>
							<li>消息</li>
							<li><a href="<?php echo U(message);?>">账号设置</a></li>
							<li><a href="<?php echo U(logout);?>">退出</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<?php endif ?>
		<!--</div>-->
		<div class="div-search">
			<div class="search-title">共享书本&nbsp;&nbsp;收获朋友</div><br><br>
			<form action="<?php echo U(search);?>" method="post">
				<input  class="search" name="search" type="text" value="书名/分类？" onfocus="if (value =='书名/分类？'){value =''}" onblur="if (value ==''){value='书名/分类？'}" />
				<div class="search-a">
					<img src="/makerway/Public/images/search.png" />
				</div>
			</form>
			<br/>
			<span>热门搜索：</span>
			<span class="detail">
				<span><a>数据库系统概念</a></span>
				<span><a>CSS 3实战</a></span>
				<span><a>操作系统概念</a></span>
			</span>
		</div>
		<div class="share">
			<div class="button">
				<input class="input-1" type="submit" value="好书共享" onclick="document.location='<?php echo U(contribute);?>'"  />
				<input class="input-2" type="submit" value="先到先得" onclick="document.location='<?php echo U(share);?>'"  />
			</div>
			<div class="share-contribute">
				<div>把你的书分享给更多人</div>
				<div>开启它的奇幻漂流</div>
				<div class="left-direction">>></div>
			</div>
			<div class="share-share">
				<div>借阅他人的共享书籍</div>
				<div>体验不一样的感悟</div>
				<div class="right-direction"><<</div>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="img-li">
			<ul>
				<li>
					<img src="/makerway/Public/images/1.jpg"/>
				</li>
				<li>
					<img src="/makerway/Public/images/2.jpg"/>
				</li>
				<li>
					<img src="/makerway/Public/images/3.jpg"/>
				</li>
				<li>
					<img src="/makerway/Public/images/4.jpg"/>
				</li>
			</ul>
		</div>
	</div>
	<div class="footer">
    <div class="pass">
        <img src="/makerway/Public/images/qrmakerway.jpg"/><span>扫面关注makerway微信公众号</span>
    </div>
    <span>联系邮箱：maker_way@163.com</span>
    <div class="footer-img">
        <img src="/makerway/Public/images/makerway.png"/>
    </div>
</div>
</div>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-68503572-4', 'auto');
	ga('send', 'pageview');

</script>
</body>
<script type="text/javascript" src="/makerway/Public/js/index.js"></script>
<script type="text/javascript" src="/makerway/Public/js/labelsearch.js"></script>
<script type="text/javascript" src="/makerway/Public/js/submit.js"></script>
<script>
	var allcookies = document.cookie;
	function getCookie(cookie_name)
	{
		var allcookies = document.cookie;
		var cookie_pos = allcookies.indexOf(cookie_name);   //索引的长度
		if (cookie_pos != -1)
		{
// 把cookie_pos放在值的开始，只要给值加1即可。
			cookie_pos += cookie_name.length + 1;      //这里我自己试过，容易出问题，所以请大家参考的时候自己好好研究一下。。。
			var cookie_end = allcookies.indexOf(";", cookie_pos);
			if (cookie_end == -1)
			{
				cookie_end = allcookies.length;
			}
			var value = unescape(allcookies.substring(cookie_pos, cookie_end)); //这里就可以得到你想要的cookie的值了。。。
		}
		return value;
	}
</script>
<script type="text/javascript">

	function update(){
		$.getJSON('<?php echo U(showLogs);?>',function(data) {
			showLog(data);
		});
	}
	function showLog(value){
		var log=$("#log");
		log.text(String(value));
	}
	setInterval(update, 1000);
	update();
</script>
</html>