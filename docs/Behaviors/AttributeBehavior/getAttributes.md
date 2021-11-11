# `AttributeBehavior::getAttributes()`

Returns all attributes of a resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`AttributeBehavior`**](../AttributeBehavior.md)`::`**`addAttribute()`**

## Definition

```php
getAttributes(): AttributeCollection
```

Returns all fetched [**`Attributes`**](#) as an [**`AttributeCollection`**](#).

## Example

Create an attribute and fetch the resources attributes.

```php
$attribute = $reference->addAttribute('EXAMPLE', 'Example', 'Input');
echo "Created Attribute '{$attribute->label}'.";

$reference->getAttributes()->each(funtion($attribute) {
    echo "Found Attribute '{$attribute->label}'.";
});
```

The above example will output something similar to:

```txt
Created Attribute 'Example'.
Found Attribute 'Example'.
```

### Used Methods and Properties
- [**`Behaviors\AttributeBehavior::addAttribute()`**](addAttribute.md)
- [**`Collections\Attributes\Attribute::$label`**](#)
- [**`Collections\Collection::each()`**](#)

## See also
- [**`Collections\Attributes\Attribute`**](#)
- [**`Collections\Attributes\AttributeCollection`**](#)
