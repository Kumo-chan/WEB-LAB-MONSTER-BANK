<?php
$pdo = new PDO('mysql:db_name=monster_bank;host=localhost:3306', 'root', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$statement = $pdo->prepare("CREATE SCHEMA IF NOT EXISTS monster_bank");
$statement->execute();
$statement = $pdo->prepare("DROP TABLE IF EXISTS  monster_bank.monster");
$statement->execute();
$statement = $pdo->prepare("CREATE TABLE `monster_bank`.`monster` (
    `id` int NOT NULL,
    `name` varchar(45) NOT NULL,
    `description` text NOT NULL,
    `strength` int NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
  ALTER TABLE `monster_bank`.`monster` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);
  ALTER TABLE `monster_bank`.`monster` MODIFY `id` int NOT NULL AUTO_INCREMENT;");
$statement->execute();
$monsters[] = ['name' => 'Rathian', 'description' => 'Winged Wyvern, coming from Monster Hunter Series. Nicknamed Queen of the Earth', 'strength' => 2];
$monsters[] = ['name' => 'Rathalos', 'description' => 'Winged Wyvern, coming from Monster Hunter Series. Nicknamed King of the Sky', 'strength' => 3];
$monsters[] = ['name' => 'Jormugand', 'description' => 'Mythical Monster from North Mythology, will devour the world during Ragnarock', 'strength' => 9];
foreach( $monsters as $monster ) {  
    $statement = $pdo->prepare("INSERT INTO monster_bank.monster (name,  description, strength) VALUES (:name, :description, :strength)");
    $statement->bindValue(':name', $monster['name'], PDO::PARAM_STR);
    $statement->bindValue(':description', $monster['description'], PDO::PARAM_STR);
    $statement->bindValue(':strength', $monster['strength'], PDO::PARAM_INT);
    if(!$statement->execute()) {
        echo $statement->errorInfo();
    }
}
