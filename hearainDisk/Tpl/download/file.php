<?php
/**
 * @author hearain <773724757@qq.com>
 * @copyright hearain
 * 单文件下载模块
 */
 	//echo $filename = $_SERVER['DOCUMENT_ROOT'] . "/Public/Upload/5295ab6dbc528.jpg";
	$file_nikename = $_GET['nikename'];
	$file_url = $_GET['url'];
	$file_path = $_SERVER['DOCUMENT_ROOT'].$file_url;
	if(!file_exists($file_path)){
	echo "文件不存在!";
	return;
	}
	$fp=fopen($file_path,"r");
	$file_size=filesize($file_path);
	header("Content-type: application/octet-stream");
	header("Accept-Ranges: bytes");
	header("Accept-Length: $file_size");
	header("Content-Disposition: attachment; filename=".$file_nikename); $buffer=1024;
	while(!feof($fp)){
	$file_data=fread($fp,$buffer);
	echo $file_data; }
	fclose($fp);
?>
