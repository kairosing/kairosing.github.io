<?php
session_start();
require_once "function.php";

$email = $_POST["email"];
$password = $_POST["password"];

$user = get_user_by_email($email);

if (!empty($user)) {
    set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем");
    redirect_to("page_register.php");
}

//add_user($email, $password);


$_SESSION['user_id'] = add_user($email, $password);
set_flash_message("success","Регитрация успешна");
redirect_to("page_login.php");







/*$email = "Monika@explate.com";
$password = "333";

$pdo = new PDO("mysql:host=localhost;dbname=get_fort","root","123");

$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
if (!empty($user)){
    $_SESSION['danger'] = "Этот эл. адрес уже занят другим пользователем";
    header("Location: page_register.php");
    exit();
}


$sql = "INSERT INTO users(email,password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(
    ['email' => $email,
     'password' => password_hash($password, PASSWORD_DEFAULT)]);
$_SESSION['success'] = "Регитрация успешна";
header("Location: page_login.php");
exit();*/




