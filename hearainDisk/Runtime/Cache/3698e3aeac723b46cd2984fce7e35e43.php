<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="/Static/jquery.js"></script>
</head>
<body>
<div style="width:800px;height:520px; overflow:hidden; margin:0 auto">
    	<div style="width:300px; float:left">
            <div style="padding:10px 0;color:#666;">你现在的头像：</div>
            <div style="float:left; border:1px #ccc solid; text-align:center; margin-right:10px;padding:10px;">
                你的小头像
                <div style="clear:both"></div>
                <img src="<?php echo ($small); ?>" />
            </div>
            <div style="float:left;border:1px #ccc solid;text-align:center;padding:10px;">
                你的大头像
                <div style="clear:both"></div>
                <img src="<?php echo ($big); ?>" />
            </div>
        </div>
        <div style="width:500px; float:right">
            <div style="padding:10px 0;color:#666;">       
				
            </div>
            <form enctype="multipart/form-data" method="post" id="upform" name="upform" target="upload_target" action="<?php echo U("Upload/Avatar");?>">
                <span class="UploadButton">
                    <a href="javascript:void(0);">
                    <input onchange="upload_start()" style="" type="file" id="Filedata"  name="Filedata" />
                    </a>
                </span>
                <input style="margin-left:10px;" type="button" onclick="useCamera()" value="使用摄像头">
                <span style="visibility:hidden;" id="loading_gif">上传中，请稍侯......</span>
            </form>
            <iframe src="about:blank" name="upload_target" style="display:none;"></iframe>
            <div id="avatar_editor"></div>
            <script type="text/javascript">
            //允许上传的图片类型
            var extensions = 'jpg,jpeg,gif,png';
            //保存缩略图的地址.
            var saveUrl = '<?php echo U("Upload/Avatar",array("do"=>"save"));?>';
            //保存摄象头白摄图片的地址.
            var cameraPostUrl = '/Static/Avatar/camera.php';
            //头像编辑器flash的地址.
            var editorFlaPath = '/Static/Avatar/AvatarEditor.swf';
    
            function useCamera(){
                var content = '<embed height="464" width="514" ';
                content +='flashvars="type=camera';
                content +='&postUrl='+cameraPostUrl+'?&radom=1';
                content += '&saveUrl='+saveUrl+'?radom=1" ';
                content +='pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" ';
                content +='allowscriptaccess="always" quality="high" ';
                content +='src="'+editorFlaPath+'"/>';
                document.getElementById('avatar_editor').innerHTML = content;
            }
            function buildAvatarEditor(pic_id,pic_path,post_type){
                var content = '<embed height="464" width="514"'; 
                content+='flashvars="type='+post_type;
                content+='&photoUrl='+pic_path;
                content+='&photoId='+pic_id;
                content+='&postUrl='+cameraPostUrl+'?&radom=1';
                content+='&saveUrl='+saveUrl+'?radom=1"';
                content+=' pluginspage="http://www.macromedia.com/go/getflashplayer"';
                content+=' type="application/x-shockwave-flash"';
                content+=' allowscriptaccess="always" quality="high" src="'+editorFlaPath+'"/>';
                document.getElementById('avatar_editor').innerHTML = content;
            }
			function noCamera(){
				 alert("你没有camare ：）");
			}
			function avatarSaved(data){
				alert(data);
				window.location.href='<?php echo U("Upload/Index");?>';
				//parent.location.reload();
			}
			function avatarError(msg){
				 alert("上传失败");
			}
			function checkFile(){
				 var path = document.getElementById('Filedata').value;
				 var ext = getExt(path);
				 var re = new RegExp("(^|\\s|,)" + ext + "($|\\s|,)", "ig");
				  if(extensions != '' && (re.exec(extensions) == null || ext == '')) {
				 alert('对不起，只能上传jpg, gif, png类型的图片');
				 return false;
				 }
				 showLoading();
				 return true;
			}

			function getExt(path) {
				return path.lastIndexOf('.') == -1 ? '' : path.substr(path.lastIndexOf('.') + 1, path.length).toLowerCase();
			}
			function showLoading(){
				document.getElementById('loading_gif').style.visibility = 'visible';
			}
			function hideLoading(){
				document.getElementById('loading_gif').style.visibility = 'hidden';
			}
			function close_but(){
				//$('#Filedata').attr('disabled','disabled');
			}
			function upload_start(){
				checkFile();
				$('form[name="upform"]').submit();
			}
            </script>
        </div>
        <div style="clear:both"></div>
</div>