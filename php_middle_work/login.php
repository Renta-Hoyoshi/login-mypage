<?php
session_start();
if(isset($_SESSION['id'])) {
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="login.css">
<title>会員ログイン</title>
</head>
<body>

  <header>
    <img src="4eachblog_logo.jpg">
  </header>
  
  <main>
    <form action="mypage.php" method="post">
      <div class="login_contents">
        <div class="email">
          <p>メールアドレス</p>
          <input type="text" class="loginbox" name="email" value="<?php if(!empty($_COOKIE['email'])){echo $_COOKIE['email'];}?>">
        </div>
        <div class="password">
          <p>パスワード</p>
          <input type="password" class="loginbox" name="password" value="<?php if(!empty($_COOKIE['pass'])) {echo $_COOKIE['pass'];}?>" >
        </div>
        <div class="hold_login">
          <p><input type="checkbox" name="login_keep" value="login_keep"
          <?php
          if(isset($_COOKIE['login_keep'])) {
              echo "checked='checked'";
          }
          
          ?>>ログイン状態を保持する</p>
        </div>
        <div class="login_button">
          <input type="submit" class="button" value="ログイン">
          
        </div>
      </div>
    </form>
  </main>

  <footer>
    <p>© 2018 Internous.inc All rights reserved</p>
  </footer>


</body>
</html>

