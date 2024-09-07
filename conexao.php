<?php 

try {
    $host = "localhost";
$usuario = "rootas";
$senha = '';
$banco = "catalogo";
$porta = 3306;

$conecao =new PDO("mysql:host=$host;port=$porta;dbname=$banco",$usuario,$senha);





$sql = "SELECT * FROM jogos";
$consulta = $conecao->prepare($sql);
$consulta->execute();
$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($resultados);
} catch ( Exception $e ) {
    echo "<h1>Por favor entre em contato com suporte</h1> ";
}
?>
