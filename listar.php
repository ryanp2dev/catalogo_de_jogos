<?php 

require_once './conexaoBD.php';

try {

    $sql = "SELECT * FROM jogos ORDER BY id";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $listaJogos = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
catch (PDOException $e) {
    echo '<br/>Erro na LISTAGEM -> Arquivo "listar.php"' . $e->getMessage();
    // "Falha no sistema, por favor contate o suporte!"
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Jogos:</h2>

        <?php if (!empty($_GET['msgSucesso'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } if (!empty($_GET['msgErro']))  { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>
    <a href="./cadastrar.php" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Novo Jogo</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria (ou Gênero):</th>
        <th scope="col">Classificação</th>
        <th scope="col">Ano de Lançamento</th>
        <th scope="col">Valor em Reais</th>        
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaJogos as $jogos) { ?>
        <tr>
            <th scope="row"><?php echo $jogos['id']; ?></th>
            <td><?php echo $jogos['nome']; ?></td>
            <td><?php echo $jogos['categoria']; ?></td>
            <td><?php if ($jogos['classificacao'] == 'livre') { echo '<img src="./imagens/livre.png" width="40" height="40">';
            } else if ($jogos['classificacao'] == 'crianca') { echo '<img src="./imagens/crianca.png" width="40" height="40">';
            } else if ($jogos['classificacao'] == 'preAdolescente') { echo '<img src="./imagens/preAdolescente.png" width="40" height="40">';
            } else if ($jogos['classificacao'] == 'adolescente') { echo '<img src="./imagens/adolescente.png" width="40" height="40">';
            } else if ($jogos['classificacao'] == 'jovem') { echo '<img src="./imagens/jovem.png" width="40" height="40">';
            } else if ($jogos['classificacao'] == 'adulto') { echo '<img src="./imagens/adulto.png" width="40" height="40">';
            } else {echo 'Sem classificação!';}?></td>
            <td><?php echo $jogos['ano']; ?></td>
            <td><?php echo $jogos['valor']; ?></td>
            <td>
            <a href="./alterar.php?id=<?php echo $jogos['id']; ?>" class="btn btn-info" tabindex="-1" role="button" aria-disabled="true">Alterar</a>
            <a href="./excluir.php?id=<?php echo $jogos['id']; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">Excluir</a>
            </td>
        </tr>
        <?php } ?>            
    </tbody>
    </table>
    </div>
</body>
</html>