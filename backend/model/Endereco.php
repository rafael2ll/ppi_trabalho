<?php

class Endereco
{
    public string $cep;
    public string $logradouro;
    public string $cidade;
    public string $estado;

    /**
     * Endereco constructor.
     * @param string $cep
     * @param string $logradouro
     * @param string $cidade
     * @param string $estado
     */
    public function __construct(string $cep, string $logradouro, string $cidade, string $estado)
    {
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function insertValues(): array
    {
        return get_object_vars($this);
    }

    public static function fromRow(array $row)
    {
        return new Endereco($row['cep'], $row['logradouro'], $row['cidade'], $row['estado']);
    }
}