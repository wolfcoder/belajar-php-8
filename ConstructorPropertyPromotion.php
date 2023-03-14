<?php

class Product
{
    public string $id;
    public string $name;
    public int $price;
    public int $quantity;

    /**
     * @param string $id
     * @param string $name
     * @param int $price
     * @param int $quantity
     */
    public function __construct(string $id, string $name, int $price, int $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

class ProductConstructorPropertyPromotion {
    public function __construct(
        public string $id,
        public string $name,
        public int $price,
        public int $quantity
    ) {}

}

$product = new Product("1", "Product name ", 100, 10);
$productPromoted = new ProductConstructorPropertyPromotion("1", "Product Constructor Property Promotion", 100, 10);
var_dump($productPromoted);
echo $productPromoted->name;