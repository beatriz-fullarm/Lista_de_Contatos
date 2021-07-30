<?php
include_once("conexao.php");
// var_dump($_GET);
// echo "<hr>";

$id = $_GET['id'];
// var_dump($id);
// echo "<hr>";


$sql = "SELECT * FROM contatos WHERE id='$id'"; //Essa linha esta selecionando todos os contatos por seus id.
// var_dump($sql);
// echo "<hr>";

$resultado = mysqli_query($conn, $sql); //Essa variável vai executar o comando da variável $sql.
// var_dump($resultado);
// echo "<hr>";

$row_sql = mysqli_fetch_assoc($resultado);// Essa variável, vai conter a função fetch_assoc que vai separar a linha de resultado como uma matriz associativa.
// var_dump($row_sql);
// echo "<hr>";


?>

<!DOCTYPE html>
<html>

<head>
    <title>Editar</title>
    <meta charset="UTF-8">
    <meta name="author" content="Beatriz">
    <meta name="description" content="Lista de contatos com nome e email." />
    <meta name="keywords" content="Lista, Contatos, Lista de Contatos" />
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="add-contato.css">
</head>

<body>
    <main>
        <form action="editar.php" method="POST">
            <legend>Editar contato</legend>
            
            <input type="hidden" name="id" value=<?php echo $row_sql['id'];?>>

            <label for="nome" class="labels">Digite o nome:</label>
            <input type="text" name="nome" class="dados" value="<?php echo $row_sql['nome'];?>">

            <label for="email" class="labels">Digite o email:</label>
            <input type="email" name="email" class="dados" value="<?php echo $row_sql['email']?>">

            <button type="submit" id="adicionar">Salvar Contato</button>
        </form>
    </main>

</body>

</html>