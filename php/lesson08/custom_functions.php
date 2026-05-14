<?php

function formatUserName(string $name){
	return strtoupper($name).'さん';
}

echo formatUserName('taro');

