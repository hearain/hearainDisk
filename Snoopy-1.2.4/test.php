<?php
include "Snoopy.class.php";
 $url = "http://music.douban.com/subject_search?search_text=曹操&cat=1003";
 $snoopy = new Snoopy;
 $snoopy->fetch($url); //获取所有内容
 echo $snoopy->results; //显示结果
 //可选以下

?>