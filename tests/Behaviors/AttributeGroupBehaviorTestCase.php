<?php

namespace Neubert\EvalancheInterface\Tests\Behaviors;

use Neubert\EvalancheInterface\Facades\Evalanche;
use Neubert\EvalancheInterface\Collections\Attributes\Attribute;
use Neubert\EvalancheInterface\Collections\Attributes\AttributeCollection;
use Neubert\EvalancheInterface\Collections\Attributes\Group;
use Neubert\EvalancheInterface\Collections\Attributes\GroupCollection;

trait AttributeGroupBehaviorTestCase
{
    public function testAttributeGroupSetup()
    {
        $this->resetConnection();
    }

    public function testAttributeGroupSetupCreate()
    {
        $this->set('attr--id', $this->createResource("[TEST] EvalancheConnector Test (Attribute)")->id);
        $this->assertTrue(is_numeric($this->get('attr--id')));
    }

    public function testAttributeGroupAddGroup()
    {
        $group = $this->getClientWith('attr--id')->addGroup('Test');
        $this->assertInstanceOf(Group::class, $group);
        $this->set('attr--group-id', $group->id);
        $this->assertTrue(is_numeric($this->get('attr--group-id')));
    }

    public function testAttributeGroupAddAttribute()
    {
        $attribute = $this->getClientWith('attr--id')->addAttribute('TEST', 'Test', 1, $this->get('attr--group-id'));
        $this->assertInstanceOf(Attribute::class, $attribute);
        $this->set('attr--attribute-id', $attribute->id);
        $this->assertTrue(is_numeric($this->get('attr--attribute-id')));
    }

    public function testAttributeGroupGetAttributes()
    {
        $attributes = $this->getClientWith('attr--id')->getAttributes();
        $this->assertInstanceOf(AttributeCollection::class, $attributes);
        $attribute = $attributes->first(function ($item) {
            return $item->id == $this->get('attr--attribute-id');
        });
        $this->assertNotNull($attribute);
    }

    public function testAttributeGroupGetGroups()
    {
        $groups = $this->getClientWith('attr--id')->getGroups();
        $this->assertInstanceOf(GroupCollection::class, $groups);
        $group = $groups->first(function ($item) {
            return $item->id == $this->get('attr--group-id');
        });
        $this->assertNotNull($group);
    }

    public function testAttributeGroupDeleteAttribute()
    {
        $this->assertTrue($this->getClientWith('attr--id')->deleteAttribute($this->get('attr--attribute-id')));
    }

    public function testAttributeGroupDeleteGroup()
    {
        $this->assertTrue($this->getClientWith('attr--id')->deleteGroup($this->get('attr--group-id')));
    }

    public function testAttributeGroupSetupDelete()
    {
        $this->assertTrue($this->getClientWith('attr--id')->delete());
    }
}
