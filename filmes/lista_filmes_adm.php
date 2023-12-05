<?php
require_once "./classes/Filme.php";
$filme = new Filme();
$lista = $filme->listar();
?>

<div class="container my-5 table-responsive-sm">
    <h3>Lista de Filmes Cadastrados</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cartaz</th>
                <th scope="col">Titulo</th>
                <th scope="col">Ano</th>
                <th scope="col">Duração</th>
                <th scope="col">Classif.</th>
                <th scope="col">IMDb</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $linha) : ?>
                <tr>
                    <th scope="row"><?php echo $linha['id'] ?></th>
                    <td><img src="./assets/img/galeria/<?php echo $linha['imagem']?>" height="60"></td>
                    <td><?php echo $linha['titulo'] ?></td>
                    <td><?php echo $linha['ano'] ?></td>
                    <td><?php echo $linha['tempo'] ?></td>
                    <td><?php echo $linha['classificacao'] ?></td>
                    <td><?php echo number_format($linha['imdb'],1,',','.') ?></td>
                    <td><?php echo $linha['categorias'] ?></td>
                    <td>
                        <a href="./index.php?permissao=adm&acao=editar&id=<?= $linha['id'] ?>">
                            <span class="material-symbols-outlined">
                                edit_square
                            </span>
                        </a>
                        <a href="./index.php?permissao=adm&acao=excluir&id=<?= $linha['id'] ?>">
                            <span class="material-symbols-outlined text-danger">
                                delete_forever
                            </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>