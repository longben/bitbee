<?php
//截短字符串
function cutStr($string, $length) {
   $strcut = '';
   $strLength = 0;
   if(strlen($string) > $length) {
       //将$length换算成实际UTF8格式编码下字符串的长度
       for($i = 0; $i < $length; $i++) {
           if ( $strLength >= strlen($string) )
               break;
           //当检测到一个中文字符时
           if( ord($string[$strLength]) > 127 )
               $strLength += 3;
           else
               $strLength += 1;
       }
       return substr($string, 0, $strLength);
   } else {
       return $string;
   }
}

//清除HTML代码、空格、回车换行符
function deleteHtml($str) {
	$str = trim($str);
	$str = strip_tags($str,"");
	$str = ereg_replace("\t","",$str);
	$str = ereg_replace("\r\n","",$str);
	$str = ereg_replace("\r","",$str);
	$str = ereg_replace("\n","",$str);
	$str = ereg_replace(" "," ",$str);
	return trim($str);
}

?>