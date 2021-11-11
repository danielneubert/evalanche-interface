# `GroupBehavior::deleteAttribute()`

Delete an attribute.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`AttributeBehavior`**](../AttributeBehavior.md)`::`**`deleteAttribute()`**

## Definition

```php
deleteAttribute(?int $attributeId = null): bool
```

Returns the result whether the attribute was deleted successfully.

## Example

Create an attribute and delete it.

```php
$attribute= $resource->addAttributes('EXAMPLE', 'Example', 'Input');
echo "Created Attribute '{$attribute->label}'.";

if ($attribute->deleteAttribute()) {
    echo "Attribute was removed successfully.";
} else {
    echo "Couldn't remove the Attribute.";
}
```

The above example will output something similar to:

```txt
Created Group 'Example'.
Group was removed successfully.
```

### Used Methods and Properties
- [**`Behaviors\AttributeBehavior::addAttribute()`**](addAttribute.md)
- [**`Collections\Attributes\Attribute::$label`**](#)
