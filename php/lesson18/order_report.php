<?php

const HIGH_VALUE_ORDER_THRESHOLD = 3000;

$orders = [
    ['name' => 'Taro', 'price' => 1200, 'count' => 2],
    ['name' => 'Hanako', 'price' => 800, 'count' => 1],
    ['name' => 'Ken', 'price' => 800, 'count' => 4],
];

function calculateOrderTotal(array $order) : int{
    return $order['price'] * $order['count'];
}

function orderLabel(array $order) : string{
    if (calculateOrderTotal($order) >= HIGH_VALUE_ORDER_THRESHOLD){
        return "高額注文";
    }
    else {
        return "通常注文";
    }
}

$price_total = 0;

for ($i = 0; $i < count($orders); $i++) {
    $order = $orders[$i];
    $orderTotal = calculateOrderTotal($order);

    echo "{$order['name']}: ". $orderTotal ."円 / " . orderLabel($order) . "\n";

    $price_total += $orderTotal;
}

echo "合計金額: {$price_total}円\n";