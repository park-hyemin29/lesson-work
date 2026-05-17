
<?php

const FREE_SHIPPING_THRESHOLD = 5000;
const MEMBER_SHIPPING_FEE = 300;
const DEFAULT_SHIPPING_FEE = 600;

$shipping = [
    //['money' => 6000, 'member' => true],
    ['money' => 4200, 'member' => true],
    //['money' => 4200, 'member' => false],
];

function calculateShippingFee(array $shipping) : int{
    if($shipping['money'] >= FREE_SHIPPING_THRESHOLD){
        return 0;
    }
    else if ($shipping['money'] < 5000 && $shipping['member'] === true){
        return MEMBER_SHIPPING_FEE;
    }
    else {
        return DEFAULT_SHIPPING_FEE;
    }
}

function buildMemberLabel(array $shipping): string{
    return $shipping['member'] ? 'はい' : 'いいえ';
}

/*
foreach ($shipping as $shipping) {
    $fee = calculateShippingFee($shipping);
    $memberLabel = buildShippingMessage($shipping);
    echo "注文金額: {$shipping['money']}\n会員: {$memberLabel}\n送料: {$fee}\n";
}
*/
foreach ($shipping as $order) {
    //echo "注文金額: {$row['money']}\n会員: {calculateShippingFee($row)}\n送料: {buildShippingMessage($row)}\n";
    echo "注文金額: {$order['money']}\n会員: " . buildMemberLabel($order) . "\n送料: " . calculateShippingFee($order) . "\n";
}
