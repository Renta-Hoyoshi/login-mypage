<?php
//ログイン時にアクセスした場合、マイページにリダイレクト
if(isset($_COOKIE['login_keep'])) {
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="login_error.css">
<title>会員ログイン</title>
</head>
<body>

  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>
  
  <main>
    <form action="mypage.php" method="post">
      <h2>メールアドレスまたはパスワードが間違っています。</h2>
      <div class="login_contents">
        <div class="email">
          <p>メールアドレス</p>
          <input type="text" class="loginbox" name="email" >
        </div>
        <div class="password">
          <p>パスワード</p>
          <input type="password" class="loginbox" name="password" >
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

