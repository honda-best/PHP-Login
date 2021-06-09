<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>PHP Login</title>
</head>

<body>
   <div>
      <form class="form-signin" method="POST"></form>
         <h2>Авторизация</h2>

         <input type="text" name="username" placeholder="Имя пользователя">
         <input type="password" name="password" placeholder="Пароль">
         <button type="submit">Войти</button>
         <a href="index.php">Зарегистрироваться</a>
   </div>

   <?php
   $connection = mysqli_connect('localhost','root','','login');

   if (isset($_POST['username']) and isset($_POST['password'])) 
      { 
         $username = $_POST['username']; // Записываем логин
         $password = $_POST['password']; // Записываем пароль
         $query = "SELECT * FROM users WHERE username='$username' and password='$password'"; 
         $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
         $count = mysqli_num_rows($result);

         if ($count == 1){
            $_SESSION['username'] = $username; // начало сессии
                        } else {
                           $negative = "Ошибка";
                              }
      }

   if (isset($_SESSION['username'])) {
      $username = $_SESSION['username']; 
      echo "Вы успешно вошли на страницу";
   }
   ?>
</body>
</html>