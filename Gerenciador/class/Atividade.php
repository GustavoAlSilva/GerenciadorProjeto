<?php

require_once('CRUD.php');

class Atividade extends CRUD {
    protected string $tabela = 'atividade';

    function __construct(
        public string $id_projeto,
        public string $nome_atividade,
        private string $dt_inicio,
        private string $dt_fim,
        private string $finalizada,
        public array $erro=[]
    ){}

    public function validar_cadastro(){

        // Validação do nome:
        if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/",$this->nome_atividade)) {
            $this->erro["erro_nome"] = "Por favor informe um nome válido.";
        }
    }

    public function insert() {
        $sql = "INSERT INTO $this->tabela VALUES (null,?,?,?,?,?)";
        $sql = DB::prepare($sql);
        return $sql->execute(array($this->id_projeto, $this->nome_atividade, $this->dt_inicio, $this->dt_fim, $this->finalizada));
    }
    public function update($id_atividade) {}
}

?>