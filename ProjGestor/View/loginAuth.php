<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpf_usuario = $_POST['cpf_usuario'];
        $senha_usuario = $_POST['senha_usuario'];

        $data = array(
            'cpf_usuario' => $cpf_usuario,
            'senha_usuario' => $senha_usuario
        );

        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $result = file_get_contents('http://localhost:8080/usuario/login', false, $context);

        if ($result === false) {
            echo 'Erro ao conectar com o servidor.';
        } else {
            $response = json_decode($result, true);

            if ($response && isset($response['message'])) {
                // Autenticação bem-sucedida
                session_start();
                $_SESSION['cpf_usuario'] = $cpf_usuario;
                header('Location: /View/locais.php');
                exit;
            } elseif ($response && isset($response['error'])) {
                // Erro de autenticação
                echo $response['error'];
            } else {
                echo 'Resposta inválida do servidor.';
            }
        }
    }
?>
