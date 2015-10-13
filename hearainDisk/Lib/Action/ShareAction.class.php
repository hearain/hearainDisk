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
		if($method==0){//这里是读取分享文件的大小，为了兼容批量分享，直接读取文件大小，而并非读取数据库数据，method为0是单个文件分享，1为批量分享
			$file_path=trim($_SERVER['DOCUMENT_ROOT']."Public/Upload/".$uer_name."/".$singleFile);
			$filesize = abs(filesize($file_path));
			if($filesize>=1024&&$filesize<1048576){//单位转换
				$filesize=floor($filesize/1024);//采用舍去法，大小会有所误差
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
