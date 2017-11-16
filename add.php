<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once 'app/init.php';

    if(isset($_POST['name'])){
        $name = trim($_POST['name']);
        $done = 0;
        $user = $_SESSION['user_id'];
        if (!empty($name)) {
            $stmt = $conn->prepare(
                "INSERT INTO todo.items (name, done, user, created) VALUES (?, ?, ?, NOW());"
            );
            $stmt->bind_param("sii", $name, $done, $user);
            $stmt->execute();
        }
    }

    header('Location: index.php');
 ?>
