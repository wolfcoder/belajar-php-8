<?php

class Example
{
    public string|int|bool|array $data;
}


$example = new Example();
$example->data = "Hello";
$example->data = 123;
$example->data = true;
$example->data = [1, 2, 3];

function sampleFunction(string|array $data): array | string
{
    if (is_array($data)) {
       return ["array"];
    } else if (is_string($data)) {
       return "string";
    }
}

var_dump(sampleFunction("Hello"));
var_dump(sampleFunction([1, 2, 3]));
//sampleFunction([]);
//sampleFunction("Hello");