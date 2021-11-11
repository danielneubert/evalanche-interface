# `GroupBehavior::addAttribute()`

Add an attribute to a resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](#)`\`[**`Behaviors`**](#)`\`[**`GroupBehavior`**](#)`::`[**`addAttribute()`**](#)

## Definition

```php
addAttribute(string $name, string $label, $type, ?int $groupId = null): Attribute
```

Returns the created Attribute.

## Example

Create an attribute and output its name after it's created.

```php
$attribute = $group->addAttribute('EXAMPLE', 'Example 1', 'Input');
echo "Created Attribute '{$attribute->label}'.";

$attribute = $resource->addAttribute('EXAMPLE', 'Example 2', 'Input', GROUP_ID);
echo "Created Attribute '{$attribute->label}'.";
```

The above example will output something similar to:

```txt
Created Attribute 'Example 1'.
Created Attribute 'Example 2'.
```

### Used Methods and Properties
- [**`Collections\Attributes\Attribute::$label`**](#)

## See also
- [**`Behaviors\AttributeBehavior::addAttribute()`**](#)
