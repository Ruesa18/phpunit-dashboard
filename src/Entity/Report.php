<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportRepository::class)]
class Report
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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

    #[ORM\OneToMany(mappedBy: 'report', targetEntity: Testsuite::class, cascade: ['persist'])]
    private Collection $testsuites;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $executionTimestamp = null;

    public function __construct()
    {
        $this->testsuites = new ArrayCollection();
		$this->executionTimestamp = new \DateTime();
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
     * @return Collection<int, Testsuite>
     */
    public function getTestsuites(): Collection
    {
        return $this->testsuites;
    }

    public function addTestsuite(Testsuite $testsuite): static
    {
        if (!$this->testsuites->contains($testsuite)) {
            $this->testsuites->add($testsuite);
            $testsuite->setReport($this);
        }

        return $this;
    }

    public function removeTestsuite(Testsuite $testsuite): static
    {
        if ($this->testsuites->removeElement($testsuite)) {
            // set the owning side to null (unless already changed)
            if ($testsuite->getReport() === $this) {
                $testsuite->setReport(null);
            }
        }

        return $this;
    }

    public function getExecutionTimestamp(): ?\DateTimeInterface
    {
        return $this->executionTimestamp;
    }

    public function setExecutionTimestamp(\DateTimeInterface $executionTimestamp): static
    {
        $this->executionTimestamp = $executionTimestamp;

        return $this;
    }
}
