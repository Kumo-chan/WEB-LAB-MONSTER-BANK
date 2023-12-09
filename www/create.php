<?php

$pdo = new PDO('mysql:db_name=monster_bank;host=localhost:3306', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$name = '';
$description = '';
$strength = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $strength = $_POST['strength'];

    if (!$name) {
        $errors[] = 'Monster name is required';
    }

    if (!$strength) {
        $errors[] = 'Monster strength is required';
    }

    if (empty($errors)) {
        try {
            $statement = $pdo->prepare("INSERT INTO monster_bank.monster (name, description, strength)
                VALUES (:name, :description, :strength)");
            $statement->bindValue(':name', $name);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':strength', $strength);
            $statement->execute();
        } catch (PDOException $e) {
            $errors[] = $e->getMessage();
        }
        
    }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monser Bank</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <link rel="stylesheet" href="style.css">
  </head>
<body>
<p>
    <a href="index.php" class="btn btn-default">Back to Bank</a>
</p>
<h1>Register a new Monster</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="" method="post">
    <div class="form-group">
        <label>Monster name</label><br>
        <input type="text" name="name" minlength='3' maxlength='45' required>
    </div>
    <div class="form-group">
        <label>Monster description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="form-group">
        <label>Monster strength</label>
        <input type="number" min="1" max="10" name="strength" class="form-control" value="1" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>