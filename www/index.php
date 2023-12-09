
<?php

$pdo = new PDO('mysql:db_name=monster_bank;host=localhost:3306', 'user', 'password');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM monster_bank.monster ORDER BY name DESC');
$statement->execute();
$monsters = $statement->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monster Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Monster Bank ! </h1>

    <p>
      <a href="/www/create.php" class="btn btn-success">Register Monster</a>
    </p>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Strength</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($monsters as $i => $monster) { ?>
          <tr>
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $monster['name'] ?></th>
          <td><?php echo $monster['description'] ?></th>
          <td><?php for ($i = 0; $i < $monster['strength']; $i++) { echo "★";} ?></th>
          <td>
            <a href="/www/update.php?id=<?php echo $monster['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="/www/delete.php?id=<?php echo $monster['id']?>" type="button" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>