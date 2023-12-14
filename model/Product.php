<?php

namespace model;

use PDO;
use PDOException;

class Product
{
    public string $label;
    public string $description;
    public $brand;

    protected int $priceTTC = 100;
    protected int $priceHT = 0;
    protected float $vat = 5.5;
    protected float $quantity;

    public function __construct ($label, $description, $brand) {
        $this->label = $label;
        $this->description = $description;
        $this->brand = $brand;
    }

    /**
     * @return int
     */
    public function getPriceTTC(): int
    {
        if ($this->priceTTC === null){
            $this->priceTTC = 100;
        }
        return $this->priceTTC;
    }

    /**
     * @return int
     */
    public function getPriceHT(): int
    {
        if ($this->priceHT === null) {
            $this->priceHT = $this->calculPriceHT();
        }
        return $this->priceHT;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }



    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param int $priceTTC
     */
    public function setPriceTTC(int $priceTTC): void
    {
        $this->priceTTC = $priceTTC;
    }

    /**
     * @param int $priceHT
     */
    public function setPriceHT(int $priceHT): void
    {
        $this->priceHT = $priceHT;
    }

    /**
     * @param float $vat
     */
    public function setVat(float $vat): void
    {
        $this->vat = $vat;
    }

    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    // Calculate priceHT from priceTTC and vat
    public function calculPriceHT() {
        return $this->priceTTC / (1 + ($this->vat / 100));
    }

    // Calculate priceTTC from priceHT and vat
    public function calculPriceTTC() {
        return $this->priceHT * (1 + ($this->vat / 100));
    }

    public function totalPriceTTC($quantity){
        return $this->priceTTC * $quantity;
    }



}

echo "<h1>Product</h1>";

$produit = new Product("Souris", "le truc la", "ok");
echo $produit -> calculPriceHT();

//echo $produit->getPriceTTC();
