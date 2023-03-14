<?php

function testMixed(mixed $data): mixed
{
    if (is_array($data)) {
        return [];
    } else if (is_string($data)) {
        return "string";
    } else if (is_int($data)) {
        return 123;
    } else if (is_object($data)) {
        return $data;
    } else {
        return null;
    }

}

var_dump(testMixed("Hello"));
var_dump(testMixed([1, 2, 3]));
var_dump(testMixed(123));
var_dump(testMixed(null));
var_dump(testMixed(new stdClass()));