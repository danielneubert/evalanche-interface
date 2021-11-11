# `GroupBehavior::getGroups()`

Receive all groups of a given resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](../../index.md)`\`[**`Behaviors`**](../../index.md#behaviors)`\`[**`GroupBehavior`**](../GroupBehavior.md)`::`**`getGroups()`**

## Definition

```php
getGroups(): GroupCollection
```

Returns all fetched [**`Groups`**](#) as a [**`GroupCollection`**](#).

## Example

Create a group and fetch it.

```php
$group = $resource->addGroup('Example');
echo "Created Group '{$group->label}'.";

$resource->getGroups()->each(function ($group) {
    echo "Resource has Group '{$group->label}'";
});
```

The above example will output something similar to:

```txt
Created Group 'Example'.
Resource has Group 'Example'.
```

### Used Methods and Properties
- [**`Behaviors\GroupBehavior::addGroup()`**](addGroup.md)
- [**`Collections\Attributes\Group::$label`**](#)
- [**`Collections\Collection::each()`**](#)

## See also
- [**`Collections\Attributes\Group`**](#)
- [**`Collections\Attributes\GroupCollection`**](#)
