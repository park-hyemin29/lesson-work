<?php

function formatUserName(string $name){
	return strtoupper($name);
}

echo formatUserName('taro').'さん';

