<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_POST['from_mypage'])) {
    header("Location:login_error.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="mypage_edit.css">
<title>会員マイページ</title>
</head>
<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="logout"><a href="login.php">ログアウト</a></div>
  </header>

  <main>
    <form action="mypage_update.php" method="post">  
      <div class="mypage_contents">
        <h2>会員情報</h2>
        <div class="hello_name">こんにちは!<?php echo $_SESSION['nm'];?>さん！</div>
        <div class="info_center">
          <div class="mypicture"><img src="<?php echo $_SESSION['pic'];?>"></div>
          <div class="myinfo">
            <ul>
              <li>氏名：<input type="text" value="<?php echo $_SESSION['nm'];?>" name="name"></li>
              <li>メールアドレス：<input type="text" value="<?php echo $_SESSION['email'];?>" name="email"></li>
              <li>パスワード：<input type="text" value="<?php echo $_SESSION['pass'];?>" name="password"></li>
            </ul>
          </div>
        </div>
        <div class="mycomments"><textarea name="comments" cols="80" rows="5" value="<?php echo $_SESSION['com'];?>" name="comments"></textarea></div>
        <div class="edit_mypage"><input type="submit" class="button" value="この内容に変更" ></div>
      </div>
    </form>
      
  </main>

  <footer>
    <p>© 2018 Internous.inc All rights reserved</p>
  </footer>

</body>
</html>
