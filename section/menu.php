
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #164b45;">
    <div class="container-fluid">

        <a class="navbar-brand" href="./index.php">
            <img src="./assets/img/logo_primo_video.svg" alt="" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Início</a>
                </li>

                <li class="nav-item dropdown " style="<?= ($permissao != "adm") ? 'display: none;' : '' ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filmes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./index.php?acao=listar&permissao=adm">Listar Filme</a></li>
                        <li>
                        <li><a class="dropdown-item" href="./index.php?acao=novofilme&permissao=adm">Novo Filme</a></li>
                        <li>
                        <li><a class="dropdown-item" href="#" >Atualizar Filme</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown" style="<?= ($permissao != "adm") ? 'display: none;' : '' ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Listar Categorias</a></li>
                        <li><a class="dropdown-item" href="#">Nova Categoria</a></li>
                        <li><a class="dropdown-item" href="#">Atualizar Categoria</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown" style="<?= ($permissao != "adm") ? 'display: none;' : '' ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Meus Favoritos</a></li>
                        <li><a class="dropdown-item" href="#">Listar Usuários</a></li>
                        <li><a class="dropdown-item" href="#">Novo Usuário</a></li>
                        <li><a class="dropdown-item" href="#">Atualizar Usuario</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
            
                <a class="btn btn-outline-success" 
                    <?= (!isset($_SESSION['usuario_logado'])) ? 'href="section/login.php' : 'href="./usuario/usuario-logout.php' ?> ">
                    <?= (!isset($_SESSION['usuario_logado'])) ? 'Login' : 'Sair' ?>
                </a>


            </div>
        </div>

    </div>
</nav>