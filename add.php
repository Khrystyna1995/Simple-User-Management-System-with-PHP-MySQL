<?php
$newUser = $_POST['newUser'];
$userRole = $_POST['userRole'];
if($newUser == '') {
    echo 'Enter your name and lastname, please.';
    exit();
}

$dsn = 'mysql:host=localhost;dbname=users';
$pdo =new PDO($dsn, 'root', 'root');

$sql = 'INSERT INTO users(name, role ) VALUES(:newUser, :userRole) ';
$query = $pdo->prepare($sql);
$query->execute(['newUser' => $newUser, 'userRole' => $userRole]);

header('Location: /');
?>
