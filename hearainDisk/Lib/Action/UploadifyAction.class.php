<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 */

class UploadifyAction extends Action{
	public function index(){
		if(session('loginname')){//判断用户是否登录
			$uer_name = session('loginname');	
			$this->assign('name',$uer_name);//输出主页面当前登录用户
			$this->display();
		}
		else
			redirect(U('Login/index'));
	}
	
	public function upload(){
		$uer_name = session('loginname');
        if (!empty($_FILES)) {
            import('ORG.Net.UploadFile');
            import("ORG.Util.Image");           
			$upload = new UploadFile(); // 实例化上传类
            $upload->maxSize = '102400000000000000000'; // 设置附件上传大小
            $upload->saveRule = 'uniqid';
			$upload->uploadReplace = true;
            $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg','rar','zip','doc','docx','txt','mp3','exe'); // 设置附件上传类型
            $upload->savePath = './Public/Upload/'.$uer_name.'/'; // 设置附件上传目录
            if (!$upload->upload()) { // 上传错误提示错误信息
				$error['message'] = $upload->getErrorMsg();
                $error['status'] = 0;
				/*echo '<script type="text/javascript">alert("'.$error['message'].'");</script>';*/
			    echo json_encode($error);
                exit;
            } else {
                // 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
                $info[0]['file'] = trim($info[0]['savepath'].$info[0]['savename'],'.');
                echo json_encode($info[0]);
				/*echo '<script>parent.set('.json_encode($info[0]).')</script>';*/
            }
			$file_ext = substr(strrchr($info[0]['name'], '.'), 1);//截取文件扩展名
			$file = M("Files"); // 实例化file对象
			$data['file_name'] = $info[0]['savename'];
			$data['file_nickname'] = $info[0]['name'];
			$data['type'] = $file_ext;
			$data['time'] = date('Y-m-d H:i:s',time());
			$data['public'] = 0;
			$data['user_name'] = $uer_name;
			$data['file_size'] = $info[0]['size'];
			$data['md5'] = md5_file($_SERVER['DOCUMENT_ROOT'].$info[0]['file']);
			$file->add($data); // 写入用户数据到数据库
			exit;
        }
	}
	
	public function del(){
			$file_name=$this->_get('file_name');//get方法获取前台数据
			$arr = split(",",$file_name);
			$uer_name = session('loginname');
			//$file_path=$this->_get('file_path');
			for($i=0;$i<count($arr);$i++){
				$file_path=trim("/Public/Upload/".$uer_name.'/'.$arr[$i]);
				unlink($_SERVER['DOCUMENT_ROOT'].$file_path);//删除文件
		    	$file = M("Files"); // 实例化file对象
    			$file->where("file_name='$arr[$i]'")->delete(); // 删除file_name为用户当前点击文件的文件名
			}
}
}