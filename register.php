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
    <title>Register</title>
</head>
<body>
    <?php
    if(isset($_SESSION['username']) and isset($_SESSION['id']))
    {
        header('Location: index.php');
    }
    ?>
    <h1>Register</h1>
    <div class="head">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    </ul>
    </div>
    <hr>
    <form action="register.php" method="POST">
    <input type="email" name="email" id="email" placeholder="Email*"><br><br>
    <input type="text" name="username" id="username" placeholder="Username*"><br><br>
    <input type="password" name="password" id="password" placeholder="Password*"><br><br>
    <input type="password" name="password2" id="password2" placeholder="Confirm Your Password*"><br><br>
    <button>Register</button>
    </form>
    <?php
    if(isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password']) and isset($_POST['password2']))
        {
            if($_POST['email']!="" and $_POST['username']!="" and $_POST['password']!="" and $_POST['password2']!="")
                {
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $password2=$_POST['password2'];
                    $register = $user->register($email, $username,$password, $password2);
                }
                
            else echo "<p>All fields are required!</p>";
        }
    ?>
</body>
</html>