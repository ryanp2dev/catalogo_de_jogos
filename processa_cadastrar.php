<?php 

require_once './conexaoBD.php';

if (!empty($_POST)) {
    // print_r($_POST);

    $sql = "INSERT INTO jogos (nome, categoria, classificacao, ano, valor) VALUES (:nome, :categoria, :classificacao, :ano, :valor)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
    $stmt->bindValue(':categoria', $_POST['categoria'], PDO::PARAM_STR);
    $stmt->bindValue(':classificacao', $_POST['classificacao'], PDO::PARAM_STR);
    $stmt->bindValue(':ano', $_POST['ano'], PDO::PARAM_INT);
    $stmt->bindValue(':valor', $_POST['valor'], PDO::PARAM_STR);

    if ($stmt->execute() == true) {
        $msg = 'Jogo cadastrado!';
        header('Location: ./index.php?msgSucesso=' . $msg);
    }
    else {
        $msg = 'Erro no PROCESSAMENTO DO CADASTRAR -> Arquivo "processa_cadastrar.php"';
        header('Location: index.php?msgErro=' . $msg);
        // "Falha ao cadastrar esse jogo. Tente novamente mais tarde!"
    }
}

?>