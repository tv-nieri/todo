<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'app/init.php';

    if (isset($_GET['item'])) {
        
        $item = $_GET['item'];
        $user = $_SESSION['user_id'];

        $stmt = $conn->prepare(
            "UPDATE todo.items
            SET done=1
            WHERE id=?"
        );
        $stmt->bind_param("i", $item);
        $stmt->execute();

    }
    header('Location: index.php');
 ?>
