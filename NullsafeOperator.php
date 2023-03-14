<?php

class Address
{
    public ?string $country;
}

class User {
    public ?Address $address;
}

function getCountry(?User $user): ?string
{
    if ($user != null) {
        if ($user->address != null) {
            return $user->address->country;
        }
    }
    return 'null';
}

//echo getCountry(null) . PHP_EOL;

// null safe operator

function getCountrySafe(?User $user): ?string
{
    return $user?->address?->country ;
}


$user = new User();
$user->address = new Address();
$user->address->country = "Indonesia";

$userNull = new User();
$userNull->address = null;


echo getCountrySafe($user) . PHP_EOL;
echo getCountrySafe($userNull ) . PHP_EOL;


