<?php

class Livro
{

    public $id;
    public $titulo;
    public $autor;
    public $descricao;
    public $ano_de_lancamento;
    public $usuario_id;
    public $nota_avaliacao;
    public $count_avaliacoes;
    public $imagem;


    public static function make($item)
    {

        $livro = new self();

        $livro->id = $item['id'];
        $livro->titulo = $item['titulo'];
        $livro->autor = $item['autor'];
        $livro->descricao = $item['descricao'];
        $livro->ano_de_lancamento = $item['ano_de_lancamento'];
        $livro->usuario_id = $item['usuario_id'];
        $livro->nota_avaliacao = $item['nota_avaliacao'];
        $livro->count_avaliacoes = $item['count_avaliacoes'];
        $livro->imagem = $item['imagem'];

        return $livro;
    }

    public function query($where, $params)
    {
        $database = new Database(config('database'));

        return $database->query(
            "select 
        l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento, l.imagem
        , ifnull(round(sum(a.nota) / 5.0), 0) as nota_avaliacao
        , ifnull(count(a.id), 0) as count_avaliacoes
    from
        livros l
        left join avaliacoes a on a.livro_id = l.id
    where
        $where
    group by l.id,
        l.titulo, l.autor, l.descricao, l.ano_de_lancamento, l.imagem",

            self::class,

            $params

        );
    }

    public static function get($id)
    {
        return (new self)->query('l.id = :id', ['id' => $id])->fetch();
    }

    public static function meus($usuario_id)
    {   
        return (new self)->query('l.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchall();   
    }

    public static function all($filtro = '')
    {
        return (new self)->query('titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();
    }
}
