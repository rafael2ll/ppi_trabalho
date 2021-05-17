<?php
require 'Funcionario.php';

class Medico extends Funcionario
{
    public ?string $especialidade;
    public ?string $crm;

    public function __construct(?Pessoa $funcionario, ?string $especialidade, ?string $crm)
    {
        parent::__construct($funcionario, $funcionario->dataContrato, $funcionario->salario, null);
        $this->especialidade = $especialidade;
        $this->crm = $crm;
    }

    public function insertValues(): array
    {
        $values = array(
            "codigo" => $this->codigo,
            "especialidade" => $this->especialidade,
            "crm" => $this->crm
        );
        return $values;
    }

    public static function fromCodigo(int $codigo)
    {
        $medico = new Medico(null, null, null);
        $medico->codigo = $codigo;
        return $medico;
    }

    public static function fromRow(array $row): Medico
    {
        $funcionario = Funcionario::fromRow($row);
        return new Medico($funcionario, $row['especialidade'], $row['crm']);
    }
}