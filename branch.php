<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {

        print'ログインされていません。<br />';
        print'<a href="index.html">ログイン画面へ</a>';
        exit();
}

$date = getdate();

$space = ' ';
$nen = '-';
$gatsu = '-';
$ten = ':';

$today = $date['year'].$nen.$date['mon'].$gatsu.$date['mday'].$space.$date['hours'].$ten.$date['minutes'].$ten.$date['seconds'];

try {

	$dsn = 'mysql:dbname=tsubuyaki;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	$sql = 'INSERT INTO tsubuyaki_table(id,content,date) VALUES(?,?,?)';
	$stmt = $dbh->prepare($sql);
	$data[]= $_SESSION['user_id'];
	$data[]= $_POST['tsubuyaki'];
	$data[]= $today;
	$stmt->execute($data);

	$dbh =null;

	header('Location: top.php');

} catch(Exception $e) {

	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();

}






?>
