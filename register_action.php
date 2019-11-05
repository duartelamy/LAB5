<?php

  require('libs/Smarty.class.php');
  $smarty = new Smarty();
  require_once "db.php";

  
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
  if ($db)
  {

    $nome = ($_POST["name"]);
    $email = $_POST["email"];
    $pwd1 = $_POST["password"];
    $pwd2 = $_POST["confirm_password"];
    $error = 0;
    print_r($_POST);
    //$x = strcmp("$pdw1", "$pwd2");

    $select = mysql_query("SELECT email FROM users WHERE email = '$email';");

    if (mysql_num_rows($select)>0)
    {
      header("Location:register.php?error=1&NAME=$nome");
    }
    elseif ($pwd1!=$pwd2) 
    {
      header("Location:register.php?error=3&NAME=$nome&MAIL=$email");
    }
    else
    {
      $password = substr(md5($pwd1),0,32);
      $date = date("Y-m-d H:i:s");
      $query = "INSERT INTO users (name, email, created_at, updated_at, password_digest) VALUES ('$nome', '$email','$date', '$date', '$password');";
      mysql_query($query,$db);
      header("Location: register_success.html");
    }
    mysql_close($db);
  } 
?>