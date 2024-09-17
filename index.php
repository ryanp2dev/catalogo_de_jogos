<?php 

require_once './conexao/conexaoBD.php';
try {
  
    $mensagem = ''; 
    
    // Verifica se uma pesquisa foi feita
    if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
        $buscar = $_GET['buscar'];
        $sql = "SELECT * FROM jogos WHERE nome = :buscar";
        
        $stmt = $conexao->prepare($sql);
       
        $stmt->bindParam(':buscar', $buscar, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $listaJogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Verifica se a busca retornou algum resultado
            if (!empty($listaJogos)) {
                $mensagem = 'Dados encontrados para o termo ' . $buscar . '.';
                $mensagemTipo = 'success';
            } else {
                $mensagem = 'Nenhum dado encontrado para o termo ' .$buscar . '.';
                $mensagemTipo = 'warning';

            }
        } else {
            $mensagem = 'Falha ao buscar os dados. Tente novamente mais tarde.';
            $mensagemTipo = 'danger';
        }
    } else {
        // Exibe todos os jogos se não houver pesquisa
        $sql = "SELECT * FROM jogos ORDER BY id";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        
        $listaJogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    $mensagem = 'Erro ao listar os dados: ' . $e->getMessage();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="shortcut icon"
      type="imagex/png"
      href="./imagens/controle.ico"
    />
    <title>Jogos Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-secondary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 0;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <img src="./imagens/controle.png" width="40" height="40">
    <a class="navbar-brand" href="#">Catálogo de Jogos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>   
      </ul>
      <form class="d-flex" role="search"  method="GET">
        <input class="form-control me-2"  type="search" placeholder="Buscar por nome" name="buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>



    <div class="container">


    <div class="container mt-4">
 
    <?php if ($mensagem): ?>
        <div id="timer" class="alert alert-<?PHP ECHO $mensagemTipo?>" role="alert">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>
        <h2>Jogos:</h2>

        <?php if (!empty($_GET['msgSucesso'])) { ?>
            <div id="timer" class="alert alert-success" id="msgSucesso" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } if (!empty($_GET['msgErro']))  { ?>
            <div id="timer" class="alert alert-danger" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>




        
    <a href="./cadastrar/cadastrar.php" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Novo Jogo</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria (ou Gênero)</th>
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
            <td><?php echo  number_format($jogos['valor'],2,",","."); ?></td>
            <td>
            <a href="./visualizar/visualizar.php?id=<?php echo $jogos['id']; ?>" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Visualizar</a>
            <a href="./alterar/alterar.php?id=<?php echo $jogos['id']; ?>" class="btn btn-info" tabindex="-1" role="button" aria-disabled="true">Alterar</a>
            <a href="./excluir/excluir.php?id=<?php echo $jogos['id']; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">Excluir</a>
            </td>
        </tr>
        <?php } ?>            
    </tbody>
    </table>
    </div>
    


    <script>
// Exibir a mensagem de resultado por 5 segundos
document.addEventListener("DOMContentLoaded", function() {
    let mensagem = document.getElementById('timer');
    if (mensagem) {
        mensagem.style.display = 'block'; // Exibe a mensagem

        // Após 5 segundos, oculta a mensagem
        setTimeout(function() {
            mensagem.style.display = 'none';
        }, 5000); // 5000 milissegundos = 5 segundos
    }
});
</script>
</body>
</html>




