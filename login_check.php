<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php

try {

	$user_id = $_POST['id'];
	$user_pass = $_POST['pass'];

	$user_id = htmlspecialchars($user_id);
	$user_pass = htmlspecialchars($user_pass);

	//$user_pass= md5($user_pass);

	$dsn = 'mysql:dbname=tsubuyaki;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	$sql = 'SELECT id FROM user_table WHERE id=? AND password=?';
	$stmt = $dbh->prepare($sql);
	$data[]=$user_id;
	$data[]=$user_pass;
	$stmt->execute($data);

	$dbh = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if($rec == false) {

		print'IDかパスワードが間違っています。<br />';
		print'<a href="index.html">戻る</a>';
	} else {

		session_start();
		$_SESSION['login']=1;
		$_SESSION['user_id']=$user_id;
		header('Location: top.php');
	}

} catch(Exception $e) {

	print'ただいま障害ににより大変ご迷惑をお掛けしております。';
	exit();

}

?>

</body>
</html>
