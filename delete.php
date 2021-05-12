<?php
$dsn = 'mysql:host=localhost;dbname=users';
$pdo =new PDO($dsn, 'root', 'root');

$id = $_GET['id'];

$sql = 'DELETE FROM `users` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);

header('Location: /');
?>