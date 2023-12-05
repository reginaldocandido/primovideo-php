<?php
  $filmes = new Filme();
  $lista = $filmes->listar();

?>
<div class="album py-5 bg-light">
  <div class="container">
    <!-- Início da linha de Cartões -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($lista as $filme) : ?>
        <?php $sinopseCurta = substr($filme["sinopse"], 0, 80) . "..."?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?= './assets/img/galeria/' . $filme['imagem']; ?>" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225">
            <div class="card-body">
              <h6 class="card-title p-2" style="background-color: #abe5de; color: #164b45; border-radius: 5px"><?= $filme['titulo']; ?></h6>
              <p class="card-text"><?php echo $sinopseCurta; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                  <h6 class="text-muted"><?= $filme['categorias']; ?></h6>
                </div>
                <h6 class="text-muted"><?= $filme['tempo']; ?></h6>
              </div>
              <a href="detalhes.php?permissao=usu&id=<?= $filme['id']; ?>" type="button" class="btn btn-success">Detalhes</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>