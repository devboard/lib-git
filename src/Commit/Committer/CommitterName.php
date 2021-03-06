<?php

declare(strict_types=1);

namespace DevboardLib\Git\Commit\Committer;

use Git\Commit\Committer\CommitterName as CommitterNameInterface;

/**
 * @see \spec\DevboardLib\Git\Commit\Committer\CommitterNameSpec
 * @see \Tests\DevboardLib\Git\Commit\Committer\CommitterNameTest
 */
class CommitterName implements CommitterNameInterface
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function asString(): string
    {
        return $this->name;
    }

    /**
     * @deprecated Lets use `asString()`
     */
    public function __toString(): string
    {
        return $this->name;
    }

    public function serialize(): string
    {
        return $this->name;
    }

    public static function deserialize(string $name): self
    {
        return new self($name);
    }
}
