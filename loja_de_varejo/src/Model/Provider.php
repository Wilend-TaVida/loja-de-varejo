<?php
namespace APP\Model;

class Provider{
    private string $cnpj;
    private string $name;
    private ?Address $address;
    private ?string $phone;
    
    public function __construct(
        string $cnpj,
        string $name,
        ?Address $address,
        ?string $phone = null
    )
    {
        $this->cnpj = $cnpj;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}