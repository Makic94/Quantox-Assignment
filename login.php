<?php
include_once("class/classUser.php");
session_start();
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    if(isset($_SESSION['username']) and isset($_SESSION['id']))
    {
        header('Location: index.php');
    }
    ?>
    <div class="head">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    </ul>
    </div>
    <hr>
    <p>To login, type your email and password down bellow!</p>
    <form action="login.php" method="POST">
    <input type="email" name="email" id="email" placeholder="Email*"
    autocomplete="off"><br><br>
    <input type="password" name="password" id="password" placeholder="Password*"><br><br>
    <button>Login</button>
    </form>
    <?php
    if(isset($_POST['email']) and isset($_POST['password']))
        {
            if($_POST['email']!="" and $_POST['password']!="")
                {
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $login = $user->login($email, $password);
                }
            else echo "<p>All field are required.</p>";
        }
    ?>
</body>
</html>