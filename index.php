<?php
session_start(); // (1)!
?>

<html>
<head>
    <title>Todo List</title>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Todo List</h1>
    
    <form method="post" action="">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <input type="submit" name="addTask" value="Add Task">
    </form>

    <?php
    if (!isset($_SESSION['todoList'])) { // (2)!
        $_SESSION['todoList'] = []; // (8)!
    }
    
    /*
      Add the task to the list if the form is submitted.
    */
    if (isset($_POST['addTask'])) {
        $task = $_POST['task'];
        if (!empty($task)) {
            array_push($_SESSION['todoList'], $task); // (3)!
        }
    }

    /*
      Display the list if it is not empty.
    */
    if (!empty($_SESSION['todoList'])) { // (4)!
        echo "<h2>Tasks</h2>";
        echo "<ul>";
        foreach ($_SESSION['todoList'] as $index => $task) { // (5)!
            echo "<li>$task <a href='index.php?remove=$index'>Remove</a></li>";
        }
        echo "</ul>";
    }

    /*
      Remove the task from the list if the remove parameter is set.
    */
    if (isset($_GET['remove'])) {
        $index = $_GET['remove'];
        if (isset($_SESSION['todoList'][$index])) { // (6)!
            unset($_SESSION['todoList'][$index]); // (7)!
        }
    }
    ?>
</body>
</html>