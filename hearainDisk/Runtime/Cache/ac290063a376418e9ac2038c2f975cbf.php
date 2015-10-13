<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	登录
</title>
<script src="/Static/js/jquery.min.js"></script>

<script src="/Static/js/custom.js"></script>
<script src="/Static/js/jquery.tweet.js"></script>
<script src="/Static/js/jquery.nivo.slider.js"></script>
<script src="/Static/js/jquery.poshytip.min.js"></script>
<script>    
    function check_passwd (){
        var loginname = $.trim($("#loginname").val()),
		passwd = $("#passwd").val();
		$.get('<?php echo U("Login/ucenterlogin");?>', {loginname: loginname,passwd:passwd}, function(data) {
		//alert(data);
			if(data=="true")
				window.location.href='<?php echo U("Ucenter/index");?>';
			else
				alert("用户名密码错误");
		});        
    }

    function ajax(_url, _dataType, _data, _sync, operation) {
            try {
                $.ajax({
                    url: _url,
                    type: "POST",
                    dataType: _dataType,
                    data: _data,
                    async: _sync,
                    error: function(msg) {
                        //tipsWindown("text*异常"+msg);    
                    },
                    success: function(data)
                    {
                        operation(data);
                    }
                });
            } catch (error) {
                //tipsWindown("text*异常");
            }
        }
</script>

<link rel="stylesheet" href="/Static/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Static/css/common.css" />
<link rel="stylesheet" href="/Static/css/pure-min.css">

<link rel="stylesheet" href="/Static/css/nivo-slider.css" media="all" />

</head>

<body>
	<div class="main">
    	<div class="login_top">
        	<a href="<?php echo U('Login/index');?>"><div class="f_logo"></div></a>
            <div class="top_right">
            	<a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.baidu.com/');" href="#">设为首页</a>|
            	<a href="<?php echo U('Admin/index');?>">后台管理</a>|
            	<a href="#">官方微博</a>
            </div>
        </div>
        
<div class="main_body">
<div class="login-middle">
    <div class="banner">

    </div>
    <div class="banner_right">
        <div class="adminlonginTable">
            <div class="userinformation">
                <p class="login_title">管理员登录</p>
                <form class="pure-form">
                    <fieldset class="pure-group">
                        <input type="text" class="pure-input-1" placeholder="Username" id ="loginname"/>
                        <input type="password" class="pure-input-1" placeholder="Password" id ="passwd"/>
                    </fieldset>
                    <input type="button" class="pure-button pure-input-1 pure-button-primary" onclick="check_passwd()" value="登录">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="donwnload"></div>
<div class="footer">
copyright by Hearain 2014-2015
</div>
</div>

        <div class="bottom">
        
        </div>
    </div>
</body>
</html>