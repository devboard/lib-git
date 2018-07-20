<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit\Author;

use DevboardLib\Git\Commit\Author\AuthorName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\Author\AuthorName
 * @group  unit
 */
class AuthorNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var AuthorName */
    private $sut;

    public function setUp(): void
    {
        $this->name = 'John Smith';
        $this->sut  = new AuthorName($this->name);
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
