<?php

declare(strict_types=1);

namespace DevboardLib\Git\Branch;

use Git\Reference\ReferenceName;

/**
 * @see \spec\DevboardLib\Git\Branch\BranchNameSpec
 * @see \Tests\DevboardLib\Git\Branch\BranchNameTest
 */
class BranchName implements ReferenceName
{
    const TYPE = 'Branch';

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

    public function getType(): string
    {
        return self::TYPE;
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
