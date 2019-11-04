<?php

include("db.php");

if(!isset($_POST['submitok'])) {
  // Display the user signup form
  header("Location: register.php");
}
else {
  // Process signup submission
  $db = dbconnect($hostname,$db_name,$db_user,$db_passwd); 

  if( $_POST['newid']    == '' or
     $_POST['newname']  == '' or
     $_POST['newemail'] == '' ) {
   header("Location: register.php?m=1");   
   exit;
  }
    

  
  // Check for existing user with the new id
  $query = "SELECT * FROM users WHERE userid = '" .$_POST[newid] ."'";
  $result = @ mysql_query($query,$db);
  if(!$result)
     showerror();

  if(mysql_num_rows($result) > 0) {
     header("Location: register.php?m=2");
     exit;
  }
    
  
  $userid  = $_POST[newid];
  $password = substr(md5(time()),0,6);
  $fullname = $_POST[newname];
  $email    = $_POST[newemail];
  $notes    = $_POST[newnotes];
  $present_date = date("Y-m-d H:i:s");

  $sql_insert = "INSERT INTO users(userid,password,fullname,email,notes, created_at)
                 VALUES('$userid','$password','$fullname','$email','$notes','$present_date')";

  if(!mysql_query($sql_insert,$db))
     showerror();
    
  // Close database
  mysql_close($db);
            
  // Email the new password to the person.
  $message = "Hello

Your personal account for the Project Web Site
has been created!

Your personal login ID and password are as
follows:

   userid: $_POST[newid]
   password: $password

- Duarte Jerónimo
";

  mail($_POST['newemail'],"Your Password for the Website",
       $message, "From:Duarte Jerónimo <a61156@deei.fct.ualg.pt>");
 
  header("Location: register_success.html");     

}
?>