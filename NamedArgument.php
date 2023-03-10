<?php

function sayHello(string $first, string $middle = "", string $last): void
{
    echo "Hello $first $middle $last";
}


sayHello(last: "Doe", first: "John", );