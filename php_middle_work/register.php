<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="register.css">
<title>マイページ登録</title>
</head>
<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>

  <main>
    <form action="register_confirm.php" method="POST" enctype="multipart/form-data">  
      <div class="form_contents">
        <h2>会員登録</h2>
        <div class="name">
          <div class="necessary">必須</div><label>名前</label><br>
          <input type="text" class="formbox" name="name" required>
        </div>

        <div class="email">
          <div class="necessary">必須</div><label>メールアドレス</label><br>
            <input type="text" class="formbox" name="email" pattern="^[a-z0-9.-]+\.[a-z]{2,3}$" required>
          </div>

          <div class="password">
            <div class="necessary">必須</div><label>パスワード</label><br>
            <input type="password" class="formbox" name="password" id="password" pattern="^[a-z0-9]{6,}$" required>
          </div>

          <div class="password">
            <div class="necessary">必須</div><label>パスワード確認</label><br>
            <input type="password" class="formbox" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)" required>
          </div>

          <div class="picture">
            <div class="necessary">必須</div><label>プロフィール写真</label><br>
            <input type="hidden" name="max_file_size" value="1000000"/>
            <input type="file" size="40" name="picture" >
          </div>

          <div class="comments">
            <label>コメント</label><br>
            <textarea class="formbox" name="comments" cols="40" rows="5"></textarea>
          </div>

          <div class="register">
            <input type="submit" class="submit_button" size="35" value="登録する">
          </div>
        </div>
      </div>
    </form>
      
  </main>

  <footer>
    <p>© 2018 Internous.inc All rights reserved</p>
  </footer>

  <script>
      function ConfirmPassword(confirm) {
          let input1 = password.value;
          let input2 = confirm.value;
          if(input1 != input2) {
              confirm.setCustomVaidity("パスワードが一致しません。")
          } else {
              confirm.setCustomValidity("");
          }
      }
  </script>
</body>
</html>
