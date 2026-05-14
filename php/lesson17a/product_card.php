<?php

$product = [
    ['name' => "Pen", 'price' => 120, 'inventory' => 12],
    ['name' => "Notebook", 'price' => 260, 'inventory' => 0],
    ['name' => "Bag", 'price' => 2800, 'inventory' => 3],
];

class Product{
    public function isAvailable(array $row) : string{
        if ($row['inventory'] === 0){
            return '在庫なし';
        }
        return '在庫あり';
    }

    public function cardText() : string{
        $list;
        
        foreach ($this->product as $row) {
            $name = $row['name'];
            $price = $row['price'];
            $inventory = $this->isAvailable($row);
            $list = "{$name} / {$price}円 / {$inventory}\n";
        }

        return $list;
    }
}

$products = new Product($product);

for ($i = 0; $i < count($product); $i++) {
    $row = $product[$i];

    if (($row['inventory']) === 0) {
        echo "[SOLD OUT] {$row['name']} / {$row['price']}円 / {$products->isAvailable($row)}\n";
    } 
    else {
        echo "{$row['name']} / {$row['price']}円 / {$products->isAvailable($row)}\n";
    }
}