<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Primo Video</title>

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #164b45;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 15px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    
    <div class="login-container">
        <h2 class="login-title">Primo Vídeo</h2>
        <p class="login-title">SEJA BEM-VINDO</p>

        <!-- Formulário de Login -->
        <form action="../usuario/usuario-login.php" method="post">
            <div class="mb-3">
                <label for="inputUsuario" class="form-label">Digite seu Usuário</label>
                <input type="text" class="form-control" id="inputUsuario" name="email" required>
            </div>
            <div class="mb-3">
                <label for="inputSenha" class="form-label">Digite sua Senha</label>
                <input type="password" class="form-control" id="inputSenha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #164b45">ENTRAR</button>
        </form>
    </div>


</body>

</html>