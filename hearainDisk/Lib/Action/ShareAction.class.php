<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 */
 
class ShareAction extends Action {
    public function index(){
		$method = $_GET['method'];
		$singleFile = $_GET['singleFile'];
		$uer_name = $_GET['user'];
		$nike = $_GET['nike'];
		if($method==0){//�����Ƕ�ȡ�����ļ��Ĵ�С��Ϊ�˼�����������ֱ�Ӷ�ȡ�ļ���С�������Ƕ�ȡ���ݿ����ݣ�methodΪ0�ǵ����ļ�����1Ϊ��������
			$file_path=trim($_SERVER['DOCUMENT_ROOT']."Public/Upload/".$uer_name."/".$singleFile);
			$filesize = abs(filesize($file_path));
			if($filesize>=1024&&$filesize<1048576){//��λת��
				$filesize=floor($filesize/1024);//������ȥ������С���������
				$changerSize=$filesize."KB";
			}
			else if($filesize>=1048576&&$filesize<1073741824){
				$filesize=floor($filesize/1048576);
				$changerSize=$filesize."MB";
			}
			else if($filesize>=1073741824){
				$filesize=floor($filesize/1073741824);
				$changerSize=$filesize."GB";
			}
			else $changerSize=$filesize."B";
		}
		else if($method==1){
			$file_path=trim($_SERVER['DOCUMENT_ROOT']."Public/Upload/".$uer_name."/package.zip");
			$filesize = abs(filesize($file_path));
			if($filesize>=1024&&$filesize<1048576){
				$filesize=floor($filesize/1024);
				$changerSize=$filesize."KB";
			}
			else if($filesize>=1048576&&$filesize<1073741824){
				$filesize=floor($filesize/1048576);
				$changerSize=$filesize."MB";
			}
			else if($filesize>=1073741824){
				$filesize=floor($filesize/1073741824);
				$changerSize=$filesize."GB";
			}
			else $changerSize=$filesize."B";
		}
		$this->assign('method',$method);
		$this->assign('user',$uer_name);
		$this->assign('nike',$nike);
		$this->assign('singleFile',$singleFile);
		$this->assign('fileSize',$changerSize);
		$this->display();
    }
}
