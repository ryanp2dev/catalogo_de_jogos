<?php 
require_once 'conexaoBD.php';

try {
    $sql = 'UPDATE 
                jogos
            SET 
                nome = :nome,
                categoria = :categoria,
                classificacao = :classificacao,
                ano = :ano,
                valor  = :valor
                
            WHERE 
                id = :id';

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
    $stmt->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
    $stmt->bindValue(':categoria', $_POST['categoria'], PDO::PARAM_STR);
    $stmt->bindValue(':classificacao', $_POST['classificacao'], PDO::PARAM_STR);
    $stmt->bindValue(':ano', $_POST['ano'], PDO::PARAM_INT);
    $stmt->bindValue(':valor', $_POST['valor'], PDO::PARAM_STR);


    if ($stmt->execute()) { // executar a SQL
        $msg = 'Dados da pessoa atualizados com sucesso!';
        header('Location: index.php?msgSucesso=' . $msg);
    }
    else {
        $msg = 'Falha ao atualizar os dados da pessoa. Tente novamente mais tarde!';
        header('Location: index.php?msgErro=' . $msg);
    }
} catch (PDOException $e) {    
    $msg = 'Não foi possível atualizar os dados da pessoa. Tente novamente mais tarde!';
    header('Location: listar.php?msgErro=' . $msg);
}
?>