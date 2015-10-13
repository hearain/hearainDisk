<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 */
 
class IndexAction extends Action {
    public function index(){
		if(session('loginname')){//判断用户是否登录
			$uer_name = session('loginname');
			$this->assign('name',$uer_name);//输出主页面当前登录用户
			$files = M();
			$space = $files->query("select sum(file_size) as space from disk_files where user_name='$uer_name'");
			$this->assign('space',$space);//输出主页面当前登录用户已使用的空间大小
			$this->display();
		}
		else
			redirect(U('Login/index'));
		//$content = $this->preview_text();
		//$this->assign('content',$content);
		//echo session('loginname');
    }
	
	public function files(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name'")->order('time')->select();
		$this->ajaxReturn($data);
	}
	
	public function pic(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name' AND (type='jpg' OR type='png' OR type='gif')")->order('time')->select();
		$this->ajaxReturn($data);		
	}
	public function doc(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name' AND (type='doc' OR type='txt')")->order('time')->select();
		$this->ajaxReturn($data);		
	}
	public function mov(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name' AND (type='avi' OR type='mp4' OR type='rmvb' OR type='mov' OR type='wmv' OR type='3gp' OR type='flv')")->order('time')->select();
		$this->ajaxReturn($data);		
	}	
	public function bt(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name' AND type='torrent'")->order('time')->select();
		$this->ajaxReturn($data);		
	}
	public function musi(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name' AND (type='mp3' OR type='wma' OR type='aac')")->order('time')->select();
		$this->ajaxReturn($data);		
	}
	public function other(){
		$files = M('Files');
		$uer_name = session('loginname');	
		$data = $files->where("user_name='$uer_name' AND type!='doc' AND type!='txt' AND type!='jpg' AND type!='png' AND type!='gif' AND type!='torrent' AND type!='mp3' AND type!='wma' AND type!='aac' AND type!='avi' AND type!='mp4' AND type!='rmvb' AND type!='mov' AND type!='wmv' AND type!='3gp' AND type!='flv'")->order('time')->select();
		$this->ajaxReturn($data);		
	}	
	public function preview_text(){
		$file_name=$this->_get('file_Path');//get方法获取前台数据
		//$filepath = trim($_SERVER['DOCUMENT_ROOT']."/Public/Upload/529c455e8bda5.txt");
		$filepath = trim($_SERVER['DOCUMENT_ROOT'].$file_name);
		$content=file_get_contents($filepath);
		$content = iconv("gb2312", "utf-8//IGNORE",$content);//编码转换
		//$this->ajaxReturn($data);
		echo htmlspecialchars($content);//防止浏览器解析文档中的html标签
	}
	
	public function preview_zip(){
    	Vendor('Pclzip.pclzip');
		$file_name = $this->_get('file_Path');//get方法获取前台数据
		$filepath = trim($_SERVER['DOCUMENT_ROOT'].$file_name);
        $zip = new PclZip($filepath);
        if (($list = $zip->listContent()) == 0) {
        die("Error : ".$zip->errorInfo(true));
        }
        for ($i=0; $i<sizeof($list); $i++) {
            for(reset($list[$i]); $key = key($list[$i]); next($list[$i])) {
				$data = "File $i / [$key] = ".$list[$i][$key]."<br />";
				$data = iconv("gb2312", "utf-8//IGNORE",$data);
                echo $data;
            }
        }	
	}
	
	public function get_musicCover(){
    	Vendor('HtmlDom.simple_html_dom');
		$musicname = $this->_get('musicname');
		$url = "http://www.xiami.com/search?key=".$musicname;//获取当前歌曲在虾米上的搜索列表
		$html = file_get_html($url);
		$detail = $html->find('table[class=track_list]',0);//获取第一个关联度最高的项
		//$img = $html->find('img',0);
		$detail_text = $detail->find('td[class=song_name]',0);
		$detail_text1 = $detail_text->find('a[target=_blank]',0);
		$detail_url = $detail_text1->href.'';//获取其链接地址
		$html_detail = file_get_html($detail_url);//进入歌曲详情页面
		$pic = $html_detail->find('img[class=cdCDcover185]',0);//获取歌曲封面图
		$pic_url = $pic->src.''; 
		$info = $html_detail->find('table[id=albums_info]',0);//获取歌曲信息
		$album = $info->find('a',0);
		$artist = $info->find('a',1);
		//echo $detail_url;
		echo $pic_url.','.$album.','.$artist;	
	}

