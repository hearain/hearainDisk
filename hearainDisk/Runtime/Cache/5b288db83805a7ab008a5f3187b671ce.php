<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	下载
</title>
<script src="/Static/js/jquery.min.js"></script>
<script src="/Static/js/bootstrap.min.js"></script>
<script src="/Static/development-bundle/ui/jquery.ui.effect.js"></script>
<script src="/Static/development-bundle/ui/jquery.ui.effect-clip.js"></script>
<script>
	$(document).ready(function(){
		var method = $("#method").val();
		if(method==1)
			$("#nike").html("批量分享下载");
		var nike = $("#nike").text();
		var infoarr = nike.split("."); 
		var suffix = infoarr[infoarr.length-1];//文件后缀
		if(suffix=="jpg"||suffix=="png"||suffix=="gif"||suffix=="jpeg"){
			$(".smallico").css("background-position","0px -80px");
			$(".view-file-image").css("background-position","0 0");
		}
		else if(suffix=="doc"||suffix=="docx"){
			$(".smallico").css("background-position","-96px -80px");
			$(".view-file-image").css("background-position","-459px 0");
		}		
		else if(suffix=="apk"){
			$(".smallico").css("background-position","-384px -80px");
			$(".view-file-image").css("background-position","-1224px 0");
		}		
		else if(suffix=="torrent"){
			$(".smallico").css("background-position","-448px -80px");
			$(".view-file-image").css("background-position","-1989px 0");
		}		
		else if(suffix=="txt"){
			$(".smallico").css("background-position","-160px -80px");
			$(".view-file-image").css("background-position","-1071px 0");
		}
		else if(suffix=="zip"){
			$(".smallico").css("background-position","-352px -80px");
			$(".view-file-image").css("background-position","-153px 0");
		}
		else if(suffix=="rar"){
			$(".smallico").css("background-position","-352px -80px");
			$(".view-file-image").css("background-position","-2142px 0");
		}		
		else if(suffix=="mp3"){
			$(".smallico").css("background-position","-192px -80px");
			$(".view-file-image").css("background-position","-1836px 0");
		}
	})
	
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
	
	function download(){
			var method = $("#method").val();
			var user = $("#user").text();
			var nike = $("#nike").text();
			var singleFile = $("#singleFile").val();
			if(method==0){
				var url="__ROOT__/Public/Upload/"+user+"/"+ singleFile;
				window.location.href="__TMPL__/download/file.php?url="+url+"&nikename="+nike;	
			}
			else if(method==1){
				window.location.href="__ROOT__/Public/Upload/"+user+"/package.zip";
			}	
		}
</script>



<link rel="stylesheet" href="/Static/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Static/css/common.css" />
<link rel="stylesheet" href="/Static/css/pure-min.css">
<link rel="stylesheet" href="/Static/css/bootstrap.css" />
<link rel="stylesheet" href="/Static/css/bootstrap-theme.css" />
<style>
.pure-button-secondary {
	background: rgb(66, 184, 221); /* this is a light blue */
}
.pure-button-xsmall {
	font-size: 100%;
}
.pure-button-secondary {
	color: white;
	border-radius: 4px;
	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}
</style>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<div class="main">
    <div class="top">
        <a href="<?php echo U('Index/index');?>"><div class="logo"></div></a>
        <!--<div class="title"><strong>网盘</strong></div>-->
        <div class="tool">
            <div class="search">
                <input type="text" id="search" name="search" value="搜索你的文件" onBlur="if(this.value==''){this.value='搜索你的文件';this.style.borderColor='#cccccc';this.style.color='#a0a0a0';}" onFocus="if(this.value=='搜索你的文件'){this.value='';this.style.borderColor='#AAAAAA';this.style.color='#2D2D2D';}" />
            </div>
            <div class="userinfo">
                <a href="#" id="uer_name"><?php echo ($name); ?></a>
                <a href="#">客户端下载</a>
                <a href="#">通知</a>
                <a href="<?php echo U('Login/logout');?>">退出</a>
            </div>
        </div>
    </div>
<!-- pop-up box begin-->    
	<div class="modal fade" id="preview" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" style="width:100%">
        <div class="modal-dialog" style="width:60%;"> 
    		<div class="modal-content">
                <div class="modal-body">
          
                </div>
            </div>
     	</div>
    </div>
<!-- pop-up box end-->
    <div  class="sharebody">
    	<div class="file_div">
        	<div class="file_date">
            	<div class="file_title">
                	<div class="shareTitle">
                    	<span id="filetype" class="smallico"></span>
                        <div class="fileName" id="nike"><?php echo ($nike); ?></div>
                    	<input type="hidden" id="singleFile" value="<?php echo ($singleFile); ?>">
                        <input type="hidden" id="method" value="<?php echo ($method); ?>">
                    </div>
                    <span class="donwnloadBtn">
                        <button class="pure-button pure-button-secondary pure-button-xsmall" >保存至网盘</button>
                        <button class="pure-button pure-button-secondary pure-button-xsmall" onClick="download()" >下载</button>
                    </span>
                </div>
                <div class="filePic">
                	<div class="pic view-file-image"></div>
                    <div class="fileSize" id="fileSize">文件大小：<?php echo ($fileSize); ?></div>
                </div>
            </div>
            <div class="ownerinfo">
            	<div class="property-list">
                	<div class="clearfix">
                    	<div class="userphoto"><img src="/Public/images/Userphoto/01.jpg" width="70px" height="70px"/></div>
                        <div class="username" id="user"><?php echo ($user); ?></div>
                    </div>
                    <ul class="shareNum clearfix">
                    	<li class="publiccnt"><a href="#"><em class="publiccnt">2</em><span>分享</span></a></li>
                        <li class="pbuliccnt"><a href="#"><em class="publiccnt">2</em><span>专辑</span></a></li>
                        <li class="concerncnt"><a href="#"><em class="publiccnt">2</em><span>关注</span></a></li>
                        <li class="fanscnt"><a href="#"><em class="publiccnt">2</em><span>粉丝</span></a></li>
                    </ul>
                    <div class="correlation">
                    	<div class="hr"></div>
                        <div class="resourceTitle">相关资源推荐</div>
                        <ul class="resource">
                        	<li><a href="#">这里是文件列表</a></li>
                            <li><a href="#">这里是文件列表</a></li>
                            <li><a href="#">这里是文件列表</a></li>
                        </ul>
                        <div class="hr"></div>
                    </div>
                </div>
                <div class="hotrec-ele hot"></div>
            </div>
        </div>
        <footer class="share-footer">
        	copyright by Hearain 2014-2015 
        </footer>
	</div>
</body>
</html>