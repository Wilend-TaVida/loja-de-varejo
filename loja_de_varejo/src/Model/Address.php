<?php
namespace APP\Model;

class Address{
    public int $id;
    private string $publicPlace;
    private string $streetName;
    private string $numberOfStreet;
    private string $complement;
    private string $neighborhood;
    private string $city;
    private string $zipCode;

    public function __construct(
        int $id = 0,
        string $publicPlace,
        string $streetName,
        string $numberOfStreet,
        string $complement,
        string $neighborhood,
        string $city,
        string $zipCode
    )
    {
        $this->id = $id;
        $this->publicPlace = $publicPlace;
        $this->streetName = $streetName;
        $this->numberOfStreet = $numberOfStreet;
        $this->complement = $complement;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->zipCode = $zipCode;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}