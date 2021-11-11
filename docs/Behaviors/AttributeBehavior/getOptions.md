# `AttributeBehavior::getOptions()`

Returns all attributes of a resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`AttributeBehavior`**](../AttributeBehavior.md)`::`**`getOptions()`**

## Definition

```php
getOptions(?int $attributeId = null): OptionCollection
```

Returns all fetched [**`Options`**](#) as an [**`OptionCollection`**](#).

## Example

Create an attribute option and fetch the attributes Option.

```php
$option = $attribute->addOption('Example');
echo "Created Option '{$option->label}'.";

$attribute->getOption()->each(funtion($option) {
    echo "Found Option '{$option->label}'.";
});
```

The above example will output something similar to:

```txt
Created Option 'Example'.
Found Option 'Example'.
```

### Used Methods and Properties
- [**`Behaviors\AttributeBehavior::addOption()`**](addAttribute.md)
- [**`Collections\Attributes\Option::$label`**](#)
- [**`Collections\Collection::each()`**](#)

## See also
- [**`Collections\Attributes\Option`**](#)
- [**`Collections\Attributes\OptionCollection`**](#)
