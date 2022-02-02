<?php
namespace Products\models;

use Products\models\Model;

class Product implements Model
{

    public string $sku;
    public string $name;
    public int $price;


    // product type specific data
    public array $meta;

    /**
     * @param string $sku
     * @param string $name
     * @param int $price
     * @param array $meta
     */

    public function __construct(string $sku, string $name, int $price, array $meta)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->meta = $meta;
    }

    /**
     * @return string
     */

    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @param array $meta
     */
    public function setMeta(array $meta): void
    {
        $this->meta = $meta;
    }

    public function save(): bool
    {
        return ProductDao::save($this);
    }

    public function delete(): void
    {
        ProductDao::delete($this);
    }
}