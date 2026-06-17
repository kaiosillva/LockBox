<?php

use Core\Database;
use Core\Validacao;
use App\Models\Usuario;

// 1. Receber o formulário com email e senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $database = new Database(config('database'));

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([

        'email' => ['required', 'email'],
        'senha' => ['required']

    ], $_POST);

    if ($validacao->naoPassou()) {

        view('/login');
        exit();
    }

    // 2. Fazer uma consulta no banco de dados com o e-mail e senha
    $usuario = $database->query(
        query: "select * 
        from usuarios 
        where email = :email 
        ",
        class: Usuario::class,
        params: compact('email')
    )
        ->fetch();

    if ($usuario && password_verify($_POST['senha'], $usuario->senha)) {

        $_SESSION['auth'] = $usuario;

        flash()->push('mensagem', 'Seja Bem Vindo ' . $usuario->nome . '!');
        header('location: /dashboard');

        exit();
    } else {

        flash()->push('validacoes', ['email' => ['Usuário ou senha estão incorretos!']]);
    }
}





view('login');
