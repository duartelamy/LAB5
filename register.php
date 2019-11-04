<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include 'db.php';
    require('libs/Smarty.class.php');
    $smarty = new Smarty();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->cache_dir = 'cache';
    $smarty->config_dir = 'configs';

    $error_array = array(
        0 => "Todos os campos devem ser preenchidos",
        1 => "Email já existe na base de dados",
        2 => "Email tem formato incorrecto",
        3 => "Password em branco",
        4 => "Passwords não coincidem",
    );

    $name = "";
    $email = "";
    $message = "";


    if(isset($_GET["error"])){
        $message = $error_array[$_GET["error"]];

        if(isset($_GET["name"])){
            $name = $_GET["name"];
        }

        if(isset($_GET["email"])){
            $email = $_GET["email"];
        }

    }

    $smarty->assign('name',$name);
    $smarty->assign('email',$email);
    $smarty->assign('message',$message);
    $smarty->display('templates/register_template.tpl');
?>