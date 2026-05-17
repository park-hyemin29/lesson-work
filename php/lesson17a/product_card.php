<?php

$productData = [
    ['name' => "Pen", 'price' => 120, 'inventory' => 12],
    ['name' => "Notebook", 'price' => 260, 'inventory' => 0],
    ['name' => "Bag", 'price' => 2800, 'inventory' => 3],
];

class Product
{
    private string $name;
    private int $price;
    private int $inventory;

    public function __construct(string $name, int $price, int $inventory)
    {
        $this->name = $name;
        $this->price = $price;
        $this->inventory = $inventory;
    }

    public function isAvailable(): string
    {
        if ($this->inventory === 0) {
            return '在庫なし';
        }

        return '在庫あり';
    }

    public function cardText(): string
    {
        $soldOut = '';

        if ($this->inventory === 0) {
            $soldOut = '[SOLD OUT] ';
        }

        return "{$soldOut}{$this->name} / {$this->price}円 / {$this->isAvailable()}";
    }
}

$products = [];

foreach ($productData as $row) {
    $products[] = new Product(
        $row['name'],
        $row['price'],
        $row['inventory']
    );
}

foreach ($products as $product) {
    echo $product->cardText() . "\n";
}