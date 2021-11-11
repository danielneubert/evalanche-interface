# `AttributeBehavior::addOption()`

Add an option to an attribute.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`AttributeBehavior`**](../AttributeBehavior.md)`::`**`addOption()`**

## Definition

```php
addOption(string $label, ?int $attributeId = null): Option
```

Returns the created [**Option**](#).

## Example

Create an option and output its name after it's created.

```php
$option = $attribute->addOption('Example Option');
echo "Created Option '{$option->label}'.";
```

The above example will output something similar to:

```txt
Created Option 'Example Option'.
```

### Used Methods and Properties
- [**`Collections\Attributes\Option::$label`**](#)

## See also
- [**`Behaviors\GroupBehavior::addAttribute()`**](../GroupBehavior/addAttribute.md)
