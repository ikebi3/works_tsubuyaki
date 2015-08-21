<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<?php

$date = getdate();

$space = ' ';
$nen = '-';
$gatsu = '-';
$ten = ':';

$today = $date['year'].$nen.$date['mon'].$gatsu.$date['mday'].$space.$date['hours'].$ten.$date['minutes'].$ten.$date['seconds'];

try {

	$user_id = $_POST['id'];
	$user_pass = $_POST['pass'];

	$user_id = htmlspecialchars($user_id);
	$user_pass = htmlspecialchars($user_pass);

	$dsn = 'mysql:dbname=tsubuyaki;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh-> query('SET NAMES utf8');

	$sql = 'INSERT INTO user_table(id,password,date) VALUES(?,?,?)';
	$stmt = $dbh -> prepare($sql);
	$data[] = $user_id;
	$data[] = $user_pass;
	$data[] = $today;
	$stmt->execute($data);
	$dbh = null;

	print $user_id;
	print'さんを登録しました。<br />';
	print'ログインできない場合はidを変えて再度ご登録下さい。<br />';

} catch (Exception $e) {

	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="index.html">戻る</a>

</body>
</html>
