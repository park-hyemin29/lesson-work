<?php

$order = [
    ['name' => 'Taro', 'price' => 1200, 'inventory' => 2],
    ['name' => 'Hanako', 'price' => 800, 'inventory' => 1],
    ['name' => 'Ken', 'price' => 800, 'inventory' => 4],
];

function calculateOrderTotal(array $row) : int{
    return $row['price'] * $row['inventory'];
}

function orderLabel(array $row) : string{
    if (calculateOrderTotal($row) >= 3000){
        return "高額注文";
    }
    else {
        return "通常注文";
    }
}

$price_total = 0;

for ($i = 0; $i < count($order); $i++) {
    $row = $order[$i];

    echo "{$row['name']}: ". calculateOrderTotal($row) ."円 / " . orderLabel($row) . "\n";

    $price_total += calculateOrderTotal($row);
}

echo "合計金額: {$price_total}円\n";