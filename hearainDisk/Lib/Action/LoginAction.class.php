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
		$username = $this->_get('loginname');//��ǰ�˻�ȡ�û�������
		$pwd = $this->_get('passwd');		
		$user = M('Login');
		$data = $user->where("user_name='$username' AND pwd='$pwd'")->find();//�������ݿ�
		//$this->ajaxReturn($data);
		if($data==NULL)
			echo "false";
		else
			session('loginname',$username);//�ɹ�������session
			echo "true";
	}
	public function ucenterlogin(){
		$username = $this->_get('loginname');//��ǰ�˻�ȡ�û�������
		$pwd = $this->_get('passwd');		
		$user = M('Login');
		$data = $user->where("user_name='admin' AND pwd='$pwd'")->find();//�������ݿ�
		//$this->ajaxReturn($data);
		if($data==NULL)
			echo "false";
		else
			session('loginname',$username);//�ɹ�������session
			echo "true";	
	}
    public function logout(){
        $loginname = session('loginname');
        session(null);//�˳������session
        $this->redirect("Login/index");
    }
}