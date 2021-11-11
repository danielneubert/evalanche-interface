# `GroupBehavior::deleteGroup()`

Add an attribute to a resource.

## Namespace

[**`Neubert \ EvalancheInterface`**](#)`\`[**`Behaviors`**](#)`\`[**`GroupBehavior`**](#)`::`[**`deleteGroup()`**](#)

## Definition

```php
deleteGroup(?int $groupId = null): bool
```

Returns the result if the group was deleted successfully.

## Example

Create a group and delete it.

```php
$group = $resource->addGroup('Example');
echo "Created Group '{$group->label}'.";

if ($group->deleteGroup()) {
    echo "Group was removed successfully.";
} else {
    echo "Couldn't remove the Group.";
}
```

The above example will output something similar to:

```txt
Created Group 'Example'.
Group was removed successfully.
```

### Used Methods and Properties
- [**`Behaviors\GroupBehavior::addGroup()`**](#)
- [**`Collections\Groups\Group::$label`**](#)
