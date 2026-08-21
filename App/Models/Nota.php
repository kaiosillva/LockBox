<?php

namespace App\Models;

use Core\Database;

class Nota
{

    public $id;
    public $usuario_id;
    public $titulo;
    public $nota;
    public $data_criacao;
    public $data_atualizacao;

    public static function all($pesquisar)
    {
        $db = new Database(config('database'));

        return $db->query(
            query: "select * from notas where usuario_id = :usuario_id" . (

                $pesquisar ? " and titulo like :pesquisar" : null

            ),
            class: self::class,
            params: array_merge(['usuario_id' => auth()->id], $pesquisar ? ['pesquisar' => "%$pesquisar%"] : [])
        )->fetchAll();
    }

    public static function delete($parametro)
    {
        $db = new Database(config('database'));

        $db->query(
            query: "
            delete from notas
            where id = :id",
            params: [
                'id' => $parametro
            ]
        );
    }

    public static function create($data) 
    {
    
        $db = new Database(config('database'));

        $db->query(
            query: "insert into notas (usuario_id, titulo, nota, data_criacao, data_atualizacao) 
            values (:usuario_id, :titulo, :nota, :data_criacao, :data_atualizacao)",
            params: array_merge($data, [
                'data_criacao' => date('Y-m-d H:i:s'),
                'data_atualizacao' => date('Y-m-d H:i:s'),
            ])
        );
    }

    public static function update($id, $titulo, $nota)
    {
        $bd = new Database(config('database'));

        $set = "titulo = :titulo";
        if ($nota) {

            $set .= ", nota = :nota";
        }

        $bd->query(
            query: "
            update notas 
            set $set
            where id = :id",
            params: array_merge([
                'id' => $id,
                'titulo' => $titulo,

            ], $nota ? ['nota' => encrypt($nota)] : [])
        );
    }

    public function nota()
    {

        if (session()->get('mostrar')) {
            return decrypt($this->nota);
        }

        return str_repeat('*', rand(10, 100));
    }
}
