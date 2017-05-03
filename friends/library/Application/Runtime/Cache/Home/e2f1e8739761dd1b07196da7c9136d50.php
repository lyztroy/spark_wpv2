<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <script type="text/javascript" src="/library/Public/js/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/library/Public/css/register.css">
    <title>注册</title>
</head>
<body>
<div class="header">
    <a></a>
</div>
<div class="main">
    <div class="main-m">
        <div class="title">
            <span>注册</span>
        </div>
        <div>
            <form class="form" name="form"  action="<?php echo U(register_handle);?>" method="post" onsubmit="return check()">
                <input type="text" name="username" placeholder="真实姓名"/>
                <input class="password" type="password" name="password" placeholder="密码（长度为6到16位）"/>
                <input class="password" type="password" name="repwd" placeholder="密码（长度为6到16位）"/>
                <input type="text" name="studentnumber" placeholder="学号"/>
                <input type="text" name="phone" placeholder="手机号"/>
                <!-- <input type="text" name="address" placeholder="地址"/> -->
                <div class="select">
                    <select name="select">
                        <option value="北邮本部">北邮本部</option>
                        <option value="北邮沙河">北邮沙河</option>
                        <option value="北邮宏福">北邮宏福</option>
                    </select>
                    <input type="text" name="building" placeholder="楼">
                    <input type="text" name="room" placeholder="室">
                </div>
                <!--<input type="text" name="sex" placeholder="性别"/>-->
                <input class="submit" name="submit" type="submit" value="注册" />
                <div class="main-bottom">
                    <span  class="no-user">已经注册为用户？</span>
                    <a class="register" href="<?php echo U(login);?>">登录</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>
<script type="text/javascript" src="/library/Public/js/register.js"></script>
</html>