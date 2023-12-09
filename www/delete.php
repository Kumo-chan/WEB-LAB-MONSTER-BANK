<?php

$pdo = new PDO('mysql:db_name=monster_bank;host=localhost:3306', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM monster_bank.monster WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: index.php');