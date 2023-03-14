<?php

$value = "E";
$result = "";

switch ($value) {
    case "A":
    case "B":
    case "C":
        $result = "Anda Lulus";
        break;
    case "D":
        $result = "Anda tidak lulus";
        break;
    case "E":
        $result = "E Salah Jurusan";
        break;
    default:
        $result = "Nilai Apa itu";
}

echo $result;
