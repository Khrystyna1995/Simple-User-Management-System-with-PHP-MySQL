<?php
$newUser = $_POST['newUser'];

if($newUser == '') {
    echo 'Enter your name and lastname, please.';
    exit();
}

$dsn = 'mysql:host=localhost;dbname=users';
$pdo =new PDO($dsn, 'root', 'root');

$sql = 'INSERT INTO users(name) VALUES(:newUser) ';
$query = $pdo->prepare($sql);
$query->execute(['newUser' => $newUser]);

header('Location: /');
?>
