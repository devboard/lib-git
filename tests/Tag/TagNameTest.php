<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Tag;

use DevboardLib\Git\Tag\TagName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Tag\TagName
 * @group  unit
 */
class TagNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var TagName */
    private $sut;

    public function setUp(): void
    {
        $this->name = '0.1';
        $this->sut  = new TagName($this->name);
    }

    public function testGetName(): void
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->name, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->name, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->name, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->name));
    }
}
