<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 */
 
class LoginAction extends Action {
    public function index(){
		$this->display();
		//echo "asdfwef";
	}
	
	public function login(){
		$username = $this->_get('loginname');//从前端获取用户名密码
		$pwd = $this->_get('passwd');		
		$user = M('Login');
		$data = $user->where("user_name='$username' AND pwd='$pwd'")->find();//检索数据库
		//$this->ajaxReturn($data);
		if($data==NULL)
			echo "false";
		else
			session('loginname',$username);//成功后设置session
			echo "true";
	}
	public function ucenterlogin(){
		$username = $this->_get('loginname');//从前端获取用户名密码
		$pwd = $this->_get('passwd');		
		$user = M('Login');
		$data = $user->where("user_name='admin' AND pwd='$pwd'")->find();//检索数据库
		//$this->ajaxReturn($data);
		if($data==NULL)
			echo "false";
		else
			session('loginname',$username);//成功后设置session
			echo "true";	
	}
    public function logout(){
        $loginname = session('loginname');
        session(null);//退出后清除session
        $this->redirect("Login/index");
    }
}