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
		$.get('<?php echo U("Login/login");?>', {loginname: loginname,passwd:passwd}, function(data) {
		//alert(data);
			if(data=="true")
				window.location.href='<?php echo U("Index/index");?>';
			else
				//window.location.href='<?php echo U("Index/index");?>';
				alert("用户名密码错误");
		});        
		//var data = {'loginname':loginname,'passwd':passwd};
        //ajax('<?php echo U("Login/login");?>','json',data,true,res.login);
        //显示验证密码中
    }
/*    var res={};
    res.login = function(data){

        if(data.res!=='0'){
            $("#login_err").show();
        }else{
            $("#login_err").hide();
            window.location.href='<?php echo U("Index/index");?>';
        }
    }*/

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
            	<a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://localhost/');" href="#">设为首页</a> |
            	<a href="<?php echo U('Admin/index');?>">后台管理</a> |
            	<a href="#">官方微博</a>
            </div>
        </div>
        
<div class="main_body">
<div class="login-middle">
    <div class="banner">
    <!-- WRAPPER -->
    <div class="wrapper cf">
        <br>
        <!-- MAIN -->
        <div role="main" id="main" class="cf">
            <!-- SLIDER -->
            <div class="slider-wrapper theme-halftone">
                <div id="slider" class="nivoSlider">
                    <img src="../../../Static/css/images/dummies/slides/freeshare.jpg" alt="" />
                    <img src="../../../Static/css/images/dummies/slides/2Tspace.jpg" alt="" />
                    <img src="../../../Static/css/images/dummies/slides/multiterminal.jpg" alt="" /> </div>
            </div>
            <!-- ENDS SLIDER --></div>
        <!-- ENDS MAIN --></div>
    <!-- ENDS WRAPPER -->
    </div>
    <div class="banner_right">
        <div class="longinTable">
            <div class="userinformation">
                <p class="login_title">用户登录</p>
                <form class="pure-form">
                    <fieldset class="pure-group">
                        <input type="text" class="pure-input-1" placeholder="Username" id ="loginname"/>
                        <input type="password" class="pure-input-1" placeholder="Password" id ="passwd"/>
                    </fieldset>
                    <div class="autologin">
                        <span style="color:#5B7E9B;font-size:12px"><input type="checkbox" style="vertical-align: middle; margin-right:5px" />下次自动登录</span>
                        <span style="color:#5B7E9B;font-size:12px; margin-left:120px"><a href="#" style="color:#1B66C7">忘记密码？</a></span>
                    </div>
                    <input type="button" class="pure-button pure-input-1 pure-button-primary" onclick="check_passwd()" value="登录">
                    <div class="otherlogin">
                        <p style="color:#5B7E9B; font-size:12px">可以使用以下方式登录</p>
                        <div class="qq"></div>
                    </div>
                    <div class="register">
                        <p style="color:#5B7E9B; font-size:12px">没有帐号？</p>
                        <input type="button" class="pure-button pure-input-1 pure-button-primary" onclick="window.location.href='<?php echo U('Register/index');?>'" value="立即注册">
                    </div>
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