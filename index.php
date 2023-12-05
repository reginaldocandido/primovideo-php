<?php
session_start();
//Aqui vamos controlar os itens que podem aparecer no menu, conforme o usário logado
if (empty($_GET)) {
  $permissao = 'usu';
} else {
  $permissao = $_GET['permissao'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="assets/css/estilo.css">

  <title>Primo Video</title>
</head>

<body>
  <?php
  include "./classes/Filme.php";
  ?>
  <header>
    <?php include "section/menu.php"; ?>
  </header>
  <main>

    <?php
    if ($permissao != 'adm') {
      include "section/carousel.php";
      include "section/galeria.php";
    } else {
      if (empty($_GET))
        include "./filmes/lista_filmes_adm.php";
      elseif ($_GET['acao'] == 'editar') {
        include "./filmes/editar_filmes_adm.php";
      } elseif ($_GET['acao'] == 'listar') {
        include "./filmes/lista_filmes_adm.php";
      } elseif ($_GET['acao'] == 'novofilme') {
        include "./filmes/inserir_filmes_adm.php";
      }
    }
    ?>
  </main>
  <footer>
    <?php include "section/rodape.php"; ?>
  </footer>




  <script>
    function previewImage(input) {
      var preview = document.getElementById('preview');
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      if (file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = '#';
        preview.style.display = 'none';
      }
    }
  </script>

</body>

</html>