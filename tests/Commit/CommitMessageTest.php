<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitMessage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitMessage
 * @group  unit
 */
class CommitMessageTest extends TestCase
{
    /** @var string */
    private $message;

    /** @var CommitMessage */
    private $sut;

    public function setUp(): void
    {
        $this->message = 'A commit message';
        $this->sut     = new CommitMessage($this->message);
    }

    public function testGetMessage(): void
    {
        self::assertSame($this->message, $this->sut->getMessage());
    }

    public function testGetValue(): void
    {
        self::assertSame($this->message, $this->sut->getValue());
    }

    public function testToString(): void
    {
        self::assertSame($this->message, $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->message, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize($this->message));
    }
}
