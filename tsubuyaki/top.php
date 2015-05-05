<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false) {

        print'ログインされていません。<br />';
        print'<a href="index.html">ログイン画面へ</a>';
        exit();

} else {

        print $_SESSION['user_id'];
        print'さんログイン中<br />';
        print'<br />';
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<style type="text/css">

textarea {

	resize: none;
}

</style>

<?php

try {

$dsn = 'mysql:dbname=tsubuyaki;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT * FROM tsubuyaki_table WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]= $_SESSION['user_id'];
$stmt->execute($data);

$dbh =null;

while(true) {

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if($rec==false) {

		break;
	}

	print $rec['content'];
	print' ';
	print'<font size=1>';
	print $rec['date'];
	print'</font>';
	print'<br /><br />';

	}

} catch(Exception $e) {

	print'ただいま障害により大変ご迷惑をお掛けしております。<br />';
	exit();
}


?>

<form method="post" action="branch.php">
<textarea name="tsubuyaki" rows="5" cols="40" placeholder="200文字まで"></textarea><br />
<input type="submit" value="つぶやく">
</form>


<a href="logout.php">ログアウト</a><br />
</body>
</html>
