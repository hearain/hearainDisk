<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 */
 
class DocAction extends Action {
    public function index(){
		if(session('loginname')){//判断用户是否登录
			$uer_name = session('loginname');	
			$this->assign('name',$uer_name);//输出主页面当前登录用户
			$this->display();
		}
		else
			redirect(U('Login/index'));
		//$content = $this->preview_text();
		//$this->assign('content',$content);
		//echo session('loginname');
    }
}