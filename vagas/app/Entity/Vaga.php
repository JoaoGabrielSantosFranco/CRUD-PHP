<?php
namespace App\Entity;

use \App\Db\Database;

class Vaga
{
    public $id;

    public $titulo;

    public $descricao;

    public $ativo;

    public $data;


    // Metodo responsavel por cadastrar uma nova vaga no banco 
    // @return boolean 
    public function cadastrar()
    {
        $this->data = date('Y-m-d H:i:s');

        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data,
        ]);
        return true;
    }

}