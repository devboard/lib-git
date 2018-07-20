<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DateTime;
use DevboardLib\Git\Commit\CommitDate;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitDate
 * @group  unit
 */
class CommitDateTest extends TestCase
{
    /** @var CommitDate */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new CommitDate('2018-01-01T11:22:33+00:00');
    }

    public function testCreateFromFormat(): void
    {
        $result = $this->sut::createFromFormat(DateTime::ATOM, '2018-01-01T11:22:33Z');
        self::assertEquals('2018-01-01T11:22:33+00:00', $result->asString());
    }

    public function testToString(): void
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->asString());
    }

    public function testSerialize(): void
    {
        self::assertSame('2018-01-01T11:22:33+00:00', $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        self::assertEquals($this->sut, $this->sut::deserialize('2018-01-01T11:22:33+00:00'));
    }
}
