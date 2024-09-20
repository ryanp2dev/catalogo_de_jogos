<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="shortcut icon"
      type="imagex/png"
      href="../imagens/controle.ico"
    />
    <title>Cadastrar Jogo no Catálogo</title>
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

        <h2>Novo Jogo</h2>
        <form action="../cadastrar/processa_cadastrar.php" method="post">
        <br>
            <div class="row">
            <!-- Nome -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="text" class="form-control" name="nome" id="nome" placeholder=" " required>
                <label for="nome">Nome</label>
            </div>
            </div>
            <!-- Categoria -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="text" class="form-control" name="categoria" id="categoria" placeholder=" " required>
                <label for="categoria">Categoria (ou Gênero)</label>
                </div>
            </div>
            </div>

            <!-- Classificacao -->
            <div class="floating-select mb-4">
            <select class="form-select" name="classificacao" id="classificacao" required>
                <option selected>--Selecione a Classificação--</option>
                <option value="livre">Livre</option>
                <option value="crianca">+ 10 anos</option>
                <option value="preAdolescente">+ 12 anos</option>
                <option value="adolescente">+ 14 anos</option>
                <option value="jovem">+ 16 anos</option>
                <option value="adulto">+ 18 anos</option>
            </select>
            <label for="classificacao">Classificação</label>
            </div>


            <div class="row">
            <!-- ano lancamento -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="number" name="ano" id="ano" min="1900" class="form-control" placeholder=" " required>
                <label for="ano">Ano de Lançamento</label>
                </div>
            </div>
            <!-- valor -->
            <div class="col-md-6 mb-4">
                <div data-mdb-input-init class="form-floating-custom">
                <input type="number" name="valor" id="valor"  step="0.01" min="0" class="form-control" placeholder=" " required>
                <label for="valor">Valor em Reais</label>
                </div>
            </div>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar Jogo</button>
            <a href="../index.php" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Voltar para a Lista de Jogos</a>
        </form>
        </div>
        </div>    
    </div>
    </div> <!-- fim div corpo -->
    </section>
</body>
</html>