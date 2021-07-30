<?php 
include_once("conexao.php"); //Inclui a conexão com o banco de dados nesse arquivo.

if (isset($_GET['pesquisa']) == true){
    $pesquisa = $_GET['pesquisa'];
}else{
    $pesquisa = "";
}
// Verifica se existe algo dentro do campo 'pesquisa', se sim, guarda esse algo na variável $pesquisa,
//Se não, guarda um valor vazio dentro dessa variável $pesquisa.

$sql = "SELECT * FROM contatos WHERE nome LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%'"; //Comando que seleciona os contatos que se parecem com $pesquisa.
$contatos = $conn->query($sql); // Variável que guarda a classe $conn, para que eu possa acessar a função query e executar o comando da variável $sql.

?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Contato</title>
    <meta charset="UTF-8">
    <meta name="author" content="Beatriz">
    <meta name="description" content="Lista de contatos com nome e email." />
    <meta name="keywords" content="Lista, Contatos, Lista de Contatos" />
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="lista-de-contatos.css">
</head>

<body>
    <header>
        <h1>Contatos</h1>
    </header>

    <main id="contatos">
        <section id="caixa_pesquisa">
            <div id="barra_de_pesquisa">
                <form action="pesquisar.php" method="GET">
                    <div>
                        <label for="pesquisa"></label>
                        <input type="search" name="pesquisa" id="busca" placeholder="Buscar Contato">
                        <button type="submit" id="pesquisa">Pesquisar</button>
                    </div>
                </form>
                <a  href="pagina-add-contato.html"><button type="button" id="adicionar">Adicionar</button></a>
            </div>


        </section>
        <section>
            <table id="tabela">

                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col" colspan="2" class="edicoes" style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                     

                    while ($resultados = mysqli_fetch_array($contatos)){
                    //guarda os dados em índices numéricos e também índices associativos usando os nomes dos campos
                    //Por isso consigo acessar os dados na tabela utilizando o echo $resultados['nome/email']
                    //também funcionaria com echo $resultados['1/2'].
                    
                    ?>
                    <tr>
                        <td><?php echo $resultados['nome']?></td>
                        <td><?php echo $resultados['email']?></td>
                        <td>
                            <a href="editar-contato.php?id=<?php echo $resultados['id']?>"><button id="editar" type="button" class="editar">Editar</button></a>

                            <a href="excluir.php?id=<?php echo $resultados['id']?>"><button id="excluir" type="button" class="excluir">Excluir</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

<footer id="caixa_footer">


</footer>

</html>