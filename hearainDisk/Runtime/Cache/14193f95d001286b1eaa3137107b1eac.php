<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	文件上传
</title>
<script src="/Static/js/jquery.min.js"></script>
<script src="/Static/js/bootstrap.min.js"></script>
<script src="/Static/development-bundle/ui/jquery.ui.effect.js"></script>
<script src="/Static/development-bundle/ui/jquery.ui.effect-clip.js"></script>
<script>
	function setRHigh() {
		var bodyh = document.documentElement.clientHeight;
		var bodyw = document.documentElement.clientWidth;
		document.getElementById("mainbody").style.height = (parseInt(bodyh) - 60) + 'px';
		document.getElementById("right_top").style.width = (parseInt(bodyw) - 210) + 'px';
		document.getElementById("list_title").style.width = (parseInt(bodyw) - 210) + 'px';
	}
	window.onload = window.onresize = function () {
		setRHigh();
	}
    $(document).ready(function() {
		var file_size = $("#spaceValue").val();
		if(file_size>=1024&&file_size<1048576){
			file_size=parseInt(file_size/1024);
			file_size=file_size+"KB";
		}
		else if(file_size>=1048576&&file_size<1073741824){
			file_size=parseInt(file_size/1048576);
			file_size=file_size+"MB";
		}
		else if(file_size>=1073741824){
			data[i].file_size=parseInt(data[i].file_size/1073741824);
			file_size=file_size+"GB";
		}
		else file_size=file_size+"B";
		$("#showSpace").html(file_size);
		$(".nav li").click(function() {
		$(".nav li").removeClass('over');
		$(this).addClass("over");
	})
	});
	$.get('<?php echo U("Login/login");?>', {loginname: loginname,passwd:passwd}, function(data) {
	//alert(data);
		if(data=="true")
			window.location.href='<?php echo U("Index/index");?>';
		else
		window.location.href='<?php echo U("Index/index");?>';
			//alert("用户名密码错误");
	});  
	
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

