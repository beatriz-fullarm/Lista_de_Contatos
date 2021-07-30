<?php
include_once("conexao.php");
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
// var_dump($id);
// echo "<br>";
// echo "<hr>";

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
// var_dump($nome);
// echo "<hr>";

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
// var_dump($email);
// echo "<hr>";

$sql = "UPDATE `contatos` SET `nome` = '$nome', `email` = '$email' WHERE `id` = '$id'";
// var_dump($sql);
// echo "<hr>";

$result = mysqli_query($conn, $sql); 
// var_dump($result);
// echo "<hr>";

// $resultado = mysqli_fetch_assoc($result);
// var_dump($resultado);

if(mysqli_affected_rows($conn)){
die(

    "<script>
     location='lista-de-contatos.php';
    </script>");
} die(
    "<script>
    alert('Não foi possível editar o contato');
    location='lista-de-contatos.php';
    </script>");


?>