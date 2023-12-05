<?php
// Inclui o arquivo que contém a definição das classes necessárias
require_once "./classes/Classificacao.php";

$classificacao = new Classificacao();
$lista = $classificacao->listar();

?>
<div class="container my-3">
    <h3>Novo Filme</h3>
    <form enctype="multipart/form-data" action="./filmes/gravar_filmes.php?acao=novofilme" method="post" class="row g-3 p-3 mt-3" style="background-color: #dcf5f3;">
        <div class="row">
            <div class="col-sm-8">
                <div class="col">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="col">
                    <label for="sinopse" class="form-label">Sinopse</label>
                    <textarea name="sinopse" class="form-control" id="sinopse"></textarea>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="recortarimg">
                    <img id="preview" src="./assets/img/galeria/semimagem.jpg">
                </div>
                <input class="form-control mt-3"  type="file" name="imgCartaz" id="inputFile" onchange="previewImage(this)">

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <label for="ano" class="form-label">Ano de Lançamento</label>
                <input type="number" min="1900" max="2099" step="1" class="form-control" name="ano">
            </div>

            <div class="col-md-3">
                <label for="duracao" class="form-label">Duração</label>
                <input type="time" class="form-control" name="duracao">
            </div>

            <div class="col-md-3">
                <label for="imdb" class="form-label">Nota IMDb</label>
                <!-- <input type="number" min="0" max="10" step="0.1" value="5.0" class="form-control" value="<?= $filme->imdb ?>"> -->
                <input type="text" class="form-control" name="imdb">
            </div>

            <div class="col-md-3">
                <label for="classificacao" class="form-label">Classificação</label>
                <select id="classificacao" class="form-select" name="classificacao">
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
                <input type="text" class="form-control" name="youtube">
            </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="background-color: #164b45;">SALVAR</button>
        </div>
    </form>
</div>