<script src="/Static/uploadify/jquery.uploadify.min.js"></script>
<script>
	$(document).ready(function(){
			$("#upload").uploadify({
			height        : 30,
			swf           : '/Static/uploadify/uploadify.swf',
			uploader      : '<?php echo U("Uploadify/upload");?>',
			width         : 120,
			buttonText	  : '选择文件',
			auto		  : true,
			removeCompleted: false,
			onUploadSuccess: function(file, data, response) {
				//$('#progress').hide();
				var result = $.parseJSON(data);
				//错误处理
				if(result.status == 0){
					alert(result.message);
					return false;
				}
				//上传成功
				var id = Math.random().toString();
				id = id.replace('.','_'); //生成唯一标示
				var filename = file.name;
				var fname = filename.split(".");
				var suffix = fname[fname.length-1];//获取文件后缀，文件格式
				var html = '<li class="imageitem" id="'+id+'">';
					html+= '<input type="hidden" name="file[]" value="'+result.file+'">'; //隐藏域，是为了把图片地址入库。。
				switch (suffix)
				{
				case "zip":
					html+= '<img height="160" width="160" src="/Public/images/zfilezip.png" />';break;
				case "rar":
					html+= '<img height="160" width="160" src="/Public/images/zfilerar.png" />';break;
				case "mp3":
					html+= '<img height="160" width="160" src="/Public/images/zfilemp3.png" />';break;
				case "doc":
					html+= '<img height="160" width="160" src="/Public/images/zfiledoc.png" />';break;
				case "docx":
					html+= '<img height="160" width="160" src="/Public/images/zfiledoc.png" />';break;
				case "txt":
					html+= '<img height="160" width="160" src="/Public/images/zfiletxt.png" />';break;
				case "exe":
					html+= '<img height="160" width="160" src="/Public/images/zfileexe.png" />';break;
				case "font":
					html+= '<img height="160" width="160" src="/Public/images/zfilefont.png" />';break;
				case "html":
					html+= '<img height="160" width="160" src="/Public/images/zfilehtml.png" />';break;
				case "ini":
					html+= '<img height="160" width="160" src="/Public/images/zfileini.png" />';break;
				case "mov":
					html+= '<img height="160" width="160" src="/Public/images/zfilemov.png" />';break;
				case "jpg":
					html+= '<img height="160" width="160" src="'+result.file+'" />';break;
				case "png":
					html+= '<img height="160" width="160" src="'+result.file+'" />';break;
				case "gif":
					html+= '<img height="160" width="160" src="'+result.file+'" />';
				}					
					html+=  '<span class="txt">';
					//html+=  '<a title="删除" href="<?php echo U("Uploadify/del");?>"><img src="/Static/Uploadify/remove.png" /></a>';
					html+=  '<a title="删除" href=javascript:remove("'+result.savename+'","'+id+'","'+result.file+'","'+file.name+'");><img src="/Static/Uploadify/remove.png" /></a>';
					html+=  '<a title="移动" href=javascript:toremove("'+file.name+'");><img src="/Static/Uploadify/right.png" /></a>';
					html+=  '</span>';
					html+=  '<em><textarea style=" height:20px;width:155px;">'+file.name+'</textarea></em>';
					html+=  '</li>';
				$('#image_result').append(html);
			},
			onUploadStart: function(){
				//$('#progress').text('正在上传...');  //用户等待提示。
				$(".uploadify-queue").addClass("uploadify-bg");	
				$("#close").show();
				$("#button").show();			
		},
			onInit: function (){ 
				//$("#upload-queue").hide(); //隐藏上传队列
			}		
		});
	})
	
	function remove(file,id,path){
		//alert('删除该文件'+"rn"+file);
        $.get('<?php echo U("Uploadify/del");?>', {file_name: file ,file_path: path}, function() {
         alert("删除成功！");
		 $('#'+id).remove();
        });
	}
	function toremove(file){
		alert('移动到其他文件夹'+"rn"+file);
	}
	function closelist(){
		$('.uploadify-queue-item').remove();
		$(".uploadify-queue").removeClass("uploadify-bg");
		$("#close").hide();
		$("#button").hide();
	}
	$(function() {
	function runEffect() {
		var selectedEffect = "clip";
		var options = {};
		if ( selectedEffect === "scale" ) {
			options = { percent: 0 };
		} else if ( selectedEffect === "size" ) {
			options = { to: { width: 200, height: 60 } };
		}
		$( "#upload-queue" ).toggle( selectedEffect, options, 500 );
	};
	$( "#button" ).click(function() {
		if($(this).html()=="↑"){
		$(this).html("↓");
		}else{
		$(this).html("↑");
		}
		runEffect();
		return false;
	});
});
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

<link href="/Static/uploadify/uploadify.css" rel="stylesheet">
<style>
.pure-button-secondary {
	background: rgb(66, 184, 221); /* this is a light blue */
}
.pure-button-xsmall {
	font-size: 60%;
}
.pure-button-secondary {
	color: white;
	border-radius: 4px;
	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}
.imagelist li{
    background: none repeat scroll 0 0 #F0F0F0;
    border: 1px solid #E0E0E0;
    display: inline;
    float: left;
	margin-right:10px;
	margin-top:5px;
    padding: 11px;
    width: 160px;
	height:220px;
	overflow:hidden;
	position: relative;
	
}
.imagelist li em{
    color: #999999;
    display: block;
    line-height: 18px;
    padding: 8px 0px;
}

.imagelist li span.txt {
    color: #FFFFFF;
    display: block;
    left: 11px;
    line-height:25px;
	height:25px;
    bottom: 41px;
    width: 160px;
	opacity: 0.7;
}
.imagelist li span a.actbut{
	float:left;
	width:24px; 
	height:24px; 
	margin-top:3px;
}
.uploadify-bg{
	background-color:#fff;
	box-shadow:0px 0px 20px -2px rgba(0, 0, 0, 0.5);
}
</style>

