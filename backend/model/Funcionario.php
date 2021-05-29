<?php

require 'Pessoa.php';

class Funcionario extends Pessoa
{
    public ?string $data_contrato;
    public ?float $salario;
    private ?string $senha_hash;

    public function __construct(?Pessoa $pessoa, ?string $dataContrato, ?float $salario, ?string $senhaHash)
    {
        parent::__construct($pessoa->codigo, $pessoa->nome, $pessoa->sexo, $pessoa->email, $pessoa->telefone, $pessoa->cep, $pessoa->logradouro, $pessoa->cidade, $pessoa->estado);
        $this->data_contrato = $dataContrato;
        $this->salario = $salario;
        $this->senha_hash = $senhaHash;
    }

    public function insertValues(): array
    {
        return array(
            "codigo" => $this->codigo,
            "data_contrato" => $this->data_contrato,
            "salario" => $this->salario,
            "senhaHash" => $this->senha_hash
        );
    }

    public static function fromRow(array $row): Funcionario
    {
        $pessoa = Pessoa::fromRow($row);
        return new Funcionario($pessoa, $row['data_contrato'], $row['salario'], $row['senha_hash']);
    }
}