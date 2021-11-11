# `GroupBehavior::deleteOption()`

Delete an attribute option.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`AttributeBehavior`**](../AttributeBehavior.md)`::`**`deleteOption()`**

## Definition

```php
deleteOption(int $optionId, ?int $attributeId = null): bool
```

Returns the result whether the option was deleted successfully.

## Example

Create an option and delete it.

```php
$option = $attribute->addOption('Example Option');
echo "Created Option '{$option->label}'.";

if ($option->deleteOption()) {
    echo "Option was removed successfully.";
} else {
    echo "Couldn't remove the Option.";
}
```

The above example will output something similar to:

```txt
Created Option 'Example Option'.
Group was removed successfully.
```

### Used Methods and Properties
- [**`Behaviors\AttributeBehavior::addOption()`**](addAttribute.md)
- [**`Collections\Attributes\Option::$label`**](#)
