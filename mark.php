<?php
    # Habilita o loggin
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    # Importa o arquivo init.php e deixa suas funções e variáveis disponíveis neste arquivo.
    require_once 'app/init.php';

    # Se o item vier no get da url
    if (isset($_GET['item'])) {

        # seta o valor da var $item com o item que veio na url.
        $item = $_GET['item'];

        # seta o valor da var $user com o user da sesão
        $user = $_SESSION['user_id'];

        # prepara o UPDATE do banco de dados.
        # Seta done=1, deixando a tarefa com status de completo.
        $stmt = $conn->prepare(
            "UPDATE todo.items
            SET done=1
            WHERE id=?"
        );
        # indica o tipo da var ("i" = inteiro) e coloca a var $item na query acima.
        $stmt->bind_param("i", $item);
        # Executa o update no banco.
        $stmt->execute();
    }
    # Retorna para a página de tarefas com o tem completo e riscado.
    header('Location: index.php');
 ?>
