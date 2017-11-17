<?php
    # Habilita logging do php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    # Inclui o arquivo init.php e suas funçoes e variaveis neste arquivo.
    require_once 'app/init.php';

    # Verifica se o name está no post.
    # Se não estiver devolve a mesma página com indicação de erro.
    if(isset($_POST['name'])){
        # Pega o que veio do formulário e coloca na var $name
        $name = trim($_POST['name']);
        # Seta o atributo done para 0. (Tarefa não completa).
        $done = 0;
        # Pega o user da sessão atual.
        $user = $_SESSION['user_id'];
        # Certifica-se de que o nome não é uma string vazia.
        # Se não for, cria a query do banco e executa o insert da nova tarefa.
        if (!empty($name)) {
            $stmt = $conn->prepare(
                "INSERT INTO todo.items (name, done, user, created) VALUES (?, ?, ?, NOW());"
            );
            # Acopla o valor das variáveis na query acima.
            $stmt->bind_param("sii", $name, $done, $user);
            # Executa o insert
            $stmt->execute();
        }
    }

    header('Location: index.php');
 ?>
