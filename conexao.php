<?php 
$servidor = "localhost:3306"; //Nome do servidor
$usuario = "root"; //Nome do usuário
$senha = ""; // Senha do usuário
$bancoDados = "cadastro"; //Banco de dados a ser utilizado

$conn = new mysqli($servidor, $usuario, $senha, $bancoDados);
if (!$conn){
    die("Conexão falhou: " . mysqli_connect_error());
}

// echo "Sucesso na conexão";


//mysqli_connect() é um função interna do PHP para estabelecer uma nova conexão 
// com um servidor MySQL.

// Funcão die() é executada para "matar" o scrip e nos apresentar a mensagem de rro de conexão
// Caso a conexão funcione, será printada uma mensagem de sucesso na conexão.

?>