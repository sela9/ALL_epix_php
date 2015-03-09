<div class="wrapper col1">
  <div id="topbar">
<!-- Форма авторизации для существующих пользователей-->
    <div id="clientlogin">
      <form action="" method="post">
        <fieldset>
          <legend>Site Login</legend>
          <input type="text" placeholder="Login&hellip;" name="login"   />
          <input type="text" placeholder="Password&hellip;" name="pswd"  />
          <input type="submit" name="submit"  id="login" value="Войти" />
        </fieldset>
      </form>
    </div>
<?php
if (isset($_POST['login'])) {
  //var_dump($_POST);
    try { 
         $st=$pdo->prepare("SELECT pwrd FROM users WHERE login=:login");
         $st->bindParam(':login', $_POST['login']);
         $st->execute();
         $stt = $st->fetchAll(PDO::FETCH_ASSOC);
         if ($stt=array('0')) {
           echo "НЕ УГАДАЛ! ПОПРОБУЙ СНОВА!";
         }
         elseif ($stt['0']['pwrd']==$_POST['pswd']){
              setcookie('user', $_POST['login'], time() +3600);
         }
         else echo "НЕ УГАДАЛ! ПОПРОБУЙ СНОВА!";
         }
    catch (PDOException $e) {echo 'НЕ УГАДАЛ! ПОПРОБУЙ СНОВА!';} 
}





//if (isset($_POST['login'])) {
//  setcookie('user_auth', $_POST['login'], time() + 3600);
//}
?>

  </div>
</div>
<!-- Регистрация нового пользователя -->
<!--    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="GO" />
        </fieldset>
      </form>
    </div>

-->
