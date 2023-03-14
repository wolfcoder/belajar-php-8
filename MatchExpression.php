<?php

$value = "E";

$result = match ($value) {
    "A", "B", "C" => "Anda Lulus",
    "D" => "Anda tidak lulus",
    "E" => "E Salah Jurusan",
    default => "Nilai Apa itu",
};

echo $result . PHP_EOL;

$valueInt = 80;

$resultInt = match (true) {
    $valueInt >= 80 => "A",
    $valueInt >= 70 => "B",
    $valueInt >= 60 => "C",
    $valueInt >= 50 => "D",
    default => "E",
};

echo $resultInt . PHP_EOL;

$name = "Mr. Eko";

$resultName = match (true) {
    str_contains($name, "Mr.") => "Hello Mr. Eko",
    str_contains($name, "Mrs.") => "Hello Mrs. Eko",
    str_contains($name, "Ms.") => "Hello Ms. Eko",
    default => "Hello Eko",
};

echo $resultName . PHP_EOL;


//$value = "E";
//$result = "";
//
//switch ($value) {
//    case "A":
//    case "B":
//    case "C":
//        $result = "Anda Lulus";
//        break;
//    case "D":
//        $result = "Anda tidak lulus";
//        break;
//    case "E":
//        $result = "E Salah Jurusan";
//        break;
//    default:
//        $result = "Nilai Apa itu";
//}
//
//echo $result;