	public function showfiles(){//这里是旧的处理方法，现已废弃
	$path=$_SERVER['DOCUMENT_ROOT']."/Public/Upload";//获取用户上传目录，此处目录名为动态获取当前登录用户名
	$path=str_replace("/","\\",$path); 
	//指定文件夹 
	$path=$path."\\"; 
	if($_GET['folder']) 
	{ 
	$path.=$_GET['folder']."\\"; 
	} 
	//本页面路径,下面传回时将用到; 
	$url=$_SERVER['PHP_SELF']; 
	//如果是文件夹,将加上链接; 
	function folder($path,$str) 
	{ 
	if(filetype($path.$str)=="dir") 
	{ 
	return "<a href=\"?folder=".$_GET['folder']."\\".$str."\">$str</a>"; 
	}else{ 
	return $str; 
	} 
	} 
	switch($_GET['action']) //遍历用户操作
	{ 
	case "del"; 
	if($_GET['type']=="file") 
	{ 
	unlink($_GET['path']); //删除文件
	}else{ 
	rmdir($_GET['path']); 
	} 
	echo "<script type=\"text/javascript\">alert('恭喜,删除成功!');location.href=\"".$url."\";</script>"; 
	break; 
	case "edit"; 
	if($_GET['type']=="file") //编辑文件，仅限文本文件
	{ 
	$file=fopen($_GET['path'],"r"); 
	while(!feof($file)) 
	{ 
	$result.=fgets($file,9999); 
	};
	fclose($file); 
	echo '<form name="form1" method="post" action="?action=editsave&path='.$_GET['path'].'&type='.$_GET['type'].'"> 
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC"> 
	<tr> 
	<td height="25" bgcolor="#99CC00">>><strong> 编辑文件</strong> > <a href="'.$url.'">返回</a></td> 
	</tr> 
	<tr> 
	<td height="25" align="left" bgcolor="#FFFFCC">->文件名:'.$_GET['path'].'</td> 
	</tr> 
	<tr> 
	<td align="center" bgcolor="#FFFFFF"><textarea name="textarea" cols="135" rows="20">'.$result.'</textarea></td> 
	</tr> 
	<tr> 
	<td align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交"> 
	<input type="reset" name="Submit2" value="重置"></td> 
	</tr> 
	</table> 
	</form>'; 
	}else{ 
	echo '<form name="form1" method="post" action="?action=dir_rename&path='.$_GET['path'].'&type='.$_GET['type'].'"> 
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC"> 
	<tr> 
	<td height="25" bgcolor="#99CC00">>><strong> 新建文件</strong> > <a href="'.$url.'">返回</a></td> 
	</tr> 
	<tr> 
	<td height="25" align="left" bgcolor="#FFFFCC">->文件夹更名: 
	<input name="filename" type="text" value="'.$_GET['path'].'" size="50"></td> 
	</tr> 
	<tr> 
	<td align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交"> 
	<input type="reset" name="Submit2" value="重置"></td> 
	</tr> 
	</table> 
	</form>'; 
	} 
	break; 
	case "editsave"; 
	$file=fopen($_GET['path'],"w"); 
	fwrite($file,$_POST['textarea']); 
	fclose($file); 
	echo "<script type=\"text/javascript\">alert('恭喜,编辑成功!');location.href=\"".$url."\";</script>"; 
	break; 
	case "addfile"; 
	echo '<form name="form1" method="post" action="?action=filesave&path='.$_GET['path'].'"> 
	<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC"> 
	<tr> 
	<td height="25" bgcolor="#99CC00">>><strong> 新建文件</strong> > <a href="'.$url.'">返回</a></td> 
	</tr> 
	<tr> 
	<td height="25" align="left" bgcolor="#FFFFCC">->文件名: 
	<input name="filename" type="text" value="'.$_GET['path'].'" size="50"></td> 
	</tr> 
	<tr> 
	<td align="center" bgcolor="#FFFFFF"><textarea name="textarea" cols="135" rows="20">输入内容 
	</textarea></td> 
	</tr> 
	<tr> 
	<td align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交"> 
	<input type="reset" name="Submit2" value="重置"></td> 
	</tr> 
	</table> 
	</form>'; 
	break; 
	case "filesave"; 
	//包含点则建立文件,否则建立文件夹 
	if(strpos($_POST['filename'],".")) 
	{ 
	$file=fopen($_POST['filename'],"w"); 
	fwrite($file,$_POST['textarea']); 
	fclose($file); 
	}else{ 
	//文件夹若存在则退出,不存在则建立! 
	if(file_exists($_POST['filename'])) 
	{ 
	exit; 
	}else{ 
	mkdir($_POST['filename']); 
	} 
	} 
	echo "<script type=\"text/javascript\">alert('恭喜,".$_POST['filename']."建立成功!');location.href=\"".$url."\";</script>"; 
	break; 
	case "dir_rename"; 
	rename($_GET['path'],$_POST['filename']); 
	echo "<script type=\"text/javascript\">alert('恭喜,".$_POST['filename']."改名成功!');location.href=\"".$url."\";</script>"; 
	break; 
	default: 
	$s=explode("\n",trim(`dir/b/o:gn $path`)); 
	echo '<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC"> 
	<tr> 
	<td height="25" colspan="4" bgcolor="#99CC00">>><strong> 文件管理</strong> > <a href="?action=addfile&path='.$path.'">建立文件</a> > <a href="http://127.0.0.1/">返回</a></td> 
	</tr> 
	<tr> 
	<td height="25" align="center" bgcolor="#FFFFCC">文件/文件夹</td> 
	<td align="center" bgcolor="#FFFFCC">文件属性</td> 
	<td align="center" bgcolor="#FFFFCC">文件大小</td> 
	<td align="center" bgcolor="#FFFFCC">操作</td> 
	</tr>'; 
	foreach($s as $value) 
	{ 
	echo ' 
	<tr> 
	<td height="25" bgcolor="#FFFFFF">'.folder($path,$value).'</td> 
	<td align="center" bgcolor="#FFFFFF">'.filetype($path.$value).'</td> 
	<td align="right" bgcolor="#FFFFFF">'.round(filesize($path.$value)/1024).'kb</td> 
	<td align="center" bgcolor="#FFFFFF"><a href="?action=edit&path='.$path.'\\'.$value.'&type='.filetype($path.$value).'">编辑</a> | <a href="?action=del&path='.$path.'\\'.$value.'&type='.filetype($path.$value).'" onClick="return confirm(\'确定删除->'.$value.'\');">删除</a> | <a href="/Public/Upload/'.$value.'">下载</a ></td> 
	</tr>'; 
	} 
	echo "</table>"; 
	break; 
	} 
	}
}