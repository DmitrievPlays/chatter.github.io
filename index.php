<!DOCTYPE html>
<html lang = "ru">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/loginsystem.css">
  <link rel = "stylesheet" href = "css/style.css">
  <title>PHP website...</title>
</head>

<body>
  <!--php  include '/header.html'; ?-->

  <div class = "header">
    <a class = "logo"></a>
    <div class="userName">
    <?php session_start();
      if(isset($_SESSION['user_name']))
      {
        echo $_SESSION['user_name'];
      }
      else
      {
        header("location:login.php");
      }

    ?>
  </div>

    <?php
      echo '<a href="logout.php">Log out</a>';

    ?>
    <a class = "settings"></a>
  </div>


  <div class = "outerWindow">
    <div class = "windowView">
      <div class = "msgbox"><?php include('data.txt'); ?></div>
    </div>
    <div class="msginput">
      <form method="post">
        <input type="text" name="textdata" class="msg">
        <button type="submit" name="submit" value=">" class="send">
          <div class="sendLogo"></div>
        </button>
      </form>
    </div>
    </div>


  </div>



</body>
<script> </script>
<script>

</script>
</html>

<?php
if(isset($_POST['clear']))
{
  $fp = fopen("data.txt", "w");
  fclose($fp);
}
?>



<?php
if(isset($_REQUEST['submit']))
{
  $data = $_POST['textdata'];
  $fp = fopen('data.txt', 'a');
  fwrite($fp, $data);
  fclose($fp);
}
?>
