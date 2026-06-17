<?php

namespace Core;

class Validacao
{

    public $validacoes = [];

    public static function validar($regras, $dados)
    {


        $validacao = new self;

        // nome do campo e regras 

        foreach ($regras as $campo => $regrasDoCampo) {

            foreach ($regrasDoCampo as $regra) {

                $valorDoCampo = $dados[$campo];

                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                } elseif (str_contains($regra, ':')) {
                    $temp = explode(':', $regra);
                    $regra = $temp[0];
                    $regraAr = $temp[1];
                    $validacao->$regra($regraAr, $campo, $valorDoCampo);
                } else {
                    $validacao->$regra($campo, $valorDoCampo);
                }
            }
        }

        return $validacao;
    }

    private function required($campo, $valorDoCampo)
    {
        if (strlen($valorDoCampo) == 0) {

           $this->addError($campo, "O $campo é obrigatório");
        }
    }

    private function unique($tabela, $campo, $valor)
    {
        if (strlen($valor) == 0) {
            return;
        }

        $db = new Database(config('database'));


        $resultado = $db->query(
            query: "select * from $tabela where $campo = :valor",
            params: ['valor' => $valor]
        )->fetch();

        if ($resultado) {
           $this->addError($campo, "O $campo já está sendo utilizado");
        }
    }



    private function email($campo, $valorDoCampo)
    {
        if (!filter_var($valorDoCampo, FILTER_VALIDATE_EMAIL)) {

           $this->addError($campo, "O $campo é inválido");
        }
    }

    private function confirmed($campo, $valor, $valorDeConfirmacao)
    {

        if ($valor != $valorDeConfirmacao) {

           $this->addError($campo, "O $campo de confirmação está diferente");
 }
    }

    private function min($min, $campo, $valor)
    {
        if (strlen($valor) < $min) {
           $this->addError($campo, "A $campo precisa ter no mínimo $min caracteres");
        }
    }

    private function max($max, $campo, $valor)
    {
        if (strlen($valor) > $max) {
           $this->addError($campo, "A $campo precisa ter no máximo $max caracteres");
        }
    }

    private function strong($campo, $valor)
    {
        if (!strpbrk($valor, '!@#$%¨&*()_+-`[{}]/><,.\|')) {

           $this->addError($campo, "A $campo precisa ter um carater especial nela");
        }
    }

    private function addError($campo, $erro) {

    $this->validacoes[$campo][] = $erro;
    }

    public function naoPassou($nomeCustomizado = null)
    {

        $chave = 'validacoes';

        if ($nomeCustomizado) {
            $chave .= '_' . $nomeCustomizado;
        }

        flash()->push($chave, $this->validacoes);

        //$_SESSION['validacoes'] = $this->validacoes;

        return sizeof($this->validacoes) > 0;
        
    }
}
