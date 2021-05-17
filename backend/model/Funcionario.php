<?php
require 'Pessoa.php';

class Funcionario extends Pessoa
{
    public ?string $dataContrato;
    public ?float $salario;
    private ?string $senhaHash;

    public function __construct(?Pessoa $pessoa, ?string $dataContrato, ?float $salario, ?string $senhaHash)
    {
        parent::__construct($pessoa->codigo, $pessoa->nome, $pessoa->sexo, $pessoa->email, $pessoa->telefone, $pessoa->cep, $pessoa->logradouro, $pessoa->cidade, $pessoa->estado);
        $this->dataContrato = $dataContrato;
        $this->salario = $salario;
        $this->senhaHash = $senhaHash;
    }

    public function insertValues(): array
    {
        $values = array(
            "codigo" => $this->codigo,
            "dataContrato" => $this->dataContrato,
            "salario" => $this->salario,
            "senhaHash" => $this->senhaHash
        );
        return $values;
    }

    public static function fromRow(array $row): Funcionario
    {
        $pessoa = Pessoa::fromRow($row);
        $funcionario = new Funcionario($pessoa, $row['data_contrato'], $row['salario'], $row['senha_hash']);
        return $funcionario;
    }
}