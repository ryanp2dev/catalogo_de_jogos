<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Jogo no Catálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Novo Jogo:</h2>
        <form action="./processa_cadastrar.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" required>

            <br>

            <label for="categoria">Categoria (ou Gênero):</label>
            <input type="text" class="form-control" name="categoria" id="categoria" required>

            <br>

            <label for="classificacao" class="form-label">Classificação:</label>
            <select class="form-select" name="classificacao" id="classificacao" required>
                <option selected>--Selecione a Classificação--</option>
                <option value="livre">Livre</option>
                <option value="crianca">+ 10 anos</option>
                <option value="preAdolescente">+ 12 anos</option>
                <option value="adolescente">+ 14 anos</option>
                <option value="jovem">+ 16 anos</option>
                <option value="adulto">+ 18 anos</option>
            </select>

            <br>

            <label for="ano">Ano de Lançamento:</label>
            <input type="number" name="ano" id="ano" min="1900" required>
            
            <br><br>

            <label for="valor">Valor em Reais:</label>
            <input type="number" name="valor" id="valor"  step="0.01" min="0" required>

            <br><br>

            <button type="submit" class="btn btn-primary">Cadastrar Jogo</button>
            <a href="./index.php" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Voltar para a Lista de Jogos</a>
        </form>
    </div>
</body>
</html>