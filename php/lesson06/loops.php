<?php

$sweets = ['cake', 'chocolate', 'candy'];

for ($i = 1; $i < 6; $i++){
	printf("%d\n", $i);
	if ($i === 5){
		printf("\n");
	}
}

foreach($sweets as $sweets){
	printf("%s\n",$sweets);
}
