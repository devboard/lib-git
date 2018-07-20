<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Branch;

use DevboardLib\Git\Branch\BranchName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Branch\BranchName
 * @group  unit
 */
class BranchNameTest extends TestCase
{
    /** @var string */
    private $name;

    /** @var BranchName */
    private $sut;

    public function setUp(): void
    {
        $this->name = 'master';
        $this->sut  = new BranchName($this->name);
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
