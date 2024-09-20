<?php
require_once '../conexao/conexaoBD.php';

try {
    $sql = "DELETE FROM jogos WHERE id = " . $_POST['id'];

    $stmt = $conexao->prepare($sql);

    if ($stmt->execute() == true) {
        $msg = 'Exclusão realizada com sucesso!';
        header('Location: ../index.php?msgSucesso=' . $msg);
    }
    else {
        $msg = 'Falha ao excluir pessoa. Tente novamente mais tarde!';
        header('Location: ../index.php?msgErro=' . $msg);
    }
}
catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados";
}
?>