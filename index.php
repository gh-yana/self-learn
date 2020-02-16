<?php
//--------件名
define("SUBJECT","PHP入門サンプル置き場からのメール");
//--------受け取りメアド
define("MAILTO","*****@***.***");
//--------文字コード　
define("CODE","SJIS");
//--------ホームURL　
$homeurl='http://rx78.mods.jp/php_sample/';
//--------入力チェック
function check(){
　global $_POST;
　//if($_POST['name']==""){ error("名前が入力されていません。");}
　if(!$_POST['mailadd']){ error("メールアドレスが入力されていません。");}
　if($_POST['contents']==""){ error("内容が入力されていません。");}
}
//--------メール送信
function sendmail(){
　global $_POST;
　$agent = getenv("HTTP_USER_AGENT");
　$host = getenv("REMOTE_HOST");
　$addr = getenv("REMOTE_ADDR");
　if($host=="" || $host==$addr){ $host = @gethostbyaddr($addr);}
　$date = gmdate("Y/m/d H:i:s (D)",time()+9-60-60);

$mailbody = <<<EOM
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
■PHP入門サンプル置き場からのメール
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
□送信者氏名：${_POST['name']}
□E-mail：${_POST['mailadd']}
□内容：
${_POST['contents']}
----------------------------------------------------------
投稿時間：$date
投稿者のIPアドレス：$addr
投稿者のホスト名：$host
投稿者のブラウザ：$agent
----------------------------------------------------------
EOM;
　mb_language("Ja");
　mb_internal_encoding(CODE);
　$sub = mb_convert_encoding(SUBJECT,CODE);
　$headers ="From: ".$_POST['mailadd']."\r\n";
　//$mailbody = stripslashes($mailbody);
　$rcode = @mb_send_mail(MAILTO,$sub,$mailbody,$headers);
　if(!$rcode){ error("メール送信エラー");}
}

//--------最後のメッセージ
function finish_html(){
echo <<<EOM
<html>
<head>
<title>メールを送信しました</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel="stylesheet" href="mailform.css" type="text/css">
</head>
<body>
<table width="550" height="350" border="0" cellpadding="5">
<tr> 
<td bgcolor="#eeeeee" class="txt12" height="300"> 
<div align="center">
<b>メールを送信ました。ありがとうございました。</b></div>
</td>
</tr>
<tr>
<td height="50"> 
<div align="center"> <a href="javascript:window.close();">
<img src="closebtn.gif" width="77" height="30" border="0"></a> 
</div>
</td>
</tr>
</table>
</body>
</html>
EOM;
}
//--------エラー処理
function error($msg){
echo <<<EOM
<html>
<head>
<title>エラー</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<link rel="stylesheet" href="mailform.css" type="text/css">
</head>
<body>
<table width="550" height="300" border="0" cellpadding="5">
<tr> 
<td bgcolor="#eeeeee" class="txt12">
<div align="center">
<b><font color="#FF0000">$msg</font></b></div>
<div align="center">
<p><a href="javascript:history.back();"><<戻る</a></p>
</div>
</td>
</tr>
</table>
</body>
</html>
EOM;
exit();
}
//--------メイン処理
if ($_POST['submit']) {
	check();
	sendmail();
	finish_html();
}
?>
</body>
</html>
