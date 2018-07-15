<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit\Committer;

use DevboardLib\Git\Commit\Committer\CommitterName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\Committer\CommitterName
 * @group  unit
 */
class CommitterNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var CommitterName */
    private $sut;

    public function setUp(): void
    {
        $this->name = 'John Smith';
        $this->sut  = new CommitterName($this->name);
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
        self::assertSame($this->name, $this->sut->__toString());
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
