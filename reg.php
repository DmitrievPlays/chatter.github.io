<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/loginsystem.css">
  <title></title>
</head>
<body>

<?php

  require_once("connection.php");


  if(isset($_POST['register']))
    {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];

      if($first_name !="" and $last_name !="" and $user_name !="" and $password !="" )
      {
        $q="INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`)
            VALUES('', '".$first_name."', '".$last_name."', '".$user_name."', '".$password."' )
        ";

        if(mysqli_query($con, $q ))
        {
          header("location:login.php");
        }
        else
        {
          echo $q ;
        }
      }
      else
      {
        echo '<div class = "error">ПОЖАЛУЙСТА, ЗАПОЛНИТЕ ВСЕ ПОЛЯ!</div>';
      }
    }

?>
    <div class = "mainblock">
      <div class="topper">РЕГИСТРАЦИЯ</div>
      <form method="post">
        <input type="text" name="first_name" class="box" placeholder="Имя"/>
        <input type="text" name="last_name" class="box" placeholder="Фамилия"/>
        <input type="text" name="user_name" class="box" placeholder="Ник"/>
        <input type="password" name="password" class="box" placeholder="Пароль"/>
        <input type="submit" name="register" class="login" value="Зарегистрируйте меня!"/>
      </form>
    </div>
</body>
</html>
