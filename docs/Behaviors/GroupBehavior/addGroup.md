# `GroupBehavior::addGroup()`

Add an attribute group to a resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`GroupBehavior`**](../GroupBehavior.md)`::`**`addGroup()`**

## Definition

```php
addGroup(string $label): Group
```

Returns the created Group.

## Example

Create a Group and add an Attribute to it.

```php
$group = $resource->addGroup('Example');
echo "Created Group '{$group->label}'.";

$attribute = $group->addAttribute('EXAMPLE', 'Example', 'Input');
echo "Created Attribute '{$attribute->label}'.";
```

The above example will output something similar to:

```txt
Created Group 'Example'.
Created Attribute 'Example'.
```

### Used Methods and Properties
- [**`Behaviors\GroupBehavior::addAttribute()`**](addAttribute.md)
- [**`Collections\Attributes\Group::$label`**](#)
- [**`Collections\Attributes\Attribute::$label`**](#)

### Used Methods and Properties
- [**`Behaviors\GroupBehavior::addGroup()`**](addGroup.md)
- [**`Collections\Attributes\Group::$label`**](#)
- [**`Collections\Collection::each()`**](#)

## See also
- [**`Collections\Attributes\Group`**](#)
- [**`Collections\Attributes\GroupCollection`**](#)
