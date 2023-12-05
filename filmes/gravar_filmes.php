

<?php
require_once "../classes/Filme.php";


if ($_GET['acao'] == 'novofilme') {
    $filme = new Filme();

    $filme->titulo = $_POST['titulo'];
    $filme->sinopse = $_POST['sinopse'];
    $filme->ano = $_POST['ano'];
    $filme->tempo = $_POST['duracao'];
    $filme->imdb = $_POST['imdb'];
    $filme->imagem = $_FILES["imgCartaz"];
    $filme->classificacao = $_POST['classificacao'];
    $filme->youtube = $_POST['youtube'];

    $filme->inserir();
} elseif ($_GET['acao'] == 'editafilme') {
    $id = $_POST['id'];
    $filme = new Filme($id);

    $filme->titulo = $_POST['titulo'];
    $filme->sinopse = $_POST['sinopse'];
    $filme->ano = $_POST['ano'];
    $filme->tempo = $_POST['duracao'];
    $filme->imdb = $_POST['imdb'];
    $filme->imagem = $_FILES["imgCartaz"];
    $filme->classificacao = $_POST['classificacao'];
    $filme->youtube = $_POST['youtube'];
    $filme->atualizar();
}

?>