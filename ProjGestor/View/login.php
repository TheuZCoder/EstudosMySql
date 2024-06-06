<?php include_once('loginAuth.php') ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="header">
    <img src="/View/img/logo-senai2.png" alt="logo" style="position: absolute; top: 20px; left: 20px; width: 350px; background-color: rgba(99, 99, 99, 0.518);">
</div>
    <div class="login-container">
        <h2>Login</h2>
        <p>Bem vindo ao Gestor Senai-SP</p>
        <form action="loginAuth.php" method="POST">
            <input type="text" id="cpf_usuario" name="cpf_usuario" placeholder="CPF" required>
            <input type="password" id="senha_usuario" name="senha_usuario" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
