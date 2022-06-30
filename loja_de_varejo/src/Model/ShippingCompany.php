<?php
namespace APP\Model;

class ShippingCompany
{
    private string $name;
    private string $cnpj;

    /**
     * Função para calcular o preço do frete
     *
     * @param float $distance
     * @return float
     */
    public function shipPrice(float $distance):float
    {
        return $distance * 0.5;
    }
}