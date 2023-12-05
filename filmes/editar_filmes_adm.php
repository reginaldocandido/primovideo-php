<?php
// Inclui o arquivo que contém a definição das classes necessárias
require_once "./classes/Classificacao.php";
require_once "./classes/Filme.php";

$classificacao = new Classificacao();
$lista = $classificacao->listar();

// Obtém o valor do parâmetro "id" passado na URL via método GET
$id = $_GET['id'];

// Cria um novo objeto da classe Turma passando o valor de $id como parâmetro
$filme = new Filme($id);
?>
<div class="container my-5">
    <h3>Atualizar Filme</h3>
    <form enctype="multipart/form-data" action="./filmes/gravar_filmes.php?acao=editafilme" method="post" class="row g-3 p-3 mt-3" style="background-color: #dcf5f3;">
    <input type="text" name="id" value="<?= $filme->id ?>" hidden>    
    <div class="row">
            <div class="col-sm-8">
                <div class="col">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $filme->titulo ?>">
                </div>
                <div class="col">
                    <label for="inputAddress2" class="form-label">Sinopse</label>
                    <textarea name="sinopse" class="form-control" id="sinopse"><?= $filme->sinopse ?></textarea>
                </div>
            </div>
            <div class="col-sm-4">
                <img class="img-fluid img-thumbnail" id="preview" src="./assets/img/galeria/<?php echo $filme->imagem ?>" alt="">
                <input class="form-control mt-3"  type="file" name="imgCartaz" id="inputFile" onchange="previewImage(this)">

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <label for="inputCity" class="form-label">Ano de Lançamento</label>
                <input type="number" name="ano" min="1900" max="2099" step="1" class="form-control" value="<?= $filme->ano ?>">
            </div>

            <div class="col-md-3">
                <label for="inputZip" class="form-label">Duração</label>
                <input type="time" name="duracao" class="form-control" value="<?= $filme->tempo ?>">
            </div>

            <div class="col-md-3">
                <label for="inputZip" class="form-label">Nota IMDb</label>
                <input type="number" min="0" max="10" step="0.1" value="5.0" name="imdb" class="form-control" value="<?= $filme->imdb ?>">
                <!--input type="text" name="imdb" class="form-control" value="<?= $filme->imdb ?>"-->
            </div>

            <div class="col-md-3">
                <label for="inputState" class="form-label">Classificação</label>
                <select name="classificacao" id="inputState" class="form-select">
                    <option selected>Selecione...</option>
                    <?php
                    foreach ($lista as $linha) :
                        if ($linha['classificacao'] == $filme->classificacao) {
                            echo "<option value='{$linha['id']}' selected> 
                                         {$linha['classificacao']}
                          </option>";
                        } else {
                            echo "<option value='{$linha['id']}'> 
                                         {$linha['classificacao']}
                          </option>";
                        }
                    endforeach
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
                <label for="youtube" class="form-label">Link Trailer Youtube</label>
                <input type="text" class="form-control" name="youtube" value="<?= $filme->youtube ?>">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="background-color: #164b45;">SALVAR</button>
        </div>
    </form>
</div>