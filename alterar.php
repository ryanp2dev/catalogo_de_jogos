<?php 

require_once 'conexaoBD.php';

try {
    // preparar / montar a SQL
    $sql = "SELECT * FROM jogos WHERE id = " . $_GET['id'];
    
    $stmt = $conexao->prepare($sql);

    // executar a SQL
    $stmt->execute();

    $jogos = $stmt->fetch(PDO::FETCH_ASSOC);  
    
    
    
}
catch (PDOException $e) {
    $msg = 'Falha ao realizar busca na base de dados.';
    header('Location: index.php?msgErro=' . $msg);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Alterar Jogos</h2>        
        <form action="processa_alterar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $jogos['id']; ?>">

            <label for="nome" class="form-label">Nome</label>    
            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $jogos['nome'] ?>">
            

           <br>

            <label for="categoria">Categoria (ou Gênero):</label>
            <input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo $jogos['categoria'] ?>" required>

            <br>

       <label for="classificacao" class="form-label">Classificação:</label>
       <?php $selectedValue = $jogos['classificacao'];?>
        <select class="form-select" name="classificacao" id="classificacao">
    <option value="" <?php echo $selectedValue === '' ? 'selected' : ''; ?>>--Selecione a Classificação--</option>
    <option value="livre" <?php echo $selectedValue === 'livre' ? 'selected' : ''; ?>>Livre</option>
    <option value="crianca" <?php echo $selectedValue === 'crianca' ? 'selected' : ''; ?>>+ 10 anos</option>
    <option value="preAdolescente" <?php echo $selectedValue === 'preAdolescente' ? 'selected' : ''; ?>>+ 12 anos</option>
    <option value="adolescente" <?php echo $selectedValue === 'adolescente' ? 'selected' : ''; ?>>+ 14 anos</option>
    <option value="jovem" <?php echo $selectedValue === 'jovem' ? 'selected' : ''; ?>>+ 16 anos</option>
    <option value="adulto" <?php echo $selectedValue === 'adulto' ? 'selected' : ''; ?>>+ 18 anos</option>
    </select>

            <br>

            <label for="ano">Ano de Lançamento:</label>
            <input type="number" name="ano" id="ano" min="1900" required value="<?php echo $jogos['ano'] ?>">

            
            <br><br>

            <label for="valor">Valor em Reais:</label>
            <input type="number" name="valor" id="valor" step="0.01" min="0" value="<?php echo $jogos['valor'] ?>" required>

     
            
            <br/><br/>            
            <button type="submit" class="btn btn-primary">Alterar</button>
            <a href="index.php" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Voltar</a>
        </form>
    </div>
</body>
</html>