<?php

$products = [
    ['name' => 'Pen', 'stock' => 12],
    ['name' => 'Notebook', 'stock' => 4],
    ['name' => 'Eraser', 'stock' => 2],
    ['name' => 'Bag', 'stock' => 8],
];

function isLowStock(array $product): bool
{
    return $product['stock'] <= 5;
}

echo "在庫アラート\n";

$alertCount = 0;
foreach ($products as $product) {
    if (isLowStock($product)) {
        echo "{$product['name']}: {$product['stock']}個\n";
        $alertCount++;
    }
}

echo "\n対象件数: {$alertCount}件\n";
