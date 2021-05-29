<?php
require 'Medico.php';

class Agenda
{
    public ?int $codigo;
    public string $data_agenda;
    public string $horario;
    public string $nome;
    public string $sexo;
    public string $email;
    public ?Medico $medico;

    public function __construct(?int $codigo, string $data_agenda, string $horario, string $nome, string $sexo, string $email, Medico $medico)
    {
        $this->codigo = $codigo;
        $this->data_agenda = $data_agenda;
        $this->horario = $horario;
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->medico = $medico;
    }

    public function insertValues(): array
    {
        $values = get_object_vars($this);
        unset($values['medico']);
        unset($values['codigo']);
        $values['cod_med'] = $this->medico->codigo;
        return $values;
    }

    public static function fromRow(array $row): Agenda
    {
        $medico = array();
        $medico['codigo'] = $row['pessoa_codigo'];
        $medico['nome'] = $row['pessoa_nome'];
        $medico['especialidade'] = $row['especialidade'];
        $medico = Medico::fromRow($medico);
        return new Agenda($row['codigo'], $row['data_agenda'], $row['horario'], $row['nome'], $row['sexo'], $row['email'], $medico);
    }
}