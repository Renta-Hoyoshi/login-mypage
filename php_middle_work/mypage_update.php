<?php
mb_internal_encoding("utf8");
session_start();

try {
    $pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","");
} catch (PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}

$stmt = $pdo -> prepare("update login_mypage set name=?,email=?,password=?,comments=? where id = ?");

$stmt -> bindValue(1,$_POST['name']);
$stmt -> bindValue(2,$_POST['email']);
$stmt -> bindValue(3,$_POST['password']);
$stmt -> bindValue(4,$_POST['comments']);
$stmt -> bindValue(5,$_SESSION['id']);

$stmt -> execute();

$stmt = $pdo -> prepare("select * from login_mypage where name=? && email=? && password=? && comments=?");

$stmt -> bindValue(1,$_POST['name']);
$stmt -> bindValue(2,$_POST['email']);
$stmt -> bindValue(3,$_POST['password']);
$stmt -> bindValue(4,$_POST['comments']);

$stmt -> execute();

$pdo = NULL;

while ($row = $stmt -> fetch()){
    
    $_SESSION['nm'] = $row['name'];
    $_SESSION['mail'] =  $row['email'];
    $_SESSION['pass'] = $row['password'];
    $_SESSION['com'] = $row['comments'];
}

header("Location:mypage.php");

?>

