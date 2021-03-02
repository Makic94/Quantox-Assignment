<?php
session_start();
require_once("class/classBase.php");
$db=new Base();
if(!$db->connect())exit();
include_once("class/classSearch.php");
$searching = new Search();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Screen</title>
</head>
<body>
    <h1>Welcome</h1>
    <?php
    if(isset($_SESSION['username']) and isset($_SESSION['id']))
    {
    ?>
    <div class="head">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
    <hr>
    <p>Welcome <?php echo $_SESSION['username']."."; ?> Enjoy your stay.</p>
    <p>Down bellow You can search for already registered users.</p>
    <form action="index.php" class="GET">
    <input type="text" name="search" id="search" placeholder="username"><br><br>
    <button>Search</button>
    </form>
    <?php
    }
    else
    {
    ?>
    <div class="head">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    </ul>
    </div>
    <hr>
    <p>Down bellow You can search for already registered users.</p>
    <form action="index.php" class="GET">
    <input type="text" name="search" id="search" placeholder="username"><br><br>
    <button>Search</button>
    </form>
    <?php
    }
    ?>
    <?php
    if(isset($_GET['search']))
        {
            if(isset($_SESSION['username']) and isset($_SESSION['id']))
                {
                    if($_GET['search']!="")
                        {   
                            $search=$_GET['search'];
                            $result=$searching->research($search);
                        }
                }
            else echo "<p>To use the search you will have to <a href='register.php'>Register</a> or <a href='login.php'>Login</a> first!</p>";
        }
    ?>
</body>
</html>