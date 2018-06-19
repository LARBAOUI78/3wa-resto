<?php

$listVariables = ['name' => 'bob', 'age' => 18];

var_dump($listVariables);

extract($listVariables);

var_dump($name);
var_dump($age);