<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	注册
</title>
<script src="/Static/js/jquery.min.js"></script>

<script src="/Static/js/custom.js"></script>
<script src="/Static/js/jquery.tweet.js"></script>
<script src="/Static/js/jquery.nivo.slider.js"></script>
<script src="/Static/js/jquery.poshytip.min.js"></script>   
<script src="/Static/js/jquery.min.js"></script>
<script>    
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
		
    function newpwd(id){
        var s=document.getElementById(id).value;
        if(s.indexOf(" ")>=0){
            document.getElementById("r"+id).innerHTML="<img class='false' src='/Public/images/errorlog.png'/>密码不能含有空格";
        }else if(s==""){
            document.getElementById("r"+id).innerHTML="<img class='false' src='/Public/images/errorlog.png'/>密码不能为空";    
		}else{
            document.getElementById("r"+id).innerHTML="<img class='true' src='/Public/images/dispose.png'/>正确";
        }
    }
	
    function repwd(id){
        var pwd1=document.getElementById("passwd").value;
        var pwd2=document.getElementById(id).value;
		if(pwd2==""){
            document.getElementById("r"+id).innerHTML="<img class='false' src='/Public/images/errorlog.png'/>密码不能为空";    
		}else if(pwd1!=pwd2){
            document.getElementById("r"+id).innerHTML="<img class='false' src='__PUBLIC__/images/errorlog.png'/>两次输入不相同";
        }else{
            document.getElementById("r"+id).innerHTML="<img class='true' src='__PUBLIC__/images/dispose.png'/>正确";
        }
    }
	
    function register(){
		var img = $("span").find(".false");
        if(img.length>0){
           return;
        }else{
			var loginname = $.trim($("#loginname").val()),
			passwd = $("#passwd").val();
			$.get('<?php echo U("Register/register");?>', {loginname: loginname,passwd:passwd}, function(data) {
			//alert(data);
				if(data=="true")
					window.location.href='<?php echo U("Index/index");?>';
				else
					alert("用户名重复，请重新填写");
			});   
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
        
<div class="registerTable">
<p>用户注册</p>
<table width="390" cellpadding="0" cellspacing="0" style="margin:auto" >
<tr>
	<td width="25%" height="50px" align="right">用户名：</td>
    <td width="75%" align="left"><input type="text" id ="loginname"/></td>
</tr>
<tr>
	<td align="right" height="50px">密码：</td>
    <td align="left"><input type="text" id ="passwd" onBlur="newpwd(id)"/><span id="rpasswd" style="font-size:14px;"></span></td>
</tr>
<tr>
	<td align="right" height="50px">确认密码：</td>
    <td align="left"><input type="text" id ="re_passwd" onBlur="repwd(id)"/><span id="rre_passwd" style="font-size:14px;"></span></td>
</tr>
<tr>
    <td align="right"></td>
    <td align="center"><input type="button" class="pure-button pure-input-1 pure-button-primary" onClick="newpwd('passwd');repwd('re_passwd');register()" value="注册" /></td>
</tr>
</table>
</div>
<div class="foot">
copyright by Hearain 2014-2015 
</div>

        <div class="bottom">
        
        </div>
    </div>
</body>
</html>