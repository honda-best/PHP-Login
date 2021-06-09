<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP Login</title>
</head>

<body>
<?php
$connection = mysqli_connect('localhost','root','','login'); // подключаемся к БД

if (isset($_POST['username']) && isset($_POST['password'])) { 
   $err = [];
   if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['username']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    } 
    // проверяем существует ли пользователь с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует";
    }
    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    { 
   $username = $_POST['username']; // Записываем логин
   $password = $_POST['password']; // Записываем пароль
   }
   else
   {
        print $err; // Смотрим ошибки
   }
   $query = "INSERT INTO users (username, email, password) VALUES ('username', 'password')"; // записываем переменную
   $result = mysqli_query($connection, $query); // записываем результат в БД

   if($result){
      $positive = "Вы зарегестрировались";
   } else {
      $negative = "Ошибка";
   }

}
?>
   <div>
      <form method="POST"></form>
         <h2>Регистрация</h2>

         <?php if(isset($positive)){ ?>
         <div> 
         <?php echo $positive; ?> 
         </div><?php }?>

         <?php if(isset($negative)){ ?>
         <div> 
         <?php echo $negative; ?> 
         </div><?php }?>

         <input type="text" name="username" placeholder="Имя пользователя"><br>
         <input type="password" name="password" placeholder="Пароль"><br>
         <a href="login.php">Зарегистрироваться</a>

         <?php include 'vk.php';?>
   </div>
</body>
</html>