<?php

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$pdo = new PDO('mysql:db_name=monster_bank;host=localhost:3306', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM monster_bank.monster WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$monster = $statement->fetch(PDO::FETCH_ASSOC);


$name = $monster['name'];
$description = $monster['description'];
$strength = $monster['strength'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $strength = $_POST['strength'];

    if (!$name || strlen($name) < 4 || strlen($name) > 46) {
        $errors[] = 'Monster name is required and must be between 3 and 45 characters';
    }

    if (!$strength || $strength < 1 || $strength > 10) {
        $errors[] = 'Monster strength is required and must be between 1 and 10';
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE monster SET name = :name,
                                        description = :description, 
                                        strength = :strength WHERE id = :id");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':strength', $strength);
        $statement->bindValue(':id', $id);

        $statement->execute();
        header('Location: index.php');
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monster bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<p>
    <a href="index.php" class="btn btn-default">Back to monsters</a>
</p>
<h1>Update Monster: <b><?php echo $monster['name'] ?></b></h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Monster name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" minlength='3' maxlength='45' required>
    </div>
    <div class="form-group">
        <label>Monster description</label>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>
    <div class="form-group">
        <label>Monster strength</label>
        <input type="number" min="1" max="10" name="strength" class="form-control"  value="<?php echo $strength ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>