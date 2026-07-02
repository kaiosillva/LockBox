<?php

namespace App\Controllers;

use App\Models\Usuario;
use Core\Database;
use Core\Validacao;

class LoginController
{

    public function index()
    {
        return view('login');
        die;
    }

    public function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $validacao = Validacao::validar([

            'email' => ['required', 'email'],
            'senha' => ['required']

        ], $_POST);

        if ($validacao->naoPassou()) {

            //se deu errado
            return view('/login');
        }

        //se deu certo
        $database = new Database(config('database'));

        $usuario = $database->query(
            query: "select * 
        from usuarios 
        where email = :email 
        ",
            class: Usuario::class,
            params: compact('email')
        )
            ->fetch();

        if (!($usuario && password_verify($_POST['senha'], $usuario->senha))) {

            flash()->push('validacoes', ['email' => ['Usuário ou senha estão incorretos!']]);

            return view('login');
        }

            $_SESSION['auth'] = $usuario;

            flash()->push('mensagem', 'Seja Bem Vindo ' . $usuario->nome . '!');

            return redirect('/dashboard');
            
    }
}
