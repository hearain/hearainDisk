<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
	文档
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

<script src="/Static/js/jquery-ui-1.8.17.custom.min.js"></script>
<script>
var username="";
$(document).ready(function(){
		$("#myplayer").css("display","none");
		$("#myplayer").mouseover(function(){
			$("#button").css("display","block");
			$("#close").css("display","block");
		});       
		$("#myplayer").mouseout(function(){
			$("#button").css("display","none");
			$("#close").css("display","none");
		});
		$("#allfile").removeClass("choosed");
		$("#bt").addClass("choosed"); 
		ajax('<?php echo U("Index/bt");?>','json','',true,res.valuation);
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
                    //tipsWindown("text*异常");    
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
    var res={};
	var list=0;
	var fileinfo = [{    
					title: '',
					artist: '',
					album: '',
					cover: '',
					mp3: '',
					},
					];
    res.valuation=function(data){
		username = data[0].user_name;
		for (var i=0;i<data.length;i++){
		var file_size;
		if(data[i].file_size>=1024&&data[i].file_size<1048576){
			data[i].file_size=parseInt(data[i].file_size/1024);
			file_size=data[i].file_size+"KB";
		}
		else if(data[i].file_size>=1048576&&data[i].file_size<1073741824){
			data[i].file_size=parseInt(data[i].file_size/1048576);
			file_size=data[i].file_size+"MB";
		}
		else if(data[i].file_size>=1073741824){
			data[i].file_size=parseInt(data[i].file_size/1073741824);
			file_size=data[i].file_size+"GB";
		}
		else file_size=data[i].file_size+"B";
		var s='<tr onclick="checked('+i+')">';
		s+='<td width="2%"><input type="checkbox" name="items" id="check'+i+'"/><input type="hidden" id="file'+i+'" value="'+data[i].file_name+'"></td>';
		s+='<td width="70%" id="name'+i+'"><a href=javascript:preview("'+data[i].file_name+'","'+data[i].user_name+'","'+data[i].file_nickname.replace(/[ ]/g,"")+'") style="color:#000">'+data[i].file_nickname+'</a></td>';
		s+='<td width="13%"> '+file_size+'</td>';
		s+='<td width="15%"> '+data[i].time+'</td></tr>';
		$("#filelist").append(s);
		}
	}
	
	function checked(i){
		var inputs=document.getElementsByName("items");
		var checked_counts = 0;  
		$("#allcheked").attr("checked",false);
        if ($("#check"+i).attr("checked")) {
        	$("#check"+i).attr("checked", false);
			for(var n=0;n<inputs.length;n++){
			if(inputs[n].checked){
			checked_counts++;
			}
			}
			if(checked_counts==0){
				$("#select").html("文件夹");
			}else{
				$("#select").html("已选中<span>" + checked_counts + "</span>个文件/文件夹&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick=''>分享</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick='download()'>下载</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick='del()'>删除</button>");
			}
        } else {  
            $("#check"+i).attr("checked", true);
			for(var n=0;n<inputs.length;n++){
			if(inputs[n].checked){
			checked_counts++;
			}
			}
			$("#select").html("已选中<span>" + checked_counts + "</span>个文件/文件夹&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick=''>分享</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick='download()'>下载</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick='del()'>删除</button>");
		}
	}
	
	function checkall(){
		if ($("#allcheked").attr("checked")) {
			$("input[name=items]").each(function() {  
                $(this).attr("checked", true);
				$("#select").html("已选中所有文件/文件夹&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick=''>分享</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick='download()'>下载</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class='pure-button pure-button-small' onclick='del()'>删除</button>");
            });  		
		}else {  
            $("input[name=items]").each(function() {  
                $(this).attr("checked", false);  
				$("#select").html("文件夹");
            });  
        }  	
	}
	
	function del(){
		var inputs=document.getElementsByName("items");
		var checked_counts = 0; 
		var save_name = "";
		for(var n=0;n<inputs.length;n++){
			if(inputs[n].checked){
			checked_counts++;
			save_name += $("#file"+n).val()+",";
			}
			}
		//alert(save_name);
			if(confirm("您确认要删除该文件吗？")){        
				$.get('<?php echo U("Uploadify/del");?>', {file_name: save_name}, function() {
				//alert("删除成功！");
				location.reload();});
			}else{
				return false;
			}
	}
	
	function download(){
		//alert(document.getElementById("uer_name"));
		var inputs=document.getElementsByName("items");
		//var username=document.getElementById("uer_name").value;
		var checked_counts = 0; 
		var save_name = "";
		var singleFile = "";
		var nike_name ="";
		for(var n=0;n<inputs.length;n++){
			if(inputs[n].checked){
			checked_counts++;
			singleFile += $("#file"+n).val();
			nike_name += $("#name"+n).text();
			save_name += $("#file"+n).val()+",";
			}
			}
		if(checked_counts>1){
			$.get('<?php echo U("Download/download");?>', {file_name: save_name}, function() {
				window.location.href="__ROOT__/Public/Upload/"+username+"/package.zip";			
        });
		}
		else{
			var url="__ROOT__/Public/Upload/"+username+"/"+ singleFile;
			window.location.href="__TMPL__/download/file.php?url="+url+"&nikename="+nike_name;			
		}
	}
	
	function preview(filename,username,nickname){
		var infoarr = nickname.split("."); 
		var suffix = infoarr[infoarr.length-1];//文件后缀
		var musicname = infoarr[infoarr.length-2];//文件原始名称，不带后缀
		var savePath = "/Public/Upload/"+username+"/"+filename;//文件存储路径
		if(suffix=="jpg"||suffix=="png"||suffix=="gif"||suffix=="jpeg"){
			$('.modal-body').html('<img src="__ROOT__'+savePath+'" width="100%"/>')
			$('#preview').modal();
		}
		else if(suffix=="txt"){
			//$('.modal-body').html('<iframe src="__ROOT__/file.php?url='+filePath width="100%"></firame>')
			$.get('<?php echo U("Index/preview_text");?>', {file_Path: savePath}, function(data) {
				$('.modal-body').html(data);
				$('#preview').modal();
			});
		//window.location.href="__TMPL__/preview_text/preview_text.php?file_Path="+filePath;			
		}
		else if(suffix=="zip"||suffix=="rar"){
			$.get('<?php echo U("Index/preview_zip");?>', {file_Path: savePath}, function(data) {
				$('.modal-body').html(data);
				$('#preview').modal();
			});
		}
		else if(suffix=="mp3"){
			$.get('<?php echo U("Index/get_musicCover");?>', {musicname: musicname}, function(data) {
/*				$('.modal-body').html(data);
				$('#preview').modal();*/				
				var info = data.split(",");
				var cover = info[0];
				var album = info[1]
				var artist = info[2];
				fileinfo.title = musicname;
				fileinfo.artist = artist;
				fileinfo.album = album;
				fileinfo.cover = cover;
				fileinfo.mp3 = savePath;
				$( "#music" ).click();
				$( "#button" ).click();					
			});
		}
		else{
			return;
		}
	}

	function closelist(){
		$("#close").hide();
		$("#button").hide();
		$("#myplayer").css("display","none");
	}
	$(function() {
	function runEffect() {
		var selectedEffect = "clip";
		var options = {};
		$( "#myplayer" ).toggle( selectedEffect, options, 500 );
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

<link rel="stylesheet" href="/Static/css/stylesheets/style.css">
<style>
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
        
            


<!--fileList table begin-->    
    <table class="table table-hover">
        <tbody id="filelist" style="height:50%; overflow:auto">
    
        </tbody>
    </table>
    <button class="pure-button pure-button-secondary pure-button-xsmall" id="music" onclick="music()" style="display:none"></button>

<!--fileList table end-->
    
<!--music player begin-->
<div id="myplayer">   
	<!--<div id="background"></div>-->
	<div id="player">
		<div class="cover"></div>
		<div class="ctrl">
			<div class="tag">
				<strong>Title</strong>
				<span class="artist">Artist</span>
				<span class="album">Album</span>
			</div>
			<div class="control">
				<div class="left">
					<div class="rewind icon"></div>
					<div class="playback icon"></div>
					<div class="fastforward icon"></div>
				</div>
				<div class="volume right">
					<div class="mute icon left"></div>
					<div class="slider left">
						<div class="pace"></div>
					</div>
				</div>
			</div>
			<div class="schedule">
				<div class="slider">
					<div class="loaded"></div>
					<div class="pace"></div>
				</div>
				<div class="timer left">0:00</div>
				<div class="right">
					<div class="repeat icon"></div>
					<div class="shuffle icon"></div>
				</div>
			</div>
		</div>
	</div>
	<ul id="playlist"></ul>
    <button class="pure-button pure-button-secondary pure-button-xsmall" id="button" style="position:absolute; top:30px; right:-50px; display: none">↑</button>
    <button class="pure-button pure-button-secondary pure-button-xsmall" id="close" onclick="closelist()" style="position: absolute; top:0px; right:-50px;display:none">×</button> 
    <script src="/Static/js/script.js"></script>
    </div>
<!--music player end-->    

        </div>
    </div>
</div>
</div>
</body>
</html>