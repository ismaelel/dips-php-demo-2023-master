<?php

namespace model;

class Order
{
    protected int $ref;
    protected int $userId;
    protected float $priceTTC;
    protected float $priceHT;
    protected float $totalVat;

    /**
     * @return int
     */
    public function getRef(): int
    {
        return $this->ref;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return float
     */
    public function getPriceTTC(): float
    {
        return $this->priceTTC;
    }

    /**
     * @return float
     */
    public function getPriceHT(): float
    {
        return $this->priceHT;
    }

    /**
     * @return float
     */
    public function getTotalVat(): float
    {
        return $this->totalVat;
    }

    public function generateRef(){
        $res = rand(1000000, 9999999);
        $this->ref = $res;
        return $res;
    }

    public function addProductPriceToOrder(Product $product, int $quantity) {
        $productPriceTTC = $product->totalPriceTTC($quantity);
        $productPriceHT = $product->totalPriceTTC($quantity) - $product->getVat();

        // Mettre à jour les attributs de la commande
        $this->priceTTC += $productPriceTTC;
        $this->priceHT += $productPriceHT;
        $this->totalVat += $product->getVat() * $quantity;
    }
}