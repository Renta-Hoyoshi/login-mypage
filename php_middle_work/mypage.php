<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])) {

try{
    //try catch文。DBに接続できなければエラーメッセージを表示
    $pdo = new PDO("mysql:dbname=lesson1;host=localhost;","root","");
} catch(PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
    );
}


//prepared statementでSQL文を作る（DBとpostデータを照合させる。select文とwhere句を使用。
 $stmt = $pdo -> prepare("select * from login_mypage where email=? && password=? ");

//bindValueメソッドでパラメータをセット


$stmt -> bindValue(1,$_POST['email']);
$stmt -> bindValue(2,$_POST['password']);


//executeでクエリを実行

$stmt -> execute();

//DBを切断
$pdo = NULL;

//fetch・while文でデータを取得し、sessionへ代入
while($row = $stmt -> fetch()) {
    $_SESSION['id'] =  $row['id'];
    $_SESSION['nm'] = $row['name'];
    $_SESSION['email'] =  $row['email'];
    $_SESSION['pass'] = $row['password'];
    $_SESSION['pic'] =  $row['picture'];
    $_SESSION['com'] = $row['comments'];
}

//データが取得できずに、（emptyを使用して特定）sessionがなければ、リダイレクト（エラー画面へ）
if(empty($_SESSION['id'])) {
    header("Location:login_error.php");
}

if(!empty($_POST['login_keep'])) {
    $_SESSION['login_keep'] = $_POST['login_keep'];
}
}


//ログインに成功している且つ、$_SEESION['login_keep']が空ではない場合（チェックを入れている場合）、Cookieにデータを保存する。
if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
    setcookie('email',$_SESSION['email'],time()+60*60*24*7);
    setcookie('pass',$_SESSION['pass'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
//$_SESSION['login_keep']が空の場合、Cokkieからデータを削除できる
} elseif (empty($_SESSION['login_keep'])){
    setcookie('email','',time()-1);
    setcookie('pass','',time()-1);
    setcookie('login_keep','',time()-1);   
}
?>




<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="mypage.css">
<title>会員マイページ</title>
</head>
<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="logout"><a href="logout.php">ログアウト</a></div>
  </header>

  <main>
      
    
      <div class="mypage_contents">
        <h2>会員情報</h2>
        <div class="hello_name">こんにちは！<?php echo $_SESSION['nm'];?>さん！</div>
        <div class="info_center">
          <div class="mypicture"><img src="<?php echo $_SESSION['pic'];?>"></div>
          <div class="myinfo">
            <ul>
              <li>氏名：<?php echo $_SESSION['nm'];?></li>
              <li>メールアドレス：<?php echo $_SESSION['email'];?></li>
              <li>パスワード：<?php echo $_SESSION['pass'];?></li>
            </ul>
          </div>
        </div>
        <div class="mycomments"><?php echo $_SESSION['com'];?></div>
        <!--randによって、乱数を用い、その乱数をpost通信で、mypage_edit.phpで取得できるようにする-->
        <form action="mypage_edit.php" method="post" class="form_center">
        <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
        <div class="edit_mypage">
            <input type="submit" class="button" value="編集する" >
        </div>
        </form>  
      </div>
      

      
  </main>

  <footer>
    <p>© 2018 Internous.inc All rights reserved</p>
  </footer>

</body>
</html>
