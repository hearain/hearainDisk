<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 * 批量下载模块
 */

class DownloadAction extends Action{
	public function download(){
    	Vendor('Pclzip.pclzip');
		$file_name=$this->_get('file_name');//get方法获取前台数据
		$uer_name = session('loginname');
		$file_path = trim($_SERVER['DOCUMENT_ROOT']."/Public/Upload/".$uer_name."/");
		$arr = split(",",$file_name);
		for($i=0;$i<count($arr)-1;$i++){
			$file=$file.trim($file_path.$arr[$i].",");
		}
        $archive = new PclZip($file_path.'package.zip');
        $v_list = $archive->create($file,PCLZIP_OPT_REMOVE_PATH, $file_path,
										PCLZIP_OPT_ADD_PATH, '');
        if ($v_list == 0) {
            die("Error : ".$archive->errorInfo(true));
        }
	}
}
