<?php

class Example {
    public string | int | bool | array $data;
}


$example = new Example();
$example->data = "Hello";
$example->data = 123;
$example->data = true;
$example->data = [1, 2, 3];