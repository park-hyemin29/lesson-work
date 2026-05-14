
<?php

$shipping = [
    //['money' => 6000, 'member' => true],
    ['money' => 4200, 'member' => true],
    //['money' => 4200, 'member' => false],
];

function calculateShippingFee(array $shipping) : int{
    if($shipping['money'] >= 5000){
        return 0;
    }
    else if ($shipping['money'] < 5000 && $shipping['member'] === true){
        return 300;
    }
    else {
        return 600;
    }

    return 0;
}

function buildShippingMessage(array $shipping): string{
    return $shipping['member'] ? 'はい' : 'いいえ';
}

/*
foreach ($shipping as $shipping) {
    $fee = calculateShippingFee($shipping);
    $memberLabel = buildShippingMessage($shipping);
    echo "注文金額: {$shipping['money']}\n会員: {$memberLabel}\n送料: {$fee}\n";
}
*/
foreach ($shipping as $row) {
    //echo "注文金額: {$row['money']}\n会員: {calculateShippingFee($row)}\n送料: {buildShippingMessage($row)}\n";
    echo "注文金額: {$row['money']}\n会員: " . buildShippingMessage($row) . "\n送料: " . calculateShippingFee($row) . "\n";
}