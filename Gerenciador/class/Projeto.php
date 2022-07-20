<?php

require_once('CRUD.php');

class Projeto extends CRUD {
    protected string $tabela = 'projeto';

    function __construct(
        public string $nome_projeto,
        private string $dt_inicio,
        private string $dt_fim,
        private string $porc_completo,
        private string $atrasado,
        public array $erro=[]
    ){}

    public function validar_cadastro(){

        // Validação do nome:
        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/",$this->nome_projeto)) {
            $this->erro["erro_nome"] = "Por favor informe um nome válido.";
        }
    }

    public function insert() {
        $sql = "INSERT INTO $this->tabela VALUES (null,?,?,?,?,?)";
        $sql = DB::prepare($sql);
        return $sql->execute(array($this->nome_projeto, $this->dt_inicio, $this->dt_fim, $this->porc_completo, $this->atrasado));
    }
    public function update($id_projeto) {}
}

?>