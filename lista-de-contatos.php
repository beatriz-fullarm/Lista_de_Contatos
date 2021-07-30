<?php 
include_once("conexao.php");

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
                <a href="pagina-add-contato.html"><button type="button" id="adicionar">Adicionar</button></a>
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
                    //Receber o número da página
                    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT); //Variável vazia 
                    // var_dump($pagina_atual);
                    // echo "<hr>";
                    
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1; //Se a variável $pagina_atual estiver vazia adicionar o valor 1, se não, adicionar o valor 1.
                    //  var_dump($pagina);
                    //  echo "<hr>";

                    //Setar a quantidade de itens por página
                    $qnt_result_pg = 15; //define a quantidade de resultados que serão exibidos
                    // var_dump($qnt_result_pg);
                    // echo "<hr>";

                    //Calcular o inicio da visualização
                    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg; //Faz a $qnt_result_pg vezes o valor de $pagina, menos o valor de $qnt_result_pg.
                    // var_dump($inicio);
                    // echo "<hr>";

                    $sql = "SELECT * FROM contatos ORDER BY nome LIMIT $inicio, $qnt_result_pg "; //Vai selecionar todos os contatos do 0, ao 18.
                    // var_dump($sql);
                    // echo "<hr>";
                    $resultados = mysqli_query($conn, $sql);
                    // var_dump($resultados);
                    // echo "<hr>";

                    while ($result = mysqli_fetch_assoc($resultados)){
                    ?>
                    <tr>
                        <td><?php echo $result['nome']?></td>
                        <td><?php echo $result['email']?></td>
                        <td>
                            <a href="editar-contato.php?id=<?php echo $result['id']?>"><button id="editar" type="button" class="editar">Editar</button></a>

                            <a href="excluir.php?id=<?php echo $result['id']?>"><button id="excluir" type="button" class="excluir">Excluir</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section id="caixa_paginacao"> <?php //Lugar onde vai ser mostrado os links para mudar de página ?>
            <div>
                <?php 
                //Paginação - Somar a quantidade de contatos
                $result_pg = "SELECT COUNT(id) AS num_result FROM contatos";
                $resultado_pg = mysqli_query($conn, $result_pg);
                $row_pg = mysqli_fetch_assoc($resultado_pg);
            

                //Quantidade de páginas
                $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); //Essa variável divide a quantidade de linhas do banco de dados, pelo número de resultados
                //que podem ser exibidos em uma tela para poder encontrar o número de páginas necessárias para exibir todos os contatos.
                 // var_dump($quantidade_pg);
               

                //Limitar os links antes e depois
                $max_links = 1;

                // $pag_ant = $pagina - $max_links; //$pag_ant recebe o valor de $pagina menos o $max_links;
                //  var_dump($pag_ant);
                //  echo "<hr>";
                // $pag_ant <= $pagina - 1; //Se o valor de $pag_ant for menor ou igual ao valor de $pagina, tira 1.
                // var_dump($pag_ant);
                // echo "<hr>";
                // $pag_ant ++; //Adiciona 1 na variável dentro do loop
                // var_dump($pag_ant);
                // echo "<hr>";

                for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
                    if($pag_ant >= 1){
                        echo "<a href='lista-de-contatos.php?pagina=$pag_ant'>$pag_ant</a>";
                    }
                }
                echo "$pagina";

                // $pag_dep = $pagina + 1; //1+1 vale 2
                // var_dump($pag_dep);
                // $pag_dep <= $pagina + $max_links; //Se $pag_dep for menor ou igual ao valor de $pagina + o valor de $max_links, então adicione mais 1.
                // var_dump($pag_dep);
                // $pag_dep ++;
                // var_dump($pag_dep);

                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
                    if($pag_dep <= $quantidade_pg){
                        echo "<a href='lista-de-contatos.php?pagina=$pag_dep'>$pag_dep</a>";
                    }
                }
                ?>
            </div>

        </section>
    </main>

</body>

<footer id="caixa_footer">


</footer>

</html>
