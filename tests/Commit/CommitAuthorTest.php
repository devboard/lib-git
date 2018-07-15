<?php

declare(strict_types=1);

namespace Tests\DevboardLib\Git\Commit;

use DevboardLib\Generix\EmailAddress;
use DevboardLib\Git\Commit\Author\AuthorName;
use DevboardLib\Git\Commit\CommitAuthor;
use DevboardLib\Git\Commit\CommitDate;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DevboardLib\Git\Commit\CommitAuthor
 * @group  unit
 */
class CommitAuthorTest extends TestCase
{
    /** @var AuthorName */
    private $name;

    /** @var EmailAddress */
    private $email;

    /** @var CommitDate */
    private $commitDate;

    /** @var CommitAuthor */
    private $sut;

    public function setUp(): void
    {
        $this->name       = new AuthorName('Jane Johnson');
        $this->email      = new EmailAddress('jane@example.com');
        $this->commitDate = new CommitDate('2018-01-02T20:21:22+00:00');
        $this->sut        = new CommitAuthor($this->name, $this->email, $this->commitDate);
    }

    public function testGetName(): void
    {
        self::assertSame($this->name, $this->sut->getName());
    }

    public function testGetEmail(): void
    {
        self::assertSame($this->email, $this->sut->getEmail());
    }

    public function testGetCommitDate(): void
    {
        self::assertSame($this->commitDate, $this->sut->getCommitDate());
    }

    public function testSerialize(): void
    {
        $expected = [
            'name'       => 'Jane Johnson',
            'email'      => 'jane@example.com',
            'commitDate' => '2018-01-02T20:21:22+00:00',
        ];

        self::assertSame($expected, $this->sut->serialize());
    }

    public function testDeserialize(): void
    {
        $serialized = json_encode($this->sut->serialize());
        self::assertEquals($this->sut, CommitAuthor::deserialize(json_decode($serialized, true)));
    }
}
