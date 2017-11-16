<?php
require_once 'app/init.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tarefas</title>

        <link href="https://fonts.googleapis.com/css?family=Muli|Poppins" rel="stylesheet">
        <link rel="stylesheet" href="/to-do-list/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="list">
            <h1 class="header">Tarefas.</h1>
            <?php if ($result->num_rows > 0): ?>
            <ul class="items">
                <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <span class="item<?php echo $row['done'] ? ' done' : '' ?>"><?php echo $row["name"];?></span>
                    <?php if(!$row['done']): ?>
                        <a class="done-button" href="mark.php?item=<?php echo $row['id']?>">Completo!</a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else: ?>
                <p>Sem tarefas na lista.</p>
            <?php endif; ?>


            <form class="item-add" action="add.php" method="post">
                <input class="input" type="text" name="name" placeholder="Nova tarefa aqui!" autocomplete="off" required>
                <input class="submit" type="submit" value="Adicionar">
            </form>
        </div>
    </body>
</html>
