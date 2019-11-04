<?php

include 'db.php';

// put full path to Smarty.class.php
require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->cache_dir = 'cache';
$smarty->config_dir = 'configs';


// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
if($db) {
  // criar query numa string
  $query  = "SELECT * FROM microposts, users
              WHERE microposts.user_id = users.id ORDER BY
              microposts.created_at DESC";

 
  // executar a query
  if(!($result = @ mysql_query($query,$db )))
   showerror();



  // vai buscar o resultado da query

  $nrows  = mysql_num_rows($result);
   for($i=0; $i<$nrows; $i++)
     $tuple[$i] = mysql_fetch_array($result,MYSQL_ASSOC);

  // faz a atribuição das variáveis do template smarty
  $smarty->assign('Posts',$tuple);
  

  // Mostra a tabela
  $smarty->display('templates/index_template.tpl');

  // fechar a ligação à base de dados
  mysql_close($db);
} // end if
?>