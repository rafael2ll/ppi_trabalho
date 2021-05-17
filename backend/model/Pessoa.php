<?php


class Pessoa
{
    public ?int $codigo;
    public ?string $nome;
    public ?string $sexo;
    public ?string $email;
    public ?string $telefone;
    public ?string $cep;
    public ?string $logradouro;
    public ?string $cidade;
    public ?string $estado;

    public function __construct(?int $codigo, ?string $nome, ?string $sexo, ?string $email, ?string $telefone, ?string $cep, ?string $logradouro, ?string $cidade, ?string $estado)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function insertValues(): array
    {
        $values = get_object_vars($this);
        unset($values['codigo']);
        return $values;
    }

    public static function fromRow(array $row): Pessoa
    {
        $pessoa = new Pessoa(
            $row['codigo'],
            $row['nome'],
            $row['sexo'],
            $row['email'],
            $row['telefone'],
            $row['cep'],
            $row['logradouro'],
            $row['cidade'],
            $row['estado']);
        return $pessoa;
    }
}