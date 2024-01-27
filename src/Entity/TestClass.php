<?php

namespace App\Entity;

use App\Repository\TestClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestClassRepository::class)]
class TestClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $file = null;

    #[ORM\Column]
    private ?int $testCount = null;

    #[ORM\Column(length: 255)]
    private ?int $assertionCount = null;

    #[ORM\Column]
    private ?int $errorCount = null;

    #[ORM\Column]
    private ?int $warningCount = null;

    #[ORM\Column]
    private ?int $failureCount = null;

    #[ORM\Column]
    private ?int $skipCount = null;

    #[ORM\Column]
    private ?float $time = null;

    #[ORM\OneToMany(mappedBy: 'testClass', targetEntity: TestCase::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $testCases;

    #[ORM\ManyToOne(inversedBy: 'testClasses')]
    private ?Testsuite $testsuite = null;

    public function __construct()
    {
        $this->testCases = new ArrayCollection();
    }

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

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function getTestCount(): ?int
    {
        return $this->testCount;
    }

    public function setTestCount(int $testCount): static
    {
        $this->testCount = $testCount;

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

    public function getErrorCount(): ?int
    {
        return $this->errorCount;
    }

    public function setErrorCount(int $errorCount): static
    {
        $this->errorCount = $errorCount;

        return $this;
    }

    public function getWarningCount(): ?int
    {
        return $this->warningCount;
    }

    public function setWarningCount(int $warningCount): static
    {
        $this->warningCount = $warningCount;

        return $this;
    }

    public function getFailureCount(): ?int
    {
        return $this->failureCount;
    }

    public function setFailureCount(int $failureCount): static
    {
        $this->failureCount = $failureCount;

        return $this;
    }

    public function getSkipCount(): ?int
    {
        return $this->skipCount;
    }

    public function setSkipCount(int $skipCount): static
    {
        $this->skipCount = $skipCount;

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

    /**
     * @return Collection<int, TestCase>
     */
    public function getTestCases(): Collection
    {
        return $this->testCases;
    }

    public function addTestCase(TestCase $testCase): static
    {
        if (!$this->testCases->contains($testCase)) {
            $this->testCases->add($testCase);
            $testCase->setTestClass($this);
        }

        return $this;
    }

    public function removeTestCase(TestCase $testCase): static
    {
        if ($this->testCases->removeElement($testCase)) {
            // set the owning side to null (unless already changed)
            if ($testCase->getTestClass() === $this) {
                $testCase->setTestClass(null);
            }
        }

        return $this;
    }

    public function getTestsuite(): ?Testsuite
    {
        return $this->testsuite;
    }

    public function setTestsuite(?Testsuite $testsuite): static
    {
        $this->testsuite = $testsuite;

        return $this;
    }
}
