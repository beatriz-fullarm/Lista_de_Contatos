<?php 
include_once("conexao.php");
// var_dump($_POST);
// echo "<hr>";

// $id = $_POST['id'];
// var_dump($id);
// echo "<hr>";

$nome = $_POST['nome'];
// var_dump($nome);
// echo "<hr>";

$email = $_POST['email'];
// var_dump($email);
// echo "<hr>";

$sql = "INSERT INTO `contatos` (`id`, `nome`, `email`) VALUES (default, '$nome', '$email')";
// var_dump($sql);
// echo "<hr>";

if($conn->query($sql)){ //
    die(

        "<script>
        alert('Contato adicionado com sucesso');
        location='lista-de-contatos.php';
        </script>");

}
die(
    "<script>
    alert('Não foi possível adicionar o contato');
    location='lista-de-contatos.php';
    </script>");

?>