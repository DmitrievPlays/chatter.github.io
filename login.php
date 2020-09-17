<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/loginsystem.css">
  <title></title>
</head>
<body>

<?php session_start();

require_once("connection.php");

if(isset($_POST['login']))
{
  $user_name = $_POST['user_name'] ;
  $password = $_POST['password'] ;

  $q = 'SELECT * FROM `user` where `user_name`="'. $user_name.'" and `password`="'.$password.'"';
  $r = mysqli_query($con, $q) ;
  if(mysqli_num_rows($r) > 0)
  {
    $_SESSION['user_name'] = $user_name;
    header("location:index.php");
  }
  else
  {
    echo '<div class = "error">ДАННЫЕ ВВЕДЕНЫ НЕВЕРНО, ПОВТОРИТЕ ПОПЫТКУ!</div>';
  }
}

?>
    <div class = "mainblock">
      <div class="topper">ВХОД</div>
      <form method="post">
        <input type="text" name="user_name" class="box" placeholder="Имя пользователя" required/>
        <input type="password" name="password" class="box" placeholder="Пароль"/><br>
        <input type="submit" name="login" class="login" value="ВХОД"/><br>
      </form>
      <a href="reg.php" class="createAccount">Create an account</a>
    </div>
</body>
</html>
