<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios
        WHERE email = '{$email}'
        AND senha = '{$senha}'";

include "../classes/conexao.php";

$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['email'];
$permissao = $linha['permissao'];

$url_destino = "../index.php?acao=listar&permissao=" . $permissao;

if ($permissao == 'adm'){
	if ($usuario_logado == null) {
		// Usuário ou senha inválida
		header('Location: usuario-erro.php');
	} 
	else {
		session_start();
		$_SESSION['usuario_logado'] = $usuario_logado;
		header("Location: $url_destino");
	}
} else {
	if ($usuario_logado == null) {
		// Usuário ou senha inválida
		header('Location: usuario-erro.php');
	} 
	else {
		session_start();
		$_SESSION['usuario_logado'] = $usuario_logado;
		header("Location: $url_destino");
	}
}
