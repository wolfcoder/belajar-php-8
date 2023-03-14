<?php

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotBlank
{
}

#[Attribute(Attribute::TARGET_PROPERTY)]
class Length
{
    public int $min;
    public int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}

class LoginRequest
{
    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?string $username;

    #[NotBlank]
    #[Length(min: 8, max: 10)]
    public ?string $password;
}


/**
 * @throws Exception
 */
function validate(object $object): void
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
//    var_dump($properties);

    foreach ($properties as $property) {

        validateNotBlank($property, $object);
        validatelength($property, $object);
    }
}

function validateNotBlank(ReflectionProperty $property, object $object): void
{
    $attribute = $property->getAttributes(NotBlank::class);
    var_dump(count($attribute));

    if (count($attribute) > 0) {
        if (!$property->isInitialized($object))
            throw new Exception("Property $property->name is not initialized");
        if ($property->getValue($object) == null)
            throw new Exception("Property $property->name is null");
    }
}

function validateLength(ReflectionProperty $property, object $object): void
{
    if(!$property->isInitialized($object) || $property->getValue($object) == null) {
        return;
    }

    $value = $property->getValue($object);
    $attributes = $property->getAttributes(Length::class);
    foreach ($attributes as $attribute) {
        $length = $attribute->newInstance();
        if (strlen($value) < $length->min)
            throw new Exception("Property $property->name is too short");
        if (strlen($value) > $length->max)
            throw new Exception("Property $property->name is too long");
    }
}

$request = new LoginRequest();
$request->username = "three";
$request->password = "";
validate($request);