<?php 
include_once("conexao.php");
$contato = $_GET['id'];
$sql = "DELETE FROM `contatos` WHERE id LIKE '$contato'";
if($conn->query($sql)){
    die(
    "<script>
    location='lista-de-contatos.php';
    </script>");
}die(
    "<script>
    location='lista-de-contatos.php';
    </script>")


?>