<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名

$temp_pic_name = $_FILES['picture']['tmp_name'];

//元ファイル名で画像ファイルを取得。事前に画像を格納する
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存先のファイル名を、imageフォルダに、元のファイル名で移動させる。
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="register_confirm.css">
<title>タイトル</title>
</head>
<body>
  
  <header>
    <img src="4eachblog_logo.jpg">
  </header>

  <main>  
    <div class="confirm_contents">
        <h2>会員登録 確認</h2>
          
        <p>こちらの内容で登録しても宜しいでしょうか？</p>
          
        <div class="main_contents">
          <ul>
            <li>氏名：<?php echo $_POST['name'];?></li>
            <li>メール：<?php echo $_POST['email'];?></li>
            <li>パスワード：<?php echo $_POST['password'];?></li>
            <li>プロフィール写真：<?php echo $original_pic_name;?></li>
            <li>コメント：<?php echo $_POST['comments'];?></li>
          </ul>
        </div>
        <div class="buttons"> 
          <form action="register.php" >
            <div class="back_button">
              <input type="submit" class="button1" value="戻って修正する">
            </div>
          </form>
          
          <form action="register_insert.php" method="post">
            <div class="register_button">
              <input type="submit" class="button2" value="登録する">
              <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
              <input type="hidden" value="<?php echo $_POST['email'];?>" name="email">
              <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
              <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
              <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
            </div>
          </form>
        </div>
    </div>  
  </main>
  
  <footer>
    <p>© 2018 Internous.inc All rights reserved</p>
  </footer>

</body>
</html>
