<?php

namespace App\Entity;

use App\Repository\TestCaseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestCaseRepository::class)]
class TestCase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $class = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $className = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $file = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $line = null;

    #[ORM\Column]
    private ?int $assertionCount = null;

    #[ORM\Column]
    private ?float $time = null;

    #[ORM\OneToOne(inversedBy: 'testCase', cascade: ['persist', 'remove'])]
    private ?Failure $failure = null;

    #[ORM\ManyToOne(inversedBy: 'testCases')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TestClass $testClass = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): static
    {
        $this->class = $class;

        return $this;
    }

    public function getClassName(): ?string
    {
        return $this->className;
    }

    public function setClassName(?string $className): static
    {
        $this->className = $className;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function getLine(): ?string
    {
        return $this->line;
    }

    public function setLine(?string $line): static
    {
        $this->line = $line;

        return $this;
    }

    public function getAssertionCount(): ?int
    {
        return $this->assertionCount;
    }

    public function setAssertionCount(int $assertionCount): static
    {
        $this->assertionCount = $assertionCount;

        return $this;
    }

    public function getTime(): ?float
    {
        return $this->time;
    }

    public function setTime(float $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function getFailure(): ?Failure
    {
        return $this->failure;
    }

    public function setFailure(?Failure $failure): static
    {
        $this->failure = $failure;

        return $this;
    }

    public function getTestClass(): ?TestClass
    {
        return $this->testClass;
    }

    public function setTestClass(?TestClass $testClass): static
    {
        $this->testClass = $testClass;

        return $this;
    }
}
