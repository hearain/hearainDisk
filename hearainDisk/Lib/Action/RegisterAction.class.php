<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 */
 
class RegisterAction extends Action {
    public function index(){
		$this->display();
	}
	
	public function register(){
		$username = $this->_get('loginname');//从前端获取用户名密码
		$pwd = $this->_get('passwd');		
		$user = M('Login');
		$data['user_name'] = $username;
		$data['pwd'] = $pwd;
		$state = $user->add($data);
		//$this->ajaxReturn($data);
		if($state==false)
			echo "false";
		else{
			session('loginname',$username);//成功后设置session
			$path = $_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$username;
			$pic = $_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$username."/pic";
			$doc = $_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$username."/doc";
			$video = $_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$username."/video";
			$bt = $_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$username."/bt";
			$others = $_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$username."/other";
			mkdir($path,0777);
			mkdir($pic,0777);
			mkdir($doc,0777);
			mkdir($video,0777);
			mkdir($bt,0777);
			mkdir($others,0777);
			echo "true";
		}
	}
}