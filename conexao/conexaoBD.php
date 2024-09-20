<?php 

$host = 'localhost';
$porta = '3306'; //3305 para rodar nos computadores do IFMS
$banco = 'catalogo';
$usuario = 'root';
$senha = '';

try {

    $conexao = new PDO("mysql:host=$host;port=$porta;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo '<br/>Erro na CONEXÃO COM O BANCO DE DADOS' . $e->getMessage();
    // "Falha no sistema, por favor contate o suporte!"
}
?>