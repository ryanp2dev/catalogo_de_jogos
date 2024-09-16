<?php 

require_once '../conexao/conexaoBD.php';

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
    header('Location: ../index.php?msgErro=' . $msg);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="shortcut icon"
      type="imagex/png"
      href="../imagens/controle.ico"
    />
    <title>Visualizar Jogo</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section class="text-center">
        <!-- div imagem -->
        <div class="bg-image" style="
        background-image: url('../imagens/fundo.jpg');
        height: 300px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;"></div>

        <!-- div corpo -->
        <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
        margin-top: -100px;
        backdrop-filter: blur(30px);
        ">

        <!-- alinhamento -->
        <div class="card-body py-5 px-md-5 color-form">
        <div class="row d-flex justify-content-center">
        <div class="col-lg-8">

        <h2>Visualizar Jogo</h2>        
        <form action="">
        <input type="hidden" name="id" value="<?php echo $jogos['id']; ?>">
        <br>
        <div class="row">
            <!-- Nome -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="text" class="form-control" name="nome" id="nome" placeholder=" " value="<?php echo $jogos['nome'] ?>" readonly>
                <label for="nome">Nome</label>
            </div>
            </div>
            <!-- Categoria -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="text" class="form-control" name="categoria" id="categoria" placeholder=" " value="<?php echo $jogos['categoria'] ?>" readonly>
                <label for="categoria">Categoria (ou Gênero):</label>
                </div>
            </div>
            </div>

        <!-- Classificacao -->
        <div class="floating-select mb-4">
        <?php $selectedValue = $jogos['classificacao'];?>
        <select class="form-select" name="classificacao" id="classificacao" disabled>
        <option value="" <?php echo $selectedValue === '' ? 'selected' : ''; ?>>--Selecione a Classificação--</option>
        <option value="livre" <?php echo $selectedValue === 'livre' ? 'selected' : ''; ?>>Livre</option>
        <option value="crianca" <?php echo $selectedValue === 'crianca' ? 'selected' : ''; ?>>+ 10 anos</option>
        <option value="preAdolescente" <?php echo $selectedValue === 'preAdolescente' ? 'selected' : ''; ?>>+ 12 anos</option>
        <option value="adolescente" <?php echo $selectedValue === 'adolescente' ? 'selected' : ''; ?>>+ 14 anos</option>
        <option value="jovem" <?php echo $selectedValue === 'jovem' ? 'selected' : ''; ?>>+ 16 anos</option>
        <option value="adulto" <?php echo $selectedValue === 'adulto' ? 'selected' : ''; ?>>+ 18 anos</option>
        </select>
        <label for="classificacao">Classificação:</label>
        </div>

        <div class="row">
            <!-- ano lancamento -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="number" name="ano" id="ano" min="1900" class="form-control" placeholder=" " value="<?php echo $jogos['ano'] ?>" readonly>
                <label for="ano">Ano de Lançamento:</label>
                </div>
            </div>
            <!-- valor -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="number" name="valor" id="valor"  step="0.01" min="0" class="form-control" placeholder=" " value="<?php echo $jogos['valor'] ?>" readonly>
                <label for="valor">Valor em Reais:</label>
                </div>
            </div>
            </div>     
            <a href="../index.php" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Voltar</a>
        </form>
        </div>
        </div>
    </div>
    </div>
</section>
</body>
</html>