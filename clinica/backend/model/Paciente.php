<?php
require 'Pessoa.php';

class Paciente extends Pessoa
{
    public float $peso;
    public float $altura;
    public string $tsangue;


    public function __construct($pessoa, float $peso, float $altura, string $tsangue)
    {
        parent::__construct($pessoa->codigo, $pessoa->nome, $pessoa->sexo, $pessoa->email, $pessoa->telefone, $pessoa->cep, $pessoa->endereco, $pessoa->cidade, $pessoa->estado);
        $this->peso = $peso;
        $this->altura = $altura;
        $this->tsangue = $tsangue;
    }

    public static function fromRow(array $row): Paciente
    {
        $pessoa = parent::fromRow($row);
        $paciente = new static($pessoa, $row['peso'], $row['altura'], $row['tipo_sanguineo']);
        return $paciente;
    }
}