<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Git\Commit\CommitParent;
use DevboardLib\Git\Commit\CommitSha;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitParent
 * @group  unit
 */
class CommitParentTest extends TestCase
{
    /** @var CommitSha */
    private $sha;

    /** @var CommitParent */
    private $sut;

    public function setUp(): void
    {
        $this->sha = new CommitSha('5246f51f550db504e76c98b641e3337570e84dd4');
        $this->sut = new CommitParent($this->sha);
    }

    public function testGetSha(): void
    {
        self::assertSame($this->sha, $this->sut->getSha());
    }

    public function testSerialize(): void
    {
        self::assertEquals($this->sha->serialize(), $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitParent::deserialize(json_decode($serialized, true)));
    }
}
