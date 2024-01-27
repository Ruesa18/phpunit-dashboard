<?php

namespace App\Entity;

use App\Repository\TestsuiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestsuiteRepository::class)]
class Testsuite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $testCount = null;

    #[ORM\Column]
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

    #[ORM\OneToMany(mappedBy: 'testsuite', targetEntity: TestClass::class, cascade: ['persist'])]
    private Collection $testClasses;

    #[ORM\ManyToOne(inversedBy: 'testsuites')]
    private ?Report $report = null;

    public function __construct()
    {
        $this->testClasses = new ArrayCollection();
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
     * @return Collection<int, TestClass>
     */
    public function getTestClasses(): Collection
    {
        return $this->testClasses;
    }

    public function addTestClass(TestClass $testClass): static
    {
        if (!$this->testClasses->contains($testClass)) {
            $this->testClasses->add($testClass);
            $testClass->setTestsuite($this);
        }

        return $this;
    }

    public function removeTestClass(TestClass $testClass): static
    {
        if ($this->testClasses->removeElement($testClass)) {
            // set the owning side to null (unless already changed)
            if ($testClass->getTestsuite() === $this) {
                $testClass->setTestsuite(null);
            }
        }

        return $this;
    }

    public function getReport(): ?Report
    {
        return $this->report;
    }

    public function setReport(?Report $report): static
    {
        $this->report = $report;

        return $this;
    }
}
