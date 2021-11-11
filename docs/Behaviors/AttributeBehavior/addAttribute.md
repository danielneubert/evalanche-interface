# `AttributeBehavior::addAttribute()`

Add an attribute to a resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`AttributeBehavior`**](../AttributeBehavior.md)`::`**`addAttribute()`**

## Definition

```php
addAttribute(string $name, string $label, $type): Attribute
```

Returns the created [**Attribute**](#).

## Example

Create an attribute and output its name after it's created.

```php
$attribute = $reference->addAttribute('EXAMPLE', 'Example', 'Input');
echo "Created Attribute '{$attribute->label}'.";
```

The above example will output something similar to:

```txt
Created Attribute 'Example'.
```

### Used Methods and Properties
- [**`Collections\Attributes\Attribute::$label`**](#)

## See also
- [**`Behaviors\GroupBehavior::addAttribute()`**](../GroupBehavior/addAttribute.md)
