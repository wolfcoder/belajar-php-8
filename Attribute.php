<?php

#[Attribute(Attribute::TARGET_PROPERTY) ]
class NotBlank
{
}

class LoginRequest
{
    #[NotBlank]
    public ?string $username;

    #[NotBlank]
    public ?string $password;
}

function validate(object $object): void
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
    foreach ($properties as $property) {
        validateNotBlank($property, $object);
    }
}

function validateNotBlank(ReflectionProperty $property, object $object): void
{
    $attribute = $property->getAttributes(NotBlank::class);
    var_dump($attribute);
    if (count($attribute) > 0) {
        if (!$property->isInitialized($object))
            throw new Exception("Property $property->name is null");
        if ($property->getValue($object) == null)
            throw new Exception("Property $property->name is null");
    }
}

$request = new LoginRequest();
$request->username = "john";
$request->password = null;