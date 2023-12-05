<?php
require_once "classes/Filme.php";
$filme_id = $_GET['id'];

$filme = new Filme($filme_id);

$URL_trailer = "https://www.youtube.com/embed/".$filme->youtube;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <style>
    body {
      background-color: #164b45;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .video-container {
      width: 100%;
      height: 400px;
      /* Altura fixa desejada */
      overflow: hidden;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: 0;
      /* Remove a borda padrão do iframe */
    }
  </style>

  <title>Primo Video</title>
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->

</head>

<body>
  <?php
  include "./section/menu.php";
  ?>
  <main class="container">
    <div class="mt-2 rounded rounded bg-dark video-container">
      <iframe src="<?=$URL_trailer;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <div class="row mb-2">
      <div class=" col">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
        <div class=" col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary"><?=$filme->classificacao;?> | <?=$filme->ano;?></strong>
          <h2 class="mb-0"><?=$filme->titulo;?></h2>
          <div class="mb-1 text-muted"><?=$filme->categorias;?></div>
          <p class="card-text mb-auto"><?=$filme->sinopse;?></p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img class="bd-placeholder-img" height="250" src="../assets/img/galeria/filme1.jpg" alt="">
        </div>
      </div>
    </div>
    </div>
  </main>

</body>

</html>