<?php

$value = null;

if ($value === null){
    echo '$value'. " is NULL\n";
}
else{
    echo '$value' . " is not NULL\n";
}

$callback = function (): string{
    return "callable";
};

if (is_callable($callback)){
    echo $callback() . "\n";
}

$handle = fopen('php://memory', 'r+');

if ($handle === false){
    echo "open failed";
}
else{
    try{
        fwrite($handle, 'hello world');
        rewind($handle);
        echo stream_get_contents($handle) . "\n";
    }
    finally{
        fclose($handle);
    }
}