</head>

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
    <div id="mainbody">
        <aside class="left_nav">
            <div class="nav">
                <ul>
                    <li id="allfile" class="choosed" onClick="window.location.href='<?php echo U('Index/index');?>'">全部文件</li>
                    <li id="pic" onClick="window.location.href='<?php echo U('Pic/index');?>'">图片</li>
                    <li id="doc" onClick="window.location.href='<?php echo U('Doc/index');?>'">文档</li>
                    <li id="mov" onClick="window.location.href='<?php echo U('Mov/index');?>'">视频</li>
                    <li id="bt" onClick="window.location.href='<?php echo U('Bt/index');?>'">种子</li>
                    <li id="musi" onClick="window.location.href='<?php echo U('Musi/index');?>'">音乐</li>
                    <li id="other" onClick="window.location.href='<?php echo U('Other/index');?>'">其他</li>
                    <p class="line"></p>
                    <li id="myshare" onClick="window.location.href='#'">我的分享</li>
                    <p class="line"></p>
                    <li id="recycle" onClick="window.location.href='#'">回收站</li>
                </ul>
            </div>
            <div class="clientDownload">
                <span class="box pc"></span>
                <span class="box android"></span>
                <span class="box iphone"></span>
                <span class="client client_pc">PC</span>
                <span class="client client_android">Android</span>
                <span class="client client_iphone">Iphone</span>
            </div>
            <div class="footer">
            	<span style="margin:40px 5px 0 10px; float: left;">容量:</span>
            	<div class="capacity"><span></span>
                </div>
                <div class="use">
                    <?php if(is_array($space)): $i = 0; $__LIST__ = $space;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$space): $mod = ($i % 2 );++$i;?><input id="spaceValue" value="<?php echo ($space["space"]); ?>" type="hidden"/>
                    <div id="showSpace"></div><div id="totalSpace">/1G</div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </aside>
    
    <div class="right_list">
        <div class="right_top" id="right_top">
            <button class="pure-button pure-button-secondary" onClick="window.location.href='<?php echo U('Uploadify/Index');?>'"><i class="icon-cog"></i>上传文件</button>
        </div>
        <table class="table table-hover" style="margin-top: 52px;">
            <thead>
                <tr id="list_title" valign="middle">
                    <th width="2%"><input type="checkbox" id="allcheked" onClick="checkall()"/></th>
                    <th width="70%" height="30px" id="select">文件夹</th>
                    <th width="13%">大小</th>
                    <th width="15%">修改日期</th>
                </tr> 
            </thead>
        </table>
         <div class="right_body">
        
            
            <div class="data_grid" style=" width:95%;float:left;padding:10px 20px 20px">
                <div class="even">
                    <h5 style="float:left">文件上传：</h5>
                    <div style="width:150px; float:left; margin-top:15px;">
                    
                    <a style="float:right" id="upload"></a>
                    </div>
                    <div id="progress" style="margin-top:20px; float:left;"></div>
                </div>
                <div style="clear:both"></div>
                <div style=" margin-left:30px;">
                    <p>
						<ul class="imagelist" id="image_result"></ul>
                    </p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div style="margin-left:50px;">
            <button class="pure-button pure-button-secondary" onclick="window.location.href='<?php echo U('Index/index');?>'">显示所有文件</button>
            <button class="pure-button pure-button-secondary pure-button-xsmall" id="button" style="position:fixed; bottom:20px; right:0px; display:none">↓</button>
            <button class="pure-button pure-button-secondary pure-button-xsmall" id="close" onclick="closelist()" style="position:fixed; bottom:0px; right:0px;display:none">×</button>
            </div>

        </div>
    </div>
</div>
</div>
</body>
</html>