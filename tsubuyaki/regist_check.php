<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<h1>確認画面</h1>

<?php

$user_id=$_POST['id'];
$user_pass1=$_POST['pass1'];
$user_pass2=$_POST['pass2'];

$user_id= htmlspecialchars($user_id);
$user_pass1= htmlspecialchars($user_pass1);
$user_pass2= htmlspecialchars($user_pass2);

if($user_id == '') {

	print'IDが入力されていません。<br />';

} else {

	print'ユーザー名:';
	print $user_id;
	print'<br />';
}

if($user_pass1=='') {

	print'パスワードが入力されていません。<br />';
}

if($user_pass1!=$user_pass2) {

	print'パスワードが一致しません。<br />';

} 

if($user_id=='' || $user_pass1=='' || $user_pass1!=$user_pass2) {

	print'<form>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'</form>';

}

else {

	//$user_pass1=md5($user_pass1);
	print'<form method="post" action="regist_done.php">';
	print'<input type="hidden" name="id" value="'.$user_id.'">';
	print'<input type="hidden" name="pass" value="'.$user_pass1.'">';
	print'<br />';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'<input type="submit" value="OK">';
	print'</form>';
}

	

?>

</body>
</html